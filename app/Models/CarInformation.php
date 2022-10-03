<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarInformation extends Model
{
    use HasFactory;
    protected $fillable = ["car_id","car_features_id"];

    // The CarInformation belongs To Many Agency
    public function agency()
    {
        return $this->belongsToMany(Agency::class);
    } 

     // The CarInformation belongs To Many Insurance
    public function insurance()
    {
        return $this->belongsToMany(Insurance::class);
    } 
}
