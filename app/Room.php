<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Room extends Model
{
    protected $fillable = ['home_type', 'room_type', 'accommodate', 'bed_room', 'bath_room', 'listing_name', 'summary', 'address', 'price' .
        'is_tv', 'is_kitchen', 'is_heating', 'is_internet', 'is_air', 'active',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function wish()
    {
        return (boolean)(Wishlist::where('room_id', $this->id)->where('user_id', Auth::id())->first());
    }
}
