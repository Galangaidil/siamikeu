<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-heading leading-tight">
            <div class="flex space-x-8">
                <!-- Previous button -->
                <a href="{{ route('purchase.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                    </svg>
                </a>
                <span>{{ __('Lihat pembelian') }}</span>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="mx-auto w-full sm:max-w-md px-6 py-4 overflow-hidden sm:rounded-lg"
                     x-data="{ name: '{{ $purchase->name }}', bruto: {{ $purchase->bruto }}, netto: {{ $purchase->netto }}, price: {{ $purchase->price }}, amount: {{ $purchase->amount }}, operational: 0.06 }">

                    <div class="hidden print:flex print:justify-center print:items-center">
                        <h1 class="text-center text-xl text-heading uppercase"><strong>Tauke Sawit Dhea Putri Mustafa</strong></h1>
                    </div>

                    <div class="mt-4 text-sm">
                        <h1 class="text-center text-xl text-heading print:uppercase print:mt-0"><strong>Detail Pembelian</strong></h1>

                        <!-- Purchase ID -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <span class="text-paragraph">ID Pembelian</span>
                            </div>

                            <div>
                                <span class="text-heading font-semibold">{{ $purchase->id }}</span>
                            </div>
                        </div>

                        <!-- Time -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <span class="text-paragraph">Waktu</span>
                            </div>

                            <div>
                                <span class="text-heading font-semibold">{{ $purchase->created_at }}</span>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <span class="text-paragraph">Nama petani</span>
                            </div>

                            <div>
                                <span x-text="name" class="text-heading font-semibold"></span>
                            </div>
                        </div>

                        <!-- Bruto -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <span class="text-paragraph">Bruto</span>
                            </div>

                            <div>
                                <span x-text="formatByComma(bruto)" class="text-heading font-semibold"></span>
                            </div>
                        </div>

                        <!-- Netto -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <span class="text-paragraph">Netto</span>
                            </div>

                            <div>
                                <span x-text="formatByComma(netto)" class="text-heading font-semibold"></span>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <span class="text-paragraph">Price</span>
                            </div>

                            <div>
                                <p class="text-heading font-semibold"><span x-text="formatMoney(price)"></span></p>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <span class="text-paragraph">Total</span>
                            </div>

                            <div>
                                <p class="text-paragraph/75"><span x-text="formatMoney(price)"></span> &#10006; <span
                                        x-text="formatByComma(netto)"></span></p>
                                <p class="block text-right font-bold text-primary"><span
                                        x-text="formatMoney(amount)"></span></p>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-center">
                            <x-button class="print:hidden" onclick="window.print()">
                                {{ __('Cetak') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
