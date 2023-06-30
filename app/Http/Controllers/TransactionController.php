<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();

        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        $customers = Customer::all();
        $employees = Employee::all();
        $laundries = Laundry::all();

        return view('transaction.create', compact('customers', 'employees', 'laundries'));
    }

    public function store(TransactionRequest $request)
    {
        Transaction::create($request->validated());

        return to_route('transaction.index')->with('message', 'Transaction added successfully');
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id);

        $customers = Customer::all();
        $employees = Employee::all();
        $laundries = Laundry::all();

        return view('transaction.edit', compact('transaction', 'customers', 'employees', 'laundries'));
    }

    public function update(TransactionRequest $request, $id)
    {
        $transaction = Transaction::find($id);

        $transaction->update($request->validated());

        return to_route('transaction.index')->with('message', 'Transaction updated successfully');
    }

    public function destroy($id)
    {
        Transaction::destroy($id);

        return to_route('transaction.index')->with('message', 'Transaction deleted successfully');
    }
}
