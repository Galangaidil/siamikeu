<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::latest()->get();
        return view('sale.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreSaleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        Sale::create($request->validated());
        return back()->with('message', 'Data penjualan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('sale.edit', ['sale' => $sale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSaleRequest $request
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->validated());
        return back()->with('message', 'Data penjualan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return back();
    }
}
