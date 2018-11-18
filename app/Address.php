<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = [
    'address_name', 'address_number', 'city', 'zip',
];

public function isAdmin()
{
    return false;
}
}
