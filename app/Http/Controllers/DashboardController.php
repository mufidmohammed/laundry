<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Expenditure;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $employees = Employee::count();

        $total_income = 0;
        $total_expense = 0;
        $daily_income = 0;
        $daily_expense = 0;

        $daily_customers = Customer::where('created_at', '>=', $today)->count();

        $transactions = Transaction::with('laundry')->get();

        foreach ($transactions as $transaction) {
            $total_income += $transaction->weight * $transaction->laundry->price;
            if ($transaction->created_at >= $today)
            {
                $daily_income += $transaction->weight * $transaction->laundry->price;
            }
        }

        foreach (Expenditure::all() as $expenditure) {
            $total_expense += $expenditure->total;
            if ($expenditure->created_at >= $today)
            {
                $daily_expense += $expenditure->total;
            }
        }

        $net_profit = $total_income - $total_expense;
        $daily_profit = $daily_income - $daily_expense;

        $transactionCounts = $this->transactionCount($transactions);

        return view('dashboard', compact(
            'total_income', 'employees', 'total_expense', 'net_profit', 'transactionCounts',
            'daily_income', 'daily_expense', 'daily_customers', 'daily_profit'
        ));
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
