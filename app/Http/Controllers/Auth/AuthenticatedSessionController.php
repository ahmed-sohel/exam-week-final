<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
  /**
   * Display the login view.
   */
  public function create(): View
  {
    return view('auth.login');
  }

  /**
   * Handle an incoming authentication request.
   */
  public function store(LoginRequest $request): RedirectResponse
  {
    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    // Attempt to authenticate the user
    if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
      throw ValidationException::withMessages([
        'email' => __('auth.failed'),
      ]);
    }

    // get url from session if user came from booking page
    $previous_url = $request->session()->pull('previous_url', route('profile.edit'));
    //remove session
    session()->forget('previous_url');

    $user = Auth::user();

    // Check if the user has the role 'customer'
    if ($user->role !== 'customer') {
      Auth::logout(); // Logout the user

      // Redirect back with an error message
      return redirect()->back()->withErrors([
        'email' => 'You are not authorized to access this section.',
      ]);
    }

    $request->session()->regenerate();

    return redirect()->intended($previous_url);
  }

  /**
   * Destroy an authenticated session.
   */
  public function destroy(Request $request): RedirectResponse
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
