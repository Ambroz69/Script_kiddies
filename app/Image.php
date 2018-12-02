<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'name', 'width', 'height', 'type', 'image_string'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
