<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = [
        'room_count', 'floor',
    ];

    public function isAdmin()
    {
        return false;
    }

    public function propertyDetails()
    {
        return $this->belongsTo(PropertyDetail::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
