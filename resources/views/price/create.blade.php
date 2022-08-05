<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-heading leading-tight">
            <div class="flex space-x-8">

                <!-- Previous button -->
                <a href="{{ route('price.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                    </svg>
                </a>

                <span>{{ __('Buat harga baru') }}</span>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mx-auto w-full sm:max-w-md px-6 py-4 overflow-hidden sm:rounded-lg">

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


                    <form action="{{ route('price.store') }}" method="post">
                        @csrf

                        <!-- Buy | Harga Beli -->
                        <div>
                            <x-label for="buy" :value="__('Beli')"/>

                            <x-input id="buy" class="block mt-1 w-full" type="number" name="buy"
                                     :value="old('buy')" required autofocus/>
                        </div>

                        <!-- Sell | Harga jual -->
                        <div class="mt-4">
                            <x-label for="sell" :value="__('Jual')"/>

                            <x-input id="sell" class="block mt-1 w-full" type="number" name="sell"
                                     :value="old('sell')" required/>
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
