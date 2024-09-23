@extends('layouts/contentNavbarLayout')

@section('title', 'Rental history')

@section('content')
    <a href="{{ route('customer.index') }}" style="float: right">
        <button type="button" class="btn btn-primary" title="Back">
            <i class="bx bx-arrow-back me-1"></i> Back
        </button>
    </a>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Rental history of {{ $customer->name }}</span>
    </h4>
    <!-- Striped Rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Car</th>
                        <th>Model</th>
                        <th>Duration</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($rentals as $rental)
                        <tr>
                            <td>{{ $rental->car->name }}</td>
                            <td>{{ $rental->car->model }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($rental->start_date)->format('d M, Y') . ' - ' . Carbon\Carbon::parse($rental->end_date)->format('d M, Y') }}
                            </td>
                            <td>{{ $rental->total_cost }} BDT</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->

@endsection
