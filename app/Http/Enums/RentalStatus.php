<?php

namespace App\Http\Enums;

enum RentalStatus: string
{
  case ONGOING = 'Ongoing';
  case COMPLETED = 'Completed';
  case CANCELLED = 'Cancelled';
}
