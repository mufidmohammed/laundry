<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());

        return to_route('employee.index')->with('message', 'Employee added successfully');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $employee->start_date = \Carbon\Carbon::create($employee->start_date)->toDateTimeLocalString();

        if ($employee->end_date)
        {
            $employee->end_date = \Carbon\Carbon::create($employee->end_date)->toDateTimeLocalString();
        }

        return view('employee.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->validated());

        return to_route('employee.index')->with('message', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        Employee::destroy($id);

        return to_route('employee.index')->with('message', 'Employee deleted successfully');
    }
}
