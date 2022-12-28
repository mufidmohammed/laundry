@extends('layouts.main')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card p-3 m-3">
                    <div class="card-heading">
                        <div class="card-title pl-3">New Expenditure</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('expenditure.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="details">details</label>
                                <input type="text" name="details" class="form-control" value="{{ old('details') }}">
                            </div>
                            <div class="form-group">
                                <label for="employee">employee</label>
                                <select name="employee_id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($employees as $employee)
                                        <option @selected(old('employee_id') == $employee->id) value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="total">total</label>
                                <input type="number" step="0.01" name="total" value="{{ old('total') }}"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="date">Expenditure date</label>
                                <input type="datetime-local" name="date" value="{{ old('date') }}"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-success btn-lg col-sm-1" />
                            </div>

                            @include('partials.errors')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
