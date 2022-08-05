<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Bulan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pembelian
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penjualan
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr class="border-b odd:bg-white even:even:bg-slate-50">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                    <a href="{{ route('report.show', $report['month']) }}" class="text-primary hover:underline">{{ date("F", mktime(0, 0, 0, $report['month'], 10)) }}</a>
                                </th>
                                <td class="px-6 py-4">
                                    Total netto: {{ number_format($report['total_netto_purchase']) }} KG
                                    <span class="block">Total pembelian: Rp {{ number_format($report['total_amount_purchase']) }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    Total netto: {{ number_format($report['total_netto_sales']) }} KG
                                    <span class="block">Total pembelian: Rp {{ number_format($report['total_amount_sales']) }}</span>
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
