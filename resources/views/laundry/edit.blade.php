@extends('layouts.main')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card p-3 m-3">
                    <div class="card-heading">
                        <div class="card-title pl-3">Update laundry</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laundry.update', $laundry->id) }}" method="POST">
                            @csrf
                            @method("PATCH")

                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" value="{{ $laundry->type }}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="type">Price</label>
                                <input type="number" step="0.01" name="price" value="{{ $laundry->price }}"
                                    class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-success btn-lg col-sm-1" />
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
