@extends('frontend-layout.app')

@section('title', 'Rent a car')

@section('content')


    <div class="flex my-10">
        <!-- Sidebar for Filters -->
        <div class="w-1/4 p-4 bg-gray-100">
            <h2 class="text-xl text-black font-bold mb-4">Filters</h2>
            <form action="{{ route('filterCars') }}" method="POST">
                @csrf
                <!-- Car Type Filter -->
                <div class="mb-4">
                    <h3 class="text-lg text-black font-semibold">Type</h3>
                    <select name="car_type" class="w-full mt-2 p-2 border rounded text-black">
                        <option value="">All</option>
                        @foreach ($carTypes as $type)
                            <option value="{{ $type }}" {{ $type == request('car_type') ? 'selected' : '' }}>
                                {{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand Filter -->
                <div class="mb-4">
                    <h3 class="text-lg text-black font-semibold">Brand</h3>
                    <select name="brand" class="w-full mt-2 p-2 border rounded text-black">
                        <option value="">All</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand }}" {{ $brand == request('brand') ? 'selected' : '' }}>
                                {{ $brand }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Daily Rent Price Filter -->
                <div class="mb-4">
                    <h3 class="text-lg text-black font-semibold">Daily Rent Price</h3>
                    <div class="flex justify-between gap-3 text-black text-sm mt-2">
                        <div>
                            <label for="min_price">Min</label>
                            <input type="number" name="min_price" value="{{ request('min_price') }}"
                                class="w-full mt-2 rounded">

                        </div>
                        <div>
                            <label for="max_price">Max</label>

                            <input type="number" name="max_price" value="{{ request('max_price') }}"
                                class="w-full mt-2 rounded">

                        </div>

                    </div>
                </div>

                <!-- Apply Filters Button -->
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Filter</button>
                <a href="{{ route('home') }}"
                    class="w-full block text-center mt-5 bg-blue-500 text-white py-2 rounded">Clear</a>
            </form>
        </div>

        <!-- Cars Grid -->
        <div class="w-3/4 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($cars as $car)
                    <div class="card bg-white shadow-md rounded-lg overflow-hidden">
                        <img src="{{ $car->image }}" alt="{{ $car->name }}"
                            class="w-full h-40 transition duration-500 hover:scale-105">
                        <div class="p-4">
                            <h2 class="text-lg text-black font-bold">{{ $car->name }}</h2>
                            <p class="text-gray-500">{{ $car->brand }}</p>
                            <p class="text-green-500 font-bold">Daily Rent:
                                {{ number_format($car->daily_rent_price) }}</p>
                        </div>
                        <a href="{{ route('carDetails', $car->id) }}">
                            <button
                                class="block w-full p-4 bg-slate-300 hover:bg-slate-400 duration-500 text-black text-center font-bold">View
                                Details</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
