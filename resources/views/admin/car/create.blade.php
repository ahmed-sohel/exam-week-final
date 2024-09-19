@extends('layouts/contentNavbarLayout')

@section('title', 'Car')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Create Car</span>
    </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('admin/car') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="defaultFormControlInput"
                                placeholder="Car name" aria-describedby="defaultFormControlHelp" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" name="brand" id="brand" class="form-control" placeholder="Brand" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="model" class="form-label">Model</label>
                            <input type="text" name="model" id="model" class="form-control" placeholder="Model" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="year" class="form-label">Year</label>
                            <input type="text" name="year" id="year" class="form-control" placeholder="Year" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" id="type" class="form-control" placeholder="Type" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="price" class="form-label">Daily rent price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="year" class="form-label">Availability</label>
                            <select name="availability" id="availability" class="form-select">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" name="photo" type="file" id="formFile">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mb-2">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
