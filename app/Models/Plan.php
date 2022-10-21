<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    /*protected $fillable = ["name","price"];

    // The plan belongs To subscription
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
    */
    
}
