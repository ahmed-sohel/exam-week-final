<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
  use HasFactory;

  public function car()
  {
    return $this->belongsTo(Car::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function scopeAvailableForDateRange($query, $carId, $startDate, $endDate, $rentalId = null)
  {
    return $query->where('car_id', $carId)
      ->where(function ($query) use ($startDate, $endDate) {
        $query->whereBetween('start_date', [$startDate, $endDate])
          ->orWhereBetween('end_date', [$startDate, $endDate])
          ->orWhere(function ($query) use ($startDate, $endDate) {
            $query->where('start_date', '<=', $startDate)
              ->where('end_date', '>=', $endDate);
          });
      })
      ->when($rentalId, function ($query) use ($rentalId) {
        $query->where('id', '!=', $rentalId); // Exclude the current rental
      });
  }
}
