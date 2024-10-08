@extends('layouts/contentNavbarLayout')

@section('title', 'Rental')

@section('content')
    <a href="{{ route('rental.index') }}" style="float: right">
        <button type="button" class="btn btn-primary" title="Back">
            <i class="bx bx-arrow-back me-1"></i> Back
        </button>
    </a>
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
                <form action="{{ url('admin/rental', $rental->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div>
                            <label for="customer" class="form-label">Customer</label>
                            <select name="customer_id" id="customer" class="form-select">
                                <option value="" disabled selected>Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ $customer->id == $rental->user_id ? 'selected' : '' }}>{{ $customer->name }}
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
                                    <option value="{{ $car->id }}" {{ $car->id == $rental->car_id ? 'selected' : '' }}>
                                        {{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="start_date" class="form-label">Start date</label>
                            <input type="date" name="start_date" value="{{ $rental->start_date }}" id="start_date"
                                class="form-control" required />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="end_date" class="form-label">End date</label>
                            <input type="date" name="end_date" value="{{ $rental->end_date }}" id="end_date"
                                class="form-control" required />
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="" disabled selected>Select Status</option>
                                <option value="Ongoing" {{ $rental->status == 'Ongoing' ? 'selected' : '' }}>Ongoing
                                </option>
                                <option value="Completed" {{ $rental->status == 'Completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="Cancelled" {{ $rental->status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
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
