<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-heading leading-tight">
            <div class="flex space-x-8">
                <!-- Previous button -->
                <a href="{{ route('report.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                    </svg>
                </a>
                <span>{{ __('Lihat detail laporan') }}</span>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="hidden print:flex print:justify-center print:items-center">
                        <h1 class="text-center text-xl text-heading uppercase"><strong>Tauke Sawit Dhea Putri Mustafa</strong></h1>
                    </div>
                    <h1 class="text-center text-xl text-heading print:uppercase"><strong>Laporan keuangan bulan {{ $month_name }}</strong></h1>
                    <div class="flex justify-center items-center mt-3">
                        <x-button class="print:hidden" onclick="window.print()">
                            {{ __('Cetak') }}
                        </x-button>
                    </div>
                </div>
                <div class="flex flex-wrap max-w-3xl p-6 lg:mx-auto">
                    <div class="w-full lg:w-1/2">
                        <h2 class="text-heading mb-3"><strong>Pembelian buah sawit</strong></h2>
                        <ul class="w-full lg:w-3/4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                            @if($purchases->count())
                                @foreach($purchases as $purchase)
                                    <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg">
                                        <div class="flex justify-between">
                                            <span>{{ $purchase->name }}</span>
                                            <span>{{ number_format($purchase->netto, 0, ',', '.') }} KG</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span
                                                class="text-slate-400 text-xs">{{ \Carbon\Carbon::parse($purchase->created_at)->diffForHumans() }}</span>
                                            <span>RP {{ number_format($purchase->amount, 0, ',', '.') }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg">Tidak ada pembelian
                                </li>
                            @endif
                        </ul>
                    </div>

                    <div class="w-full mt-10 lg:mt-0 lg:w-1/2">
                        <h2 class="text-heading mb-3"><strong>Penjualan buah sawit</strong></h2>
                        <ul class="w-full lg:w-3/4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                            @if($sales->count())
                                @foreach($sales as $sale)
                                    <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg">
                                        <div class="flex justify-between">
                                            <span>Netto</span>
                                            <span>{{ number_format($sale->netto, 0, ',', '.') }} KG</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Nominal</span>
                                            <span>RP {{ number_format($sale->amount, 0, ',', '.') }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg">Tidak ada penjualan
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
