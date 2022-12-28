<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Http\Requests\LaundryRequest;

class LaundryController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $laundries = Laundry::latest()->get();

        return view('laundry.index', compact('laundries'));
    }

    public function create()
    {
        return view('laundry.create');
    }

    public function store(LaundryRequest $request)
    {
        Laundry::create($request->validated());

        return to_route('laundry.index')->with('message', 'Laundry added successfully');
    }

    public function edit($id)
    {
        $laundry = Laundry::find($id);

        return view('laundry.edit', compact('laundry'));
    }

    public function update(LaundryRequest $request, $id)
    {
        $laundry = Laundry::find($id);
        $laundry->update($request->validated());

        return to_route('laundry.index')->with('message', 'Laundry updated successfully');
    }

    public function destroy($id)
    {
        Laundry::destroy($id);

        return to_route('laundry.index')->with('message', 'Laundry deleted successfully');
    }
}
