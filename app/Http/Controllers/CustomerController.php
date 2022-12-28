<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(CustomerRequest $request)
    {
        $data = $request->validated();

        Customer::create($request->validated());

        return to_route('customer.index')->with('message', 'Customer added successfully');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customer.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->validated());

        return to_route('customer.index')->with('message', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        Customer::destroy($id);

        return to_route('customer.index')->with('message', 'Customer deleted successfully');
    }
}
