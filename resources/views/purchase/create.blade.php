<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-heading leading-tight">
            <div class="flex space-x-8">
                <!-- Previous button -->
                <a href="{{ route('purchase.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                </a>
                <span>{{ __('Buat pembelian baru') }}</span>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="mx-auto w-full sm:max-w-md px-6 py-4 overflow-hidden sm:rounded-lg"
                    x-data="{ name: null, bruto: 0, netto: null, price: null, amount: null, operational: 0.06 }"
                    x-init="fetch('{{ route('getBuyPrice') }}').then(response => response.json()).then(data => price = data.buy)">


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


                    <form action="{{ route('purchase.store') }}" method="post">
                        @csrf

                        <!-- Nama petani -->
                        <div>
                            <x-label for="name" :value="__('Nama petani')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" list="customers" name="name" :value="old('name')"
                                x-model="name" required autofocus />

                            <datalist id="customers">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->name }}">
                                @endforeach
                            </datalist>
                        </div>

                        <!-- Bruto | Berat kotor -->
                        <div class="mt-4">
                            <x-label for="bruto" :value="__('Bruto (KG)')" />

                            <x-input id="bruto" class="block mt-1 w-full" type="number" name="bruto"
                                :value="old('bruto')" x-model.number="bruto" required />
                        </div>

                        <!-- Netto | Berat bersih -->
                        <div x-effect="netto = Math.floor(bruto - ( bruto * operational))">
                            <x-input id="netto" class="block mt-1 w-full" type="hidden" name="netto"
                                :value="old('netto')" x-model.number="netto" required />
                        </div>

                        <!-- Harga sawit -->
                        <div>
                            <x-input id="price" class="block mt-1 w-full" type="hidden" name="price"
                                :value="old('price')" x-model.number="price" required />
                        </div>

                        <!-- Total -->
                        <div x-effect="amount = netto * price">
                            <x-input id="amount" class="block mt-1 w-full" type="hidden" name="amount"
                                :value="old('amount')" x-model.number="amount" required />
                        </div>

                        <!-- Preview -->
                        <div class="mt-4 text-sm">
                            <h3 class=" text-center text-xl font-semibold text-heading">Pratinjau</h3>

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
                                    <p class="text-paragraph/75"><span x-text="formatMoney(price)"></span> &#10006; <span x-text="formatByComma(netto)"></span></p>
                                    <p class="block text-right font-bold text-primary"><span x-text="formatMoney(amount)"></span></p>
                                </div>
                            </div>
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
