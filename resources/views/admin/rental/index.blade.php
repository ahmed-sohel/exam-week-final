@extends('layouts/contentNavbarLayout')

@section('title', 'Rental')

@section('content')
    <a href="{{ route('rental.create') }}" class="btn btn-primary float-end">Create new</a>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Rental</span>
    </h4>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Striped Rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Car</th>
                        <th>Model</th>
                        <th>Duration</th>
                        <th>Rent</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($rentals as $rental)
                        <tr>
                            <td>{{ $rental->user->name }}</td>
                            <td>{{ $rental->car->name }}</td>
                            <td>{{ $rental->car->model }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($rental->start_date)->format('d M, Y') . ' - ' . Carbon\Carbon::parse($rental->end_date)->format('d M, Y') }}
                            </td>
                            <td>{{ $rental->total_cost }} BDT</td>
                            <td>{{ $rental->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('rental.edit', $rental->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form method="POST" action="{{ route('rental.destroy', $rental->id) }}"
                                            accept-charset="UTF-8">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item" title="Delete Rental"
                                                onclick="return confirm('Click Ok to delete Rental.')">
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
