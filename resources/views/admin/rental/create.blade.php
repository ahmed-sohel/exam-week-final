@extends('layouts/contentNavbarLayout')

@section('title', 'Rental')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Create Rental</span>
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
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ url('admin/rental') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div>
                            <label for="customer" class="form-label">Customer</label>
                            <select name="customer_id" id="customer" class="form-select">
                                <option value="" disabled selected>Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="car" class="form-label">Car</label>
                            <select name="car_id" id="car" class="form-select">
                                <option value="" disabled selected>Select Car</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                        {{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="start_date" class="form-label">Start date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" id="start_date"
                                class="form-control" required />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="end_date" class="form-label">End date</label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}" id="end_date"
                                class="form-control" required />
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
