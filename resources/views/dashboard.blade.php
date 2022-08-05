<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-2 bg-white border-b border-gray-200">

                    <!-- Price -->
                    <div class="bg-sky-200 text-sky-700 text-white rounded-lg p-3" x-data="{buyPrice: 0, sellPrice: 0}">
                        <h1 class="text-xl font-semibold">Harga Sawit</h1>

                        <div class="mt-4 flex flex-col justify-center items-center"
                             x-init="fetch('{{ route('getBuyPrice') }}').then(response => response.json()).then(data => buyPrice = data.buy)">
                            <h2 x-text="formatMoney(buyPrice)" class="text-3xl font-bold"></h2>
                            <span class="text-sm">Harga Beli</span>
                        </div>

                        <div class="mt-4 flex flex-col justify-center items-center"
                             x-init="fetch('{{ route('getSellPrice') }}').then(response => response.json()).then(data => sellPrice = data.sell)">
                            <h2 x-text="formatMoney(sellPrice)" class="text-3xl font-bold"></h2>
                            <span class="text-sm">Harga Jual</span>
                        </div>
                    </div>

                    <!-- Purchases -->
                    <div class="bg-emerald-100 rounded-lg p-3 text-emerald-700">
                        <h1 class="text-xl font-semibold">Pembelian</h1>

                        <div class="mt-4 grid place-items-center">
                            <h2 class="text-3xl font-bold">
                                {{ $todayPurchases }}
                            </h2>
                            <span class="text-sm">Transaksi</span>
                        </div>

                        <div x-data="{totalNetto: {{ $totalNetto }}, totalAmount: {{ $totalAmount }}}"
                             class="mt-4 text-sm">
                            <div class="flex justify-between">
                                <div>
                                    Berat bersih
                                </div>

                                <div>
                                    <span class="font-bold" x-text="formatByComma(totalNetto)"></span> <b>KG</b>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <div>
                                    Uang keluar
                                </div>

                                <div>
                                    <span class="font-bold" x-text="formatMoney(totalAmount)"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customers -->
                    <div class="bg-purple-100 rounded-lg p-3 text-purple-700">
                        <h1 class="text-xl font-semibold">Petani</h1>

                        <div class="mt-4 grid place-items-center">
                            <h2 class="text-5xl font-bold">
                                {{ $totalCustomer }}
                            </h2>
                            <span class="text-sm">Total petani</span>
                        </div>

                        @if(Route::has('customer.index'))
                            <div class="mt-8 grid place-items-end">
                                <a href="{{ route('customer.index') }}"
                                   class="text-sm px-2 py-1 rounded-lg hover:bg-purple-200">Kelola Petani</a>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
