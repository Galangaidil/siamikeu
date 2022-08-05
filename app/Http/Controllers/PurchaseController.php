<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseFormRequest;
use App\Models\Customer;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        return view('purchase.index', ['purchases' => Purchase::latest()->get()]);
    }

    public function create()
    {
        return view('purchase.create', ['customers' => Customer::latest()->get('name')]);
    }

    public function store(PurchaseFormRequest $request)
    {
        Purchase::create($request->validated());

        return back()->with('message', 'Data pembelian berhasil disimpan');
    }

    public function show(Purchase $purchase)
    {
        return view('purchase.show', ['purchase' => $purchase]);
    }

    public function edit(Purchase $purchase)
    {
        return view('purchase.edit', ['purchase' => $purchase]);
    }

    public function update(PurchaseFormRequest $request, Purchase $purchase)
    {
        $purchase->update($request->validated());
        return back()->with('message', 'Data pembelian berhasil diupdate');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return back();
    }
}
