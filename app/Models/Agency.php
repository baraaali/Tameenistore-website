<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = ["ar_name","en_name","ar_description","en_description",
                            "ar_address","en_address","times_of_work","days_of_work",
                            "status","agency_type","car_type","image","phone",
                            "user_id","car_id","social_media_id"];

	/**
	 * @return mixed
	 */

    //  The Agency belongs To User
    public function user()
    {
        return $this->belongsTo(User::class ,'user_id' ,'id');
    }

    //  The Agency has One SocialMedia
    public function social_media()
    {
        return $this->hasOne(SocialMedia::class ,'social_media_id' ,'id');
    } 

    //  The Agency has Many Cars
    public function car()
    {
        return $this->hasMany(CarInformation::class ,'car_id' ,'id');
    } 

    //  The Agency has Many Insurance
    public function insurance()
    {
        return $this->hasMany(Insurance::class);
    } 

}
