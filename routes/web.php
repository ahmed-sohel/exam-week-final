<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\MyBookingController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware([CustomerMiddleware::class, 'verified'])->name('dashboard');

Route::middleware([CustomerMiddleware::class])->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/current-booking', [MyBookingController::class, 'currentBooking'])->name('currentBooking');
  Route::get('/past-booking', [MyBookingController::class, 'pastBooking'])->name('pastBooking');
  Route::post('/cancel-booking/{rental}', [MyBookingController::class, 'cancelBooking'])->name('cancelBooking');
});

Route::post('/cars', [FrontendCarController::class, 'filter'])->name('filterCars');
Route::get('/cars/{id}/', [FrontendCarController::class, 'details'])->name('carDetails');
Route::post('/cars/{car}/book', [FrontendRentalController::class, 'book'])->name('bookCar');

require __DIR__ . '/auth.php';


// admin dashboard
Route::prefix('admin')->group(function () {
  // authentication
  Route::get('/login', [AdminController::class, 'index'])->name('auth-login-basic');
  Route::post('/login', [AdminController::class, 'login'])->name('login.attempt');

  Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'analytics'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::resource('/car', CarController::class);
    Route::resource('/customer', CustomerController::class);
    Route::resource('/rental', RentalController::class);
    Route::get('/rental-history/{customer}', [CustomerController::class, 'rentalHistory'])->name('rental-history');
  });
});
