<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ["name","brand","model","image","price"];

    // The car has one CarFeature
    public function car_feature()
    {
        return $this->hasOne(CarFeature::class);
    }
}
