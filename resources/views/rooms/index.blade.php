@extends('layouts.app')

@section('title')Your listings @endsection

@section('content')

    <div class="row">
        <div class="col-md-3">
            <ul class="sidebar-list">
                <li class="sidebar-item">Your Listing</li>
                <li class="sidebar-item">Your Reservations</li>
                <li class="sidebar-item"><a href="#">Your Trips</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listings
                </div>
                <div class="panel-body">

                    @foreach($rooms as $room)
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-responsive" src="{{ asset("images/rooms/".$room->photos[0]->name) }}">
                            </div>
                            <div class="col-md-7">
                                <h4>{{ $room->listing_name }}</h4>
                            </div>
                            <div class="col-md-3 right">
                                <a href="#" class="btn btn-primary">Update</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection