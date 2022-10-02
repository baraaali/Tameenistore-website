<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceCenter extends Model
{
    use HasFactory;
    protected $fillable = ["ar_name","en_name","ar_description","en_description",
                            "ar_address","ar_address","times_of_work","days_of_work",
                            "status","image","phone","country","services",
                            "user_id","subscriptions_id"];

}
