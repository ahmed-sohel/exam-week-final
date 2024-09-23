<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      // dd(Auth::user());
      return redirect()->intended('admin/dashboard');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }

  public function analytics(Request $request)
  {
    $cars = Car::all();
    $totalCars = $cars->count();
    $availableCars = $cars->where('availability', 1)->count();

    $rentals = Rental::all();
    $totalRents = $rentals->count();
    $profit = $rentals->where('status', 'Completed')->sum('total_cost');

    return view('content.dashboard.dashboards-analytics', compact('totalCars', 'availableCars', 'totalRents', 'profit'));
  }

  public function logout(Request $request)
  {
    Auth::logout(); //logout user
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('auth-login-basic');
  }
}
