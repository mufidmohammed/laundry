@extends('layouts.main')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <h1>Employees</h1>
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
                        <a href="{{ route('employee.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='table-employee' class="table-striped table-hover table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name<sup>(M/F)</sup></th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Salary</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->name }}<sup>({{ $employee->gender }})</sup></td>
                                        <td>{{ $employee->address }}</td>
                                        <td>{{ $employee->contact }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>{{ \Carbon\Carbon::create($employee->start_date)->diffForHumans() }}</td>
                                        <td>{{ $employee->end_date ? \Carbon\Carbon::create($employee->end_date)->diffForHumans() : '----' }}</td>
                                        <td>
                                            <div class="row d-flex justify-content-center">
                                                <a href="{{ route('employee.edit', $employee->id) }}"
                                                    class="btn btn-primary mr-2 mb-1">Edit <i class="fa fa-edit"></i>
                                                </a>
                                                <form class="form-inline" id="{{ $employee->id }}"
                                                    action="{{ route('employee.destroy', $employee->id) }}"
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
$('#table-employee').DataTable({});
</script>
@endsection
