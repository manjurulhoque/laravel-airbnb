<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['room_id', 'user_id', 'start_date', 'end_date', 'total', 'price'];
}
