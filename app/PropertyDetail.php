<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    //
    protected $fillable = [
        'area_square_meters', 'type', 'window_type', 'direction', 'balcony', 'cellar', 'garage', 'insulated', 'heating', 'internet',
    ];

    public function isAdmin()
    {
        return false;
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

}
