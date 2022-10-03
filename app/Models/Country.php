<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ["ar_name","en_name","image","code","coin","region"];

    // The Country belongs To UserInformation
    public function user_information()
    {
        return $this->belongsTo(UserInformation::class);
    }

    
}
