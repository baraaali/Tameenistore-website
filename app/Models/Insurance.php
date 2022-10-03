<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    protected $fillable = ["company_name","license_number" , "license_photo", "ID_photos",
                        "start_date" ,"end_date" , "status","subscriptions_id" ,"carInformation_id","agency_id"];

    // The Insurance belongs To Many Agency
    public function agency()
    {
        return $this->belongsToMany(Agency::class ,'agency_id','id');
    } 

    // The Insurance has Many CarInformation
    public function car_information()
    {
        return $this->hasMany(CarInformation::class ,'carInformation_id' ,'id');
    } 

    // The Insurance has one Subscription
    public function subscriptions()
    {
        return $this->hasOne(Subscription::class ,'subscriptions_id' ,'id');
    } 
}