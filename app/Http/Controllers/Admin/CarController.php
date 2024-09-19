<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class CarController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $cars = Car::all();
    return view('admin.car.index', compact('cars'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.car.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required'],
      'brand' => ['required'],
      'model' => ['required'],
      'year' => ['required'],
      'type' => ['required'],
      'price' => ['required'],
      'availability' => ['required'],
      'photo' => ['nullable', 'image'],
    ]);

    $img_path = '';
    if ($request->file('photo')) {
      $manager = new ImageManager(new Driver());
      $name_gen = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension();
      $image = $manager->read($request->file('photo'));
      // $image->scale(width: 300);
      $img_path = 'images/cars/' . $name_gen;
      $image->save($img_path);
    }

    $car = new Car();
    $car->name = $request->get('name');
    $car->brand = $request->get('brand');
    $car->model = $request->get('model');
    $car->year = $request->get('year');
    $car->car_type = $request->get('type');
    $car->daily_rent_price = $request->get('price');
    $car->availability = $request->get('availability');
    $car->image = $img_path;
    $car->save();

    return redirect('admin/car')->with('success', 'Car created.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Car $car)
  {
    return view('admin.car.details', compact('car'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $car = Car::find($id);
    return view('admin.car.edit', compact('car'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Car $car)
  {
    $request->validate([
      'name' => ['required'],
      'brand' => ['required'],
      'model' => ['required'],
      'year' => ['required'],
      'type' => ['required'],
      'price' => ['required'],
      'availability' => ['required'],
      'photo' => ['nullable', 'image'],
    ]);

    $car->name = $request->get('name');
    $car->brand = $request->get('brand');
    $car->model = $request->get('model');
    $car->year = $request->get('year');
    $car->car_type = $request->get('type');
    $car->daily_rent_price = $request->get('price');
    $car->availability = $request->get('availability');
    $car->save();

    $img_path = $car->image;
    $img_prev_path = $car->image;
    if ($request->file('photo')) {
      $manager = new ImageManager(new Driver());
      $name_gen = hexdec(uniqid()) . '.' . $request->file('photo')->getClientOriginalExtension();
      $image = $manager->read($request->file('photo'));
      // $image->scale(width: 300);
      $img_path = 'images/cars/' . $name_gen;
      $image->save($img_path);

      if (Storage::disk('public')->exists($img_prev_path)) {
        Storage::disk('public')->delete($img_prev_path);
      }

      $car->image = $img_path;
      $car->save();
    }

    return redirect('admin/car')->with('success', 'Car updated.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Car $car)
  {
    if (Storage::disk('public')->exists($car->image)) {
      Storage::disk('public')->delete($car->image);
    }

    $car->delete();

    return redirect('admin/car')->with('success', 'Car deleted.');
  }
}
