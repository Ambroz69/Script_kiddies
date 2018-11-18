<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    //
    protected $fillable = [
        'type', 'area_ares', 'price_per_ares',
    ];

    public function isAdmin()
    {
        return false;
    }
}
