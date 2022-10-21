<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = ["name","type","price","start_date","end_date",
                        "image","status","user_id"];


     //  The Advertisement belongs To User
    public function user()
    {
        return $this->belongsTo(User::class ,'user_id' ,'id');
    }

}
