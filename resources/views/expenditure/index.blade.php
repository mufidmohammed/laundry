@extends('layouts.main')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <h1>Expenditure</h1>
        </div>
    </div>
</div>

{{-- <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <div class="card p-3">

                    @include('partials.message')

                    <div class="card-heading ml-3">
                        <a href="{{ route('expenditure.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='table-expenditure' class="table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th colspan="2">Details</th>
                                        <th>Total</th>
                                        <th>Employee</th>
                                        <th>Expenditure date</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_expenditure as $expenditure)
                                    <tr>
                                        <td>{{ $expenditure->id }}</td>
                                        <td colspan="2">{{ $expenditure->details }}</td>
                                        <td>{{ $expenditure->total }}</td>
                                        <td>{{ $expenditure->employee->name }}</td>
                                        <td>{{ $expenditure->date }}</td>
                                        <td>
                                            <a href="{{ route('expenditure.edit', $expenditure->id) }}"
                                                class="btn btn-primary mr-2 mb-1">Edit <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form class="form-inline" id="{{ $expenditure->id }}"
                                                action="{{ route('expenditure.destroy', $expenditure->id) }}"
                                                onsubmit="return confirm('You are about to delete a record. Proceed?')"
                                                method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger" type="submit">Remove <i
                                                        class="fa fa-times"></i></button>
                                            </form>
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
</section> --}}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <div class="card p-3">

                    @include('partials.message')

                    <div class="card-heading ml-3">
                        <a href="{{ route('expenditure.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-expenditure" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Details</th>
                                        <th>Total</th>
                                        <th>Employee</th>
                                        <th>Expenditure Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_expenditure as $expenditure)
                                        <tr>
                                            <td>{{ $expenditure->id }}</td>
                                            <td>{{ $expenditure->details }}</td>
                                            <td>Ghc {{ $expenditure->total }}</td>
                                            <td>{{ $expenditure->employee->name }}</td>
                                            <td>{{ \Carbon\Carbon::create($expenditure->date)->diffForHumans() }}</td>
                                            <td>
                                                <div class="row d-flex justify-content-center">
                                                    <a href="{{ route('expenditure.edit', $expenditure->id) }}" class="btn btn-primary mr-2 mb-1">
                                                        Edit <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form class="form-inline" id="{{ $expenditure->id }}"
                                                        action="{{ route('expenditure.destroy', $expenditure->id) }}"
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
$('#table-expenditure').DataTable({});
</script>
@endsection
