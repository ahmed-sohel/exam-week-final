<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Current booking
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert bg-green-300 text-black py-3 ps-4">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert bg-red-300 text-black py-3 ps-4">
                    {{ session('error') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full table-auto">
                        <thead class="border-b-1">
                            <tr>
                                <th>Car</th>
                                <th>Model</th>
                                <th>Booking placed</th>
                                <th>Duration</th>
                                <th>Rent</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $rental)
                                <tr class="hover:bg-gray-100 text-center" style="border-top: 1px solid">
                                    <td>{{ $rental->car->name }}</td>
                                    <td>{{ $rental->car->model }}</td>
                                    <td>{{ Carbon\Carbon::parse($rental->created_at)->format('d M, Y') }}</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($rental->start_date)->format('d M, Y') . ' - ' . Carbon\Carbon::parse($rental->end_date)->format('d M, Y') }}
                                    </td>
                                    <td>BDT {{ number_format($rental->total_cost) }}</td>
                                    <td>{{ $rental->status }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cancelBooking', $rental->id) }}"
                                            accept-charset="UTF-8">
                                            @csrf
                                            <button type="submit" title="Cancel Rental"
                                                class="btn bg-red-600 text-white px-3 py-1 my-2 rounded-md"
                                                onclick="return confirm('Click Ok to cancel Rental.')">
                                                Cancel
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
