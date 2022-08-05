<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Harga Sawit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @can('create', App\Models\Price::class)
                    <div class="p-6 bg-white border-b border-gray-200 mb-5">
                        <a href="{{ route('price.create') }}"
                           class="text-white bg-primary hover:bg-primary/90 active:bg-sky-600 focus:outline-none focus:ring focus:ring-primary/30 font-medium rounded-lg text-sm px-5 py-2.5">Baru</a>
                    </div>
                @endcan

                <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Beli
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jual
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prices as $price)
                            <tr class="border-b odd:bg-white even:even:bg-slate-50">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    {{ $price->created_at }}
                                </th>
                                <td class="px-6 py-4">
                                    RP{{ number_format($price->buy, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    RP{{ number_format($price->sell, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 flex justify-end space-x-3 ">

                                    @can('update', App\Models\Price::class)
                                        <a href="{{ route('price.edit', $price->id) }}"
                                           class="font-medium text-blue-600 hover:underline">Edit</a>
                                    @endcan

                                    @can('delete', App\Models\Price::class)
                                        <form action="{{ route('price.destroy', $price->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                    class="font-medium text-red-500 hover:underline"
                                                    onclick="return confirm('Kamu yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
