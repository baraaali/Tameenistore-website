<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ["type","is_free","start_date","end_date","plan_id"];

    // The Subscription has one plan
    public function plan()
    {
        return $this->hasOne(Plan::class , 'plan_id' , 'id');
    }
}
