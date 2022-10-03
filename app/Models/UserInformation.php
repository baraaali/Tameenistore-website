<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;
    protected $fillable = ["phone","account_type","city","user_id","country_id"];


    // UserInformation belongs To User
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' ,'id');
    }

    // UserInformation has One Country
    public function Country()
    {
        return $this->hasOne(Country::class , 'country_id' ,'id');
    }
}
