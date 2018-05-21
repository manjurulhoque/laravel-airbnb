@extends('layouts.app')

@section('title')Your Reservations @endsection

@section('content')

    <div class="row">
        <div class="col-md-3">
            <ul class="sidebar-list">
                <li class="sidebar-item"><a href="{{ route('rooms') }}">Your Listing</a></li>
                <li class="sidebar-item">
                    <a href="{{ route('your-reservations') }}" class=" sidebar-link active">Your Reservations</a>
                </li>
                <li class="sidebar-item"><a href="{{ route('your-trips') }}">Your Trips</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your Rooms Reservations
                </div>
                <div class="panel-body">

                    @foreach($rooms as $room)
                        @foreach($room->reservations as $reservation)
                            <div class="row">
                                <div class="col-md-2">
                                    {{ \Carbon\Carbon::parse($reservation->start_date)->diffForHumans() }}
                                </div>
                                <div class="col-md-6">
                                    <img class="img-responsive" style="width: 150px" src="{{ asset("images/rooms/".$reservation->room->photos[0]->name) }}">
                                </div>
                                <div class="col-md-2">
                                    <a href="">
                                        <img src="{{ Gravatar::get($reservation->user->email, ['size'=>30]) }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-2 right">
                                    <h4>${{ $reservation->total }}</h4>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection