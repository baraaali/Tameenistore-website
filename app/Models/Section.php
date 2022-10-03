<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ["ar_name","en_name","image","type","banner_id"];

   // Section belongs to many Banner
   public function banner()
   {
       return $this->belongsToMany(Banner::class , 'banner_id','id');
   }

}
