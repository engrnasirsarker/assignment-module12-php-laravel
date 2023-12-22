<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable =  ['trip_date', 'departure_location_id', 'arrival_location_id'];
    public function departureLocation(){
        return $this->belongsTo(Location::class, 'departure_location_id');
    }

    public function arrivalLocation() {
        return $this->belongsTo(Location::class, 'arrival_location_id');
    }
}
