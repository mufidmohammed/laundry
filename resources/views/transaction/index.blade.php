@extends('layouts.main')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <h1>Transactions</h1>
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
                        <a href="{{ route('transaction.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='table-transaction' class="table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        {{-- <th>Customer Name<sup>(M/F)</sup></th> --}}
                                        <th>Employee Name<sup>(M/F)</sup></th>
                                        <th>Laundry Type</th>
                                        {{-- <th>Weight</th> --}}
                                        <th>Total</th>
                                        <th>Order Date</th>
                                        <th>Finish Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        {{-- <td>{{ $transaction->customer->name }}</td> --}}
                                        <td>{{ $transaction->employee->name }}</td>
                                        <td>{{ $transaction->laundry->type }}</td>
                                        {{-- <td>{{ $transaction->weight }}</td> --}}
                                        <td>Ghc {{ $transaction->laundry->price * $transaction->weight }}</td>
                                        <td>{{ \Carbon\Carbon::create($transaction->order_date)->diffForHumans() }}</td>
                                        <td>{{ $transaction->finish_date ? \Carbon\Carbon::create($transaction->finish_date)->diffForHumans() : '----' }}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                <a href="{{ route('transaction.edit', $transaction->id) }}"
                                                    class="btn btn-primary mr-2 mb-1">Edit <i class="fa fa-edit"></i></a>
                                                <form class="form-inline" id="{{ $transaction->id }}"
                                                    action="{{ route('transaction.destroy', $transaction->id) }}"
                                                    onsubmit="return confirm('You are about to delete a record. Proceed?')"
                                                    method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger" type="submit">Remove <i
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
$('#table-transaction').DataTable({});
</script>
@endsection
