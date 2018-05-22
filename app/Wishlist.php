<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
