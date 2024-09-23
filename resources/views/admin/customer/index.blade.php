@extends('layouts/contentNavbarLayout')

@section('title', 'Customer')

@section('content')
    <a href="{{ route('customer.create') }}" class="btn btn-primary float-end">Create new</a>
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Customer</span>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('rental-history', $customer->id) }}"><i
                                                class="bx bx-history me-1"></i> Rental history</a>
                                        <a class="dropdown-item" href="{{ route('customer.edit', $customer->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form method="POST" action="{{ route('customer.destroy', $customer->id) }}"
                                            accept-charset="UTF-8">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item" title="Delete Customer"
                                                onclick="return confirm('Click Ok to delete Customer.')">
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
