<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = ['ar_name', 'en_name','type_membership','start_date',
                            'end_date','status','price','user_id','banner_id','subscription_id']; 


  // The Membership belongs To User
  public function user()
  {
      return $this->belongsTo(User::class ,'user_id' ,'id');
  }

    //  The Membership has one Subscription
    public function subscriptions()
    {
        return $this->hasOne(Subscription::class ,'subscriptions_id' ,'id');
    } 

    //  The Membership has many Banner
    public function banner()
    {
        return $this->hasMany(Banner::class ,'banner_id' ,'id');
    } 
}
