<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    $cars = Car::where('availability', 1)->get();
    $carTypes = Car::pluck('car_type')->unique()->toArray();
    $brands = Car::pluck('brand')->unique()->toArray();

    return view('welcome', compact('cars', 'carTypes', 'brands'));
  }
}
