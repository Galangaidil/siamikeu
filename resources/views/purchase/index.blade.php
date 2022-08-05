<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 mb-5">
                    <a href="{{ route('purchase.create') }}"
                       class="text-white bg-primary hover:bg-primary/90 active:bg-sky-600 focus:outline-none focus:ring focus:ring-primary/30 font-medium rounded-lg text-sm px-5 py-2.5">Baru</a>
                </div>

                <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama petani
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bruto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Netto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchases as $purchase)
                            <tr class="border-b odd:bg-white even:even:bg-slate-50">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    {{ $purchase->name }}
                                    <span
                                        class="block text-slate-400 text-xs">{{ $purchase->created_at->diffForHumans() }}</span>
                                </th>
                                <td class="px-6 py-4">
                                    {{ number_format($purchase->bruto, 0, ',', '.') }} KG
                                </td>
                                <td class="px-6 py-4">
                                    {{ number_format($purchase->netto, 0, ',', '.') }} KG
                                </td>
                                <td class="px-6 py-4">
                                    RP {{ number_format($purchase->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    RP {{ number_format($purchase->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 flex justify-end space-x-3 ">

                                    <!-- Show -->
                                    <a href="{{ route('purchase.show', $purchase->id) }}"
                                       class="font-medium text-blue-600 hover:underline">Lihat</a>

                                    <!-- Edit -->
                                    <a href="{{ route('purchase.edit', $purchase->id) }}"
                                       class="font-medium text-orange-500 hover:underline">Edit</a>

                                    <!-- Delete -->
                                    <form action="{{ route('purchase.destroy', $purchase->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                                class="font-medium text-red-500 hover:underline"
                                                onclick="return confirm('Kamu yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
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
