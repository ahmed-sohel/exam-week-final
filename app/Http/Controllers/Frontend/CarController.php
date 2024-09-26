<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
  public function details($id)
  {
    $car = Car::find($id);
    return view('car-details', compact('car'));
  }

  public function filter(Request $request)
  {
    // Fetch filters from the request
    $carType = $request->input('car_type');
    $brand = $request->input('brand');
    $minRentPrice = $request->input('min_price');
    $maxRentPrice = $request->input('max_price');

    // Build the query
    $query = Car::query();

    if ($carType) {
      $query->where('car_type', $carType);
    }

    if ($brand) {
      $query->where('brand', $brand);
    }

    if ($minRentPrice) {
      $query->where('daily_rent_price', '>=', $minRentPrice);
    }
    if ($maxRentPrice) {
      $query->where('daily_rent_price', '<=', $maxRentPrice);
    }

    // Execute the query
    $cars = $query->orderBy('daily_rent_price')->get();

    $carTypes = Car::pluck('car_type')->unique()->toArray();
    $brands = Car::pluck('brand')->unique()->toArray();
    // Return the view with the filtered cars
    return view('welcome', compact('cars', 'carTypes', 'brands'));
  }
}
