<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'price', 'description', 'notes', 'category'
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

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
