<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAllocation extends Model
{
    use HasFactory;
    
    protected $fillable = ['trip_id', 'seat_number', 'user_id'];
}
