<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // The User has One UserInformation
    public function user_information()
    {
        return $this->hasOne(UserInformation::class);
    }

     // The User has Many Agency
    public function agency()
    {
        return $this->hasMany(Agency::class);
    }

    // The User has Many Insurance
    public function insurance()
    {
        return $this->hasMany(Insurance::class);
    }

     // The User has Many MaintenanceCenter
    public function maintenance_centers()
    {
        return $this->hasMany(MaintenanceCenter::class);
    }

    // The User has Many Advertisement
    public function advertisement()
    {
        return $this->hasMany(Advertisement::class);
    }

    
    // The User has one Membership
    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    // The User has many Membership
    public function Notification()
    {
        return $this->hasMany(Notification::class);
    }
}
