<?php

namespace App\Http\Controllers;

use App\Mail\TransactionSuccessMail;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);
        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);
        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transactions_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;
        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details', 'travel_package', 'galleries', 'user'])->findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();

        //Set konfigurasi midtrans
        Config::$serverKey = config('midtrans.serverKey', 'SB-Mid-server-JcukUL7YWYk596U8RsO2rsrz');
        Config::$isProduction = config('midtrans.isProduction', false);
        Config::$isSanitized = config('midtrans.isSanitized', true);
        Config::$is3ds = config('midtrans.is3ds', true);

        // Buat array untuk dikirim ke midtrans

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'TEST-' . $transaction->id,
                'gross_amount' => (int)$transaction->transaction_total
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'enabled_payments' => ['gopay'],
            'gopay' => array(
                'enable_callback' => true,
                'callback_url' => true
            )

        ];
        try {
            //Ambil halaman payment di midtrans
            $payment_url = Snap::createTransaction($midtrans_params)->redirect_url;

            //Redirect ke halaman midtrans
            header('Location: ' . $payment_url);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        //Kirim Email ke User eticketnya

        Mail::to($transaction->user->email)->send(new TransactionSuccessMail($transaction));
        return view('pages.success');


    }
}
