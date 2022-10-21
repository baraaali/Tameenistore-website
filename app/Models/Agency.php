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
                            "user_id","car_information_id","social_media_id"];

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

    //  The Agency has Many CarInformation
    public function car_information()
    {
        return $this->hasMany(CarInformation::class ,'car_information_id' ,'id');
    } 

    //  The Agency has Many Insurance
    public function insurance()
    {
        return $this->hasMany(Insurance::class);
    } 

}
