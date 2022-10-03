<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeature extends Model
{
    use HasFactory;
    protected $fillable = ["country_of_manufacture","fuel","color","car_type","manufacturing_year","maximum_speed","mileage","car_id"];

    // CarFeature belongs To Car
    public function car()
    {
        return $this->belongsTo(Car::class ,'car_id' ,'id');
    }
}
