<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //
    protected $fillable = [
        'floor_count', 'terrace', 'garden',
    ];

    public function isAdmin()
    {
        return false;
    }
}
