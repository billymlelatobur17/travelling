<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $items = Transaction::with(['details', 'travel_package', 'user'])->paginate(10);
        return view('pages.admin.transaction.index', [
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
//        dd($item->travel_package->transaction_id);
        foreach ($item->details as $detail) {
        }
        return view('pages.admin.transaction.detail', [
            'item' => $item,
            'detail' => $detail
        ]);
    }

    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', [
            'item' => $item,
        ]);
    }

    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();
        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/Transaction', 'public'
        );

        Transaction::create($data);
        return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();
        return redirect()->route('transaction.index');
    }
}
