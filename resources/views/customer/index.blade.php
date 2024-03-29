@extends('layouts.main')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <h1>Customers</h1>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <div class="card p-3">

                    @include('partials.message')

                    <div class="card-heading ml-3">
                        <a href="{{ route('customer.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='table-customer' class="table table-striped" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name<sup>(M/F)</sup></th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->name }}<sup>({{ $customer->gender }})</sup></td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->contact }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('customer.edit', $customer->id) }}"
                                                    class="btn btn-primary mr-2 mb-1"><i class="fa fa-edit"></i>
                                                </a>
                                                <form class="form-inline" id="{{ $customer->id }}"
                                                    action="{{ route('customer.destroy', $customer->id) }}"
                                                    onsubmit="return confirm('You are about to delete a record. Proceed?')"
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="fa fa-times"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
$('#table-customer').DataTable({});
</script>
@endsection
