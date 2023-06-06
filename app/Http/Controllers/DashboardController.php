<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Expenditure;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::count();

        $income = 0;
        $total_expense = 0;

        foreach(Transaction::with('laundry')->get() as $transaction) {
            $income += $transaction->weight * $transaction->laundry->price;
        }
        foreach(Expenditure::all() as $expenditure) {
            $total_expense += $expenditure->total;
        }

        $net_profit = $income - $total_expense;

        return view('dashboard', compact('income', 'customers', 'total_expense', 'net_profit'));
    }
}
