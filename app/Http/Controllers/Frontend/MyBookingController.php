<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Enums\RentalStatus;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBookingController extends Controller
{
  public function currentBooking()
  {
    $rentals = Auth::user()->rentals()->where('status', RentalStatus::ONGOING->value)->orderBy('id', 'desc')->get();
    return view('my-bookings.current-booking', compact('rentals'));
  }

  public function pastBooking()
  {
    $rentals = Auth::user()->rentals()->where('status', '!=', RentalStatus::ONGOING->value)->orderBy('id', 'desc')->get();
    return view('my-bookings.past-booking', compact('rentals'));
  }

  public function cancelBooking(Request $request, Rental $rental)
  {
    if ($rental->user_id == $request->user()->id) {
      //Cancel a booking (only if the rental has not started yet).
      if ($rental->status == RentalStatus::ONGOING->value && $rental->start_date > date('Y-m-d')) {
        $rental->status = RentalStatus::CANCELLED->value;
        $rental->save();
        return redirect()->back()->with('success', 'Booking has been cancelled successfully.');
      }
      return redirect()->back()->with('error', 'Sorry, this booking cannot be cancelled.');
    } else {
      abort(403, 'You are not authorized to cancel this booking.');
    }
  }
}
