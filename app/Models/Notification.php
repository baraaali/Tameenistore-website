<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","user_notify_id","admin_notify_id"];
     
     
    // The Notification belongs to
    public function user()
    {
        return $this->belongsToMany(User::class ,'user_id','id');
    }
}
