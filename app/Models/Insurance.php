<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    protected $fillable = ["company_name","license_number" , "license_photo", "ID_photos",
                        "start_date" ,"end_date" , "status" ,"car_id","agency_id"];

    // The Insurance belongs To Many Agency
    public function agency()
    {
        return $this->belongsToMany(Agency::class ,'agency_id','id');
    } 

    // The Insurance has Many Cars
    public function car()
    {
        return $this->hasMany(CarInformation::class ,'car_id' ,'id');
    } 

}
