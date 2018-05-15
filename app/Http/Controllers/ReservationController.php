<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
//        $reservation = Reservation::create([
//            'room_id' => $request->room_id,
//            'start_date' => $request->start_date,
//            'end_date' => $request->end_date,
//            'price' => $request->price,
//            'total' => $request->total
//        ]);

        Auth::user()->reservations()->create([
            'room_id' => $request->room_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price,
            'total' => $request->total
        ]);

        $notification = array(
            'message' => 'Your Reservation created',
            'alert-type' => 'success'
        );

        return redirect()->route('rooms.show', $request->room_id)->with($notification);
    }
}
