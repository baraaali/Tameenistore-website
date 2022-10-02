<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    protected $fillable = ["company_name","license_number" , "license_photo", "ID_photos",
                        "start_date" ,"end_date" , "status","subscriptions_id" ,"carInformation_id","agency_id"];
}
