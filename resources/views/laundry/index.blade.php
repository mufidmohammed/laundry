@extends('layouts.main')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <h1>Laundry</h1>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card p-3">

                    @include('partials.message')

                    <div class="card-heading ml-3">
                        <a href="{{ route('laundry.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="card-body">
                        <table id='table-laundry' class="table responsive table-striped">
                            <thead>
                                <tr>
                                    <th class="px-2">ID</th>
                                    <th class="px-2">Type</th>
                                    <th class="px-2">Price</th>
                                    <th class="px-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laundries as $laundry)
                                <tr>
                                    <td class="px-2">{{ $laundry->id }}</td>
                                    <td class="px-2">{{ $laundry->type }}</td>
                                    <td class="px-2">Ghc{{ $laundry->price }}</td>
                                    <td class="px-2">
                                        <div class="row d-flex ">
                                            <a href="{{ route('laundry.edit', $laundry->id) }}"
                                                class="btn btn-primary mr-2 mb-1"><i class="fa fa-edit"></i></a>
                                            <form class="form-inline" id="{{ $laundry->id }}"
                                                action="{{ route('laundry.destroy', $laundry->id) }}"
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
</section>

@endsection

@section('scripts')
<script>
$('#table-laundry').DataTable({});
</script>
@endsection
