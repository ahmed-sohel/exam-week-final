@extends('layouts/contentNavbarLayout')

@section('title', 'Customer')

@section('content')
    <a href="{{ route('customer.index') }}" style="float: right">
        <button type="button" class="btn btn-primary" title="Back">
            <i class="bx bx-arrow-back me-1"></i> Back
        </button>
    </a>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Edit Customer</span>
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
                <form action="{{ url('admin/customer', $customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div>
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $customer->name }}" class="form-control"
                                id="defaultFormControlInput" placeholder="Customer name" required />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $customer->email }}" id="email"
                                class="form-control" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password" pattern=".{8,}" title="Must contain at least 8 or more characters" />
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
