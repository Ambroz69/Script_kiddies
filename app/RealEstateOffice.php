<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEstateOffice extends Model
{
    //
    protected $fillable = [
        'name','address', 'city', 'zip', 'web', 'phone',
    ];

    public function isAdmin()
    {
        return false;
    }
}
