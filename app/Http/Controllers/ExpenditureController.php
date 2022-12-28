<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenditureRequest;

class ExpenditureController extends Controller
{
    public function index()
    {
        $all_expenditure = Expenditure::latest()->get();

        return view('expenditure.index', compact('all_expenditure'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('expenditure.create', compact('employees'));
    }

    public function store(ExpenditureRequest $request)
    {
        Expenditure::create($request->validated());

        return to_route('expenditure.index')->with('message', 'Expenditure added successfully');
    }

    public function edit($id)
    {
        $expenditure = Expenditure::find($id);

        $expenditure->date = \Carbon\Carbon::create($expenditure->date)->toDateTimeLocalString();

        $employees = Employee::all();

        return view('expenditure.edit', compact('expenditure', 'employees'));
    }

    public function update(ExpenditureRequest $request, $id)
    {
        $expenditure = Expenditure::find($id);

        $expenditure->update($request->validated());

        return to_route('expenditure.index')->with('message', 'Expenditure updated successfully');
    }

    public function destroy($id)
    {
        Expenditure::destroy($id);

        return to_route('expenditure.index')->with('message', 'Expenditure deleted successfully');
    }
}
