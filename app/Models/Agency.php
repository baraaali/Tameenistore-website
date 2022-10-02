<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = ["ar_name","en_name","ar_description","en_description",
                            "ar_address","ar_address","times_of_work","days_of_work",
                            "status","agency_type","car_type","image","phone",
                            "user_id","car_information_id","social_media_id","subscriptions_id"];

	/**
	 * @return mixed
	 */
	
}
