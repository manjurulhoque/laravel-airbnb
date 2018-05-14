<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCreateRequest;
use App\Photo;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class RoomController extends Controller
{
    private $room, $photo;

    function __construct(Room $room, Photo $photo)
    {
        $this->room = $room;
        $this->photo = $photo;
    }

    public function index()
    {
        $rooms = Auth::user()->rooms;

        return view('rooms.index', compact('rooms'));
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
        $this->room->slug = str_slug($request->listing_name);
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

        if ($request->hasFile('images')) {
            $this->room->save();
            $room_id = $this->room->id;
            foreach ($request->images as $image) {
                $filename = $image->getClientOriginalName();
                $location = public_path('images/rooms/' . $filename);
                Image::make($image)->resize(800, 400)->save($location);
                $photo = new Photo;
                $photo->name = $filename;
                $photo->room_id = $room_id;
                $photo->save();
            }
        }
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}
