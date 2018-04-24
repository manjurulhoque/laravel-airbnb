<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCreateRequest;
use App\Room;
use Illuminate\Http\Request;
use Auth;

class RoomController extends Controller
{
    private $room;

    function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(RoomCreateRequest $request)
    {
        $this->room->user_id = Auth::id();
        $this->room->home_type = $request->home_type;
        $this->room->room_type = $request->room_type;
        $this->room->accommodate = $request->accommodate;
        $this->room->bed_room = $request->bed_room;
        $this->room->bath_room = $request->bath_room;
        $this->room->listing_name = $request->listing_name;
        $this->room->summary = $request->summary;
        $this->room->address = $request->address;
        $this->room->is_tv = $request->get('is_tv') ? true : false;
        $this->room->address = $request->address;
        $this->room->is_kitchen = $request->is_kitchen ? true : false;
        $this->room->is_heating = $request->is_heating ? true : false;
        $this->room->is_internet = $request->is_internet ? true : false;
        $this->room->is_air = $request->is_air ? true : false;
        $this->room->active = $request->active ? true : false;
        $this->room->price = $request->price;

        $this->room->save();
    }
}
