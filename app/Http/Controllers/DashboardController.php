<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        $transactions = Transaction::with('laundry')->get();

        foreach ($transactions as $transaction) {
            $income += $transaction->weight * $transaction->laundry->price;
        }
        foreach (Expenditure::all() as $expenditure) {
            $total_expense += $expenditure->total;
        }

        $net_profit = $income - $total_expense;

        $transactionCounts = $this->transactionCount($transactions);

        return view('dashboard', compact('income', 'customers', 'total_expense', 'net_profit', 'transactionCounts'));
    }

    public function transactionCount($transactions): array
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $transactionCounts = [];

        // initialize transaction count for each day of the week to zero
        foreach ($daysOfWeek as $day) {
            $transactionCounts[$day] = 0;
        }

        // Count the transactions for each day of the week
        foreach ($transactions as $transaction) {
            $dayOfWeek = Carbon::parse($transaction->created_at)->format('l');
            $transactionCounts[$dayOfWeek] += $transaction->laundry->price * $transaction->weight;
        }

        return $transactionCounts;
    }
}
