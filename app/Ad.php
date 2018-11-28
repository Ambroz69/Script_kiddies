<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'price', 'description', 'notes',
    ];

    public function isAdmin()
    {
        return false;
    }



    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function estate()
    {
        return $this->belongsTo(Estate::class);
    }

    public function houseInfo() {
        return $this->house()->with('propertyDetails');
    }

    public function apartmentInfo() {
        return $this->apartment()->with('propertyDetails');
    }

    public function userInfo() {
        return $this->user()->with('realEstateOffice');
    }

}
