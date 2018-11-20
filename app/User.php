<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'lastname', 'email', 'password',
    ];

    protected $appends = [
        'full_name'
    ];

    public function realEstateOffice()
    {
        return $this->belongsTo(RealEstateOffice::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return false;
    }

    public function getFullNameAttribute() {
        return $this->surname . ' ' . $this->lastname;
    }
}
