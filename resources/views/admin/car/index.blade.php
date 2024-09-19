@extends('layouts/contentNavbarLayout')

@section('title', 'Car')

@section('content')
    <a href="{{ route('car.create') }}" class="btn btn-primary float-end">Create new</a>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Car</span>
    </h4>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Striped Rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Rent</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($cars as $car)
                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-lg pull-up" title="{{ $car->name . ' Icon' }}">
                                        <img src="{{ asset($car->image) }}" alt="Logo" width="100" height="100"
                                            class="rounded-circle">
                                    </li>
                                </ul>
                            </td>
                            <td>{{ $car->name }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->year }}</td>
                            <td>{{ $car->daily_rent_price }}</td>
                            <td>{{ $car->availability ? 'Available' : 'Not Available' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('car.show', $car->id) }}"><i
                                                class="bx bx-comment-detail me-1"></i> Details</a>
                                        <a class="dropdown-item" href="{{ route('car.edit', $car->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form method="POST" action="{{ route('car.destroy', $car->id) }}"
                                            accept-charset="UTF-8">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item" title="Delete Car"
                                                onclick="return confirm('Click Ok to delete Car.')">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->

@endsection
