@extends('frontend-layout.app')

@section('title', 'Car Details')

@section('content')


    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="w-full flex">
                <!-- Car Image -->
                <div class="w-1/2">
                    <img src="{{ asset($car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover">
                </div>

                <!-- Car Details -->
                <div class="w-1/2 mx-auto p-6">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $car->name }}</h1>
                    <p class="text-lg text-gray-600">Brand: {{ $car->brand }}</p>
                    <p class="text-lg text-gray-600">Model: {{ $car->model }}</p>
                    <p class="text-lg text-gray-600">Year: {{ $car->year }}</p>
                    <p class="text-lg text-gray-600">Type: {{ $car->car_type }}</p>
                    <p class="text-xl text-black font-bold mt-4 mb-6">Daily Rent: BDT
                        {{ number_format($car->daily_rent_price) }}
                    </p>
                    @if (session('error'))
                        <div class="alert text-center text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert text-center text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('bookCar', $car->id) }}" method="POST" class="flex justify-between">
                        @csrf
                        <div>
                            <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date:</label>
                            <input type="date" name="start_date" id="start_date" min="{{ date('Y-m-d') }}" required
                                class="w-full text-black rounded-md">
                        </div>
                        <div>
                            <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date</label>
                            <input type="date" name="end_date" id="end_date" min="{{ date('Y-m-d') }}" required
                                class="w-full text-black rounded-md">
                        </div>
                        <button type="submit"
                            class="bg-blue-300 hover:bg-blue-500 h-[2.75rem] mt-8 px-12 duration-500 text-black hover:text-white rounded-md text-center font-bold">
                            Book Now
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>

@endsection
