@extends('layouts/contentNavbarLayout')

@section('title', 'Customer')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Create Customer</span>
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
                <form action="{{ url('admin/customer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="defaultFormControlInput"
                                placeholder="Customer name" required />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                required />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password" pattern=".{8,}" title="Must contain at least 8 or more characters"
                                required />
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary float-end mb-2">Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
