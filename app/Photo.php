<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
