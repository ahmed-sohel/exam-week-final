@extends('layouts/contentNavbarLayout')

@section('title', 'Car')

@section('content')
    <a href="{{ route('car.index') }}" style="float: right">
        <button type="button" class="btn btn-primary" title="Back">
            <i class="bx bx-arrow-back me-1"></i> Back
        </button>
    </a>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Car details</span>
    </h4>
    <!-- Striped Rows -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset($car->image) }}" width="100%" style="max-height: 50vh" alt="Image">
                </div>
                <div class="col-md-7">
                    <p><b>Car Name:</b> {{ $car->name }}</p>
                    <p><b>Brand:</b> {{ $car->brand }}</p>
                    <p><b>Model:</b> {{ $car->model }}</p>
                    <p><b>Year of Manufacture:</b> {{ $car->year }}</p>
                    <p><b>Car Type:</b> {{ $car->car_type }}</p>
                    <p><b>Daily Rent Price:</b> {{ $car->daily_rent_price }}</p>
                    <p><b>Availability Status:</b> {{ $car->availability ? 'Available' : 'Not Available' }}</p>

                    <form method="POST" action="{{ route('car.destroy', $car->id) }}" accept-charset="UTF-8">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" title="Delete Car"
                            onclick="return confirm('Click Ok to delete Car.')">
                            <i class="bx bx-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Striped Rows -->

@endsection
