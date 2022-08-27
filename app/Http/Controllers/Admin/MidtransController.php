<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TransactionSuccessMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        //Set konfigurasi midtrans
        Config::$serverKey = config('midtrans.serverKey', 'SB-Mid-server-JcukUL7YWYk596U8RsO2rsrz');
        Config::$isProduction = config('midtrans.isProduction', false);
        Config::$isSanitized = config('midtrans.isSanitized', true);
        Config::$is3ds = config('midtrans.is3ds', true);

        //Buat midtrans notification
        $notification = new Notification();

        //Pecah order id a=supaya bisa di terima database
        $order_id = explode('-', $notification->order_id);

        //Assign variable untuk memudahkan config
        $status = $notification->status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order_id[1];

        //Cari transaksi berdasarkan id
        $transaction = Transaction::findOrFail($order_id);


        //hande notification status midtrans
        if ($status === 'capture') {
            if ($type === 'credit_card') {
                if ($fraud === 'challenge') {
                    $transaction->transaction_status = 'CHALLENGE';
                } else {
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        } else if ($status === 'setlement') {
            $transaction->transaction_status = 'SUCCESS';
        } else if ($status === 'pending') {
            $transaction->transaction_status = 'PENDING';
        } else if ($status === 'deny') {
            $transaction->transaction_status = 'FAILED';
        } else if ($status === 'expire') {
            $transaction->transaction_status = 'EXPIRED';
        } else if ($status === 'cancel') {
            $transaction->transaction_status = 'FAILED';
        }

        //Simpan transaksi
        $transaction->save();

        //Kirim Email ke User eticketnya
        if ($transaction) {
            if ($status === 'capture' && $fraud === 'accept') {
                Mail::to($transaction->user->email)->send(new TransactionSuccessMail($transaction));
            } else if ($status === 'sentelment') {
                Mail::to($transaction->user->email)->send(new TransactionSuccessMail($transaction));
            } else if ($status === 'success') {
                Mail::to($transaction->user->email)->send(new TransactionSuccessMail($transaction));
            } else if ($status === 'capture' && $fraud === 'chalenge') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment challenge'
                    ]
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 300,
                        'message' => 'Midtrans payment not sentliment'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 300,
                    'message' => 'Midtrans notification success'
                ]
            ]);
        }

//        Mail::to($transaction->user->email)->send(new TransactionSuccessMail($transaction));
//        return view('pages.success');
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.success');
    }

    public function unfinishRedirec(Request $request)
    {
        return view('pages.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.failed');
    }
}
