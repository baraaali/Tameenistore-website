<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ["name","brand","model","image","price","country_of_manufacture","fuel",
                            "color","car_type","manufacturing_year","maximum_speed","mileage"];

    // The Car belongs To  Agency
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    } 

     // The Car belongs To Many Insurance
    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    } 
}
