<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        return view('price.index', ['prices' => Price::latest()->get()]);
    }

    public function create()
    {
        $this->authorize('create', Price::class);

        return view('price.create');
    }

    public function store(StorePriceRequest $request)
    {
        $this->authorize('create', Price::class);

        Price::create($request->validated());
        return back()->with('message', 'Data harga beli dan jual berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        $this->authorize('update', Price::class);

        return view('price.edit', ['price' => $price]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceRequest  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceRequest $request, Price $price)
    {
        $this->authorize('update', Price::class);

        $price->update($request->validated());
        return back()->with('message', 'Harga beli dan jual berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $this->authorize('delete', Price::class);

        $price->delete();
        return back();
    }

    public function getBuyPrice()
    {
        $buyPrice = Price::latest()->first();
        return response()->json([
            'buy' => $buyPrice->buy
        ]);
    }

    public function getSellPrice()
    {
        $sellPrice = Price::latest()->first();
        return response()->json([
            'sell' => $sellPrice->sell
        ]);
    }
}
