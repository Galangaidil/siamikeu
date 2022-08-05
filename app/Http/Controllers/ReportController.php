<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $purchases = DB::table('purchases')->selectRaw('month(created_at) as month, sum(netto) as total_netto, sum(amount) as total_amount')->groupByRaw('month(created_at)')->latest('month')->get();
        $sales = DB::table('sales')->selectRaw('month(created_at) as month, sum(netto) as total_netto_sales, sum(amount) as total_amount_sales')->groupByRaw('month(created_at)')->latest('month')->get();

        $purchases = $purchases->toArray();
        $sales = $sales->toArray();

        $reports = array();

        foreach ($purchases as $key => $purchase) {
            if ($purchase->month == $sales[$key]->month) {
                $report_item = [
                    'month' => $purchase->month,
                    'total_netto_purchase' => $purchase->total_netto,
                    'total_amount_purchase' => $purchase->total_amount,
                    'total_netto_sales' => $sales[$key]->total_netto_sales,
                    'total_amount_sales' => $sales[$key]->total_amount_sales,
                ];
                array_push($reports, $report_item);
            }
        }

        return view('report.index', ['reports' => $reports]);
    }

    public function show(Request $request)
    {
        $purchases = DB::table('purchases')->whereMonth('created_at', $request->month)->latest()->get();
        $sales = DB::table('sales')->whereMonth('created_at', $request->month)->get();

        return view('report.show', [
            'purchases' => $purchases,
            'sales' => $sales,
            'month_name' => date("F", mktime(0, 0, 0, $request->month, 10))
        ]);
    }
}
