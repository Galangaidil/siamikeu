<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-heading leading-tight">
            <div class="flex space-x-8">

                <!-- Previous button -->
                <a href="{{ route('sale.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                </a>

                <span>{{ __('Edit penjualan') }}</span>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="mx-auto w-full sm:max-w-md px-6 py-4 overflow-hidden sm:rounded-lg"
                    x-data="{ netto: {{ $sale->netto }}, price: {{ $sale->price }}, amount: {{ $sale->amount }} }">


                    @if (session()->has('message'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            <div class="font-medium">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('sale.update', $sale->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- Netto | Berat bersih -->
                        <div>
                            <x-label for="netto" :value="__('Netto (KG)')" />

                            <x-input id="netto" class="block mt-1 w-full" type="number" name="netto"
                                :value="old('netto')" x-model.number="netto" required autofocus />
                        </div>

                        <!-- Harga sawit -->
                        <div class="mt-4">
                            <x-label for="price" :value="__('Harga')" />

                            <x-input id="price" class="block mt-1 w-full" type="number" name="price"
                                :value="old('price')" x-model.number="price" required />
                        </div>

                        <!-- Total -->
                        <div class="mt-4" x-effect="amount = netto * price">
                            <x-label for="amount" :value="__('Total')" />

                            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount"
                                :value="old('amount')" x-model.number="amount" required />
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <button type="reset"
                                class="text-paragraph bg-white border border-slate-300 focus:outline-none hover:bg-slate-100 focus:ring-4 focus:ring-slate-200 font-medium rounded-lg text-sm px-5 py-2.5">
                                Batal
                            </button>

                            <x-button>
                                {{ __('Simpan') }}
                            </x-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
