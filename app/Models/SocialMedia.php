<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
     protected $fillable =["email","instagram", "facebook" ,"website","twitter"];

    //  SocialMedia belongs To Agency
     public function agency()
     {
         return $this->belongsTo(Agency::class);
     }
}
