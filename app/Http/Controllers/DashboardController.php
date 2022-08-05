<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomer = Customer::count();
        $today = Carbon::today();

        $todayPurchases = DB::table('purchases')->whereDay('created_at', $today)->count();
        $totalNetto = DB::table('purchases')->whereDay('created_at', $today)->sum('netto');
        $totalAmount = DB::table('purchases')->whereDay('created_at', $today)->sum('amount');

        return view('dashboard', [
            'totalCustomer' => $totalCustomer,
            'todayPurchases' => $todayPurchases,
            'totalNetto' => $totalNetto,
            'totalAmount' => $totalAmount
        ]);
    }
}
