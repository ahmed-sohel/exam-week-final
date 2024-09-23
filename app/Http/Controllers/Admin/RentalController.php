<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $rentals = Rental::all();
    return view('admin.rental.index', compact('rentals'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $customers = User::where('role', 'customer')->get();
    $cars = Car::where('availability', 1)->get();
    return view('admin.rental.create', compact('customers', 'cars'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'customer_id' => ['required'],
      'car_id' => ['required'],
      'start_date' => ['required'],
      'end_date' => ['required'],
    ]);

    $carId = $request->get('car_id');
    $startDate = $request->get('start_date');
    $endDate = $request->get('end_date');

    //check if car is available for selected date range
    if (!$this->isCarAvailable($carId, $startDate, $endDate)) {
      return redirect()->back()->withInput()->with('error', 'Car is not available for selected date range.');
    }


    //get days between two dates
    $days = (strtotime($endDate) - strtotime($startDate)) / 86400 == 0 ? 1 : (strtotime($endDate) - strtotime($startDate)) / 86400;
    $car = Car::find($carId);
    $total_price = $days * $car->daily_rent_price;

    $rental = new Rental();
    $rental->user_id = $request->get('customer_id');
    $rental->car_id = $carId;
    $rental->start_date = $startDate;
    $rental->end_date = $endDate;
    $rental->total_cost = $total_price;
    $rental->status = 'Ongoing';
    $rental->save();

    return redirect('admin/rental')->with('success', 'Rental created.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Rental $rental)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Rental $rental)
  {
    $customers = User::where('role', 'customer')->get();
    $cars = Car::where('availability', 1)->get();
    return view('admin.rental.edit', compact('rental', 'customers', 'cars'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Rental $rental)
  {
    $request->validate([
      'customer_id' => ['required'],
      'car_id' => ['required'],
      'start_date' => ['required'],
      'end_date' => ['required'],
    ]);

    $carId = $request->get('car_id');
    $startDate = $request->get('start_date');
    $endDate = $request->get('end_date');

    //check if car is available for selected date range
    if (!$this->isCarAvailable($carId, $startDate, $endDate, $rental->id)) {
      return redirect()->back()->withInput()->with('error', 'Car is not available for selected date range.');
    }

    //get days between two dates
    $days = (strtotime($endDate) - strtotime($startDate)) / 86400 == 0 ? 1 : (strtotime($endDate) - strtotime($startDate)) / 86400;
    $car = Car::find($carId);
    $total_price = $days * $car->daily_rent_price;

    $rental->user_id = $request->get('customer_id');
    $rental->car_id = $carId;
    $rental->start_date = $startDate;
    $rental->end_date = $endDate;
    $rental->total_cost = $total_price;
    $rental->total_cost = $total_price;
    $rental->status = $request->get('status');
    $rental->save();

    return redirect('admin/rental')->with('success', 'Rental updated.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Rental $rental)
  {
    $rental->delete();
    return redirect('admin/rental')->with('success', 'Rental deleted.');
  }

  public function isCarAvailable($carId, $startDate, $endDate, $rentalId = null)
  {
    $dateOverlap = Rental::availableForDateRange($carId, $startDate, $endDate, $rentalId)->exists();

    return !$dateOverlap;
  }
}
