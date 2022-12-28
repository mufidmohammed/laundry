@extends('layouts.main')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card p-3 m-3">
                    <div class="card-heading">
                        <div class="card-title pl-3">New Transaction</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaction.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="customer">customer</label>
                                <select name="customer_id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($customers as $customer)
                                        <option @selected(old('customer_id') == $customer->id) value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
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
                                <label for="laundry">laundry</label>
                                <select name="laundry_id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($laundries as $laundry)
                                        <option @selected(old('laundry_id') == $laundry->id) value="{{ $laundry->id }}">{{ $laundry->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="weight">weight</label>
                                <input type="number" step="0.01" name="weight" value="{{ old('weight') }}"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="order_date">order date</label>
                                <input type="datetime-local" name="order_date" value="{{ old('order_date') }}"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="finish_date">finish date</label>
                                <input type="datetime-local" name="finish_date" value="{{ old('finish_date') }}"
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
