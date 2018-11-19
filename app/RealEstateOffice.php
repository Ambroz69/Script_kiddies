<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstateOffice extends Model
{
    //
    protected $fillable = [
        'name', 'web', 'phone',
    ];

    public function isAdmin()
    {
        return false;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
