<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Enums\RentalStatus;
use App\Mail\CarBooked;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
  public function book(Car $car, Request $request)
  {
    $request->validate([
      'start_date' => 'required|date',
      'end_date' => 'required|date',
    ]);
    date_default_timezone_set('Asia/Dhaka');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    if (!Auth::check()) {
      // Store the previous URL in the session to redirect after login
      session()->put('previous_url', url()->previous());
      return redirect()->route('login');
    }

    //check if this car is available for selected date range
    if (!$this->isCarAvailable($car->id, $startDate, $endDate)) {
      return redirect()->back()->with('error', 'Sorry, this car is not available for the selected date range.');
    }

    //get days between two dates
    $days = ((strtotime($endDate) - strtotime($startDate)) / 86400) + 1;
    $total_price = $days * $car->daily_rent_price;

    $rental = new Rental();
    $rental->user_id = Auth::user()->id;
    $rental->car_id = $car->id;
    $rental->start_date = $startDate;
    $rental->end_date = $endDate;
    $rental->total_cost = $total_price;
    $rental->status = RentalStatus::ONGOING->value;
    $rental->save();

    //send email to user
    $userName = Auth::user()->name;
    $userMessage = [
      'name' => $userName,
      'messageContent' => "You have booked a car for $days days from $startDate to $endDate.",
      'cost' =>  "$total_price.",
      'carBrand' => $car->brand,
      'carModel' => $car->model,
    ];
    $adminMessage = [
      'name' => "Admin",
      'messageContent' => "$userName has booked a car for $days days from $startDate to $endDate.",
      'cost' =>  "$total_price.",
      'carBrand' => $car->brand,
      'carModel' => $car->model,
    ];
    Mail::to(Auth::user()->email)->send(new CarBooked($userMessage));
    Mail::to('admin@email.com')->send(new CarBooked($adminMessage));

    return redirect()->back()->with('success', 'Car booked successfully.');
  }

  private function isCarAvailable($carId, $startDate, $endDate)
  {
    $dateOverlap = Rental::availableForDateRange($carId, $startDate, $endDate)->exists();

    return !$dateOverlap;
  }
}
