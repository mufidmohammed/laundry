@extends('layouts.main')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card p-3 m-3">
                    <div class="card-heading">
                        <div class="card-title pl-3">New Customer</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="address">address</label>
                                <input type="text" name="address" value="{{ old('address') }}"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="contact">contact</label>
                                <input type="text" name="contact" value="{{ old('contact') }}"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="gender">gender</label>
                                <select name="gender" class="form-control">
                                    <option value=""></option>
                                    <option @selected(old('gender') == 'M') value="M">Male</option>
                                    <option @selected(old('gender') == 'F') value="F">Female</option>
                                </select>
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
