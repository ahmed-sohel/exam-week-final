<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $customers = User::where('role', 'customer')->get();
    return view('admin.customer.index', compact('customers'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.customer.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email'],
      'password' => ['required', 'min:8'],
    ]);

    $customer = new User();
    $customer->name = $request->get('name');
    $customer->email = $request->get('email');
    $customer->password = Hash::make($request->get('password'));
    $customer->role = 'customer';
    $customer->save();

    return redirect('admin/customer')->with('success', 'Customer created.');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $customer)
  {
    return view('admin.customer.edit', compact('customer'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $customer)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email'],
      'password' => ['nullable', 'min:8'],
    ]);

    $customer->name = $request->get('name');
    $customer->email = $request->get('email');
    if ($request->get('password')) {
      $customer->password = Hash::make($request->get('password'));
    }
    $customer->save();

    return redirect('admin/customer')->with('success', 'Customer updated.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $customer)
  {
    if ($customer->role === 'admin') {
      return redirect('admin/customer')->with('error', 'Admin cannot be deleted.');
    }
    $customer->delete();

    return redirect('admin/customer')->with('success', 'Customer deleted.');
  }

  /**
   * Get rental history of a customer.
   */
  public function rentalHistory(User $customer)
  {
    $rentals = $customer->rentals()->get();
    return view('admin.customer.rental-history', compact('customer', 'rentals'));
  }
}
