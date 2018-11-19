<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
        'address_name', 'address_number', 'city', 'zip',
    ];

    protected $appends = [
        'full_address'
    ];

    public function isAdmin()
    {
        return false;
    }

    public function realEstateOffices()
    {
        return $this->hasMany(RealEstateOffice::class);
    }

    public function getFullAddressAttribute() {
        return $this->address_name . ' ' . $this->address_number . ', ' . $this->zip . ' ' . $this->city;
    }

}
