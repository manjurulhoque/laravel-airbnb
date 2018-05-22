<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function make_wish(Request $request)
    {
        if ($request->islisted == 1) {
            $w = Wishlist::where('room_id', $request->room_id)->where('user_id', Auth::id())->first();
            $w->delete();

            $notification = array(
                'message' => 'Room deleted from your wishlist',
                'alert-type' => 'success'
            );

            return redirect()->route('rooms.show', $request->room_id)->with($notification);
        }
        $w = new Wishlist(['room_id' => $request->room_id]);
        Auth::user()->wishlists()->save($w);

        $notification = array(
            'message' => 'Room added to your wishlist',
            'alert-type' => 'success'
        );

        return redirect()->route('rooms.show', $request->room_id)->with($notification);
    }

    public function wishlists()
    {
        $wishlists = Auth::user()->wishlists;

        return view('reservations.your_wishlist', compact('wishlists'));
    }
}
