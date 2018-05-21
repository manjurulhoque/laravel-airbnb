@extends('layouts.app')

@section('title')Show room @endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- image -->
            <div class="row">
                <div class="col-md-12">
                    <img style="width: 100%" src="{{asset('/images/rooms/' . $room->photos[0]->name)}}"
                         class="img-responsive center-block">
                </div>
            </div>

            <br>

            <!-- Main Info -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="{{ Gravatar::get($room->user->email) }}" alt="">
                            <br><br>
                            {{ $room->user->fullname }}
                        </div>

                        <div class="col-md-9">
                            <h4>{{ $room->listing_name }}</h4>
                            {{$room->address}}

                            <div class="row text-center row-space-1">
                                <div class="col-sm-3">
                                    <i class="fa fa-home fa-2x"></i>
                                </div>
                                <div class="col-sm-3">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                                <div class="col-sm-3">
                                    <i class="fa fa-bed fa-2x"></i>
                                </div>
                                <div class="col-sm-3">
                                    <i class="fa fa-ship fa-2x"></i>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-sm-3">
                                    {{$room->home_type}}
                                </div>
                                <div class="col-sm-3">
                                    {{ $room->accommodate }} {{ $room->accommodate > 1 ? 'Guests': 'Guest' }}
                                </div>
                                <div class="col-sm-3">
                                    {{ $room->bed_room }} {{ $room->bed_room > 1 ? 'Bedrooms': 'Bedroom' }}
                                </div>
                                <div class="col-sm-3">
                                    {{ $room->bath_room }} {{ $room->bath_room > 1 ? 'Bathrooms': 'Bathroom' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @include('layouts.reservation-form')
                </div>
            </div>

            <!-- About -->
            <div class="row">
                <div class="col-md-12">
                    <h2>About This Listing</h2>
                    <p>{{ $room->summary }}</p>
                </div>
            </div>

            <!-- Amenities -->
            <div class="row">
                <div class="col-md-2">
                    <p>Amenities</p>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="amenities">
                                <li class="{{ $room->is_tv == false ? 'text-line-through' : ''  }}">TV</li>
                                <li class="{{ $room->is_kitchen == false ? 'text-line-through' : ''  }}">Kitchen</li>
                                <li class="{{ $room->is_internet == false ? 'text-line-through' : ''  }}">Internet</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <li class="{{ $room->is_heating == false ? 'text-line-through' : ''  }}">Heating</li>
                            <li class="{{ $room->is_air == false ? 'text-line-through' : ''  }}">Air Conditioning</li>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ route('add-to-wishlist') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                @if(!$room->wish())
                                    <input type="hidden" name="islisted" value="0">
                                    <input type="submit" href="" class="btn btn-success" value="Add to wishlist"/>
                                @else
                                    <input type="hidden" name="islisted" value="1">
                                    <input type="submit" href="" class="btn btn-danger" value="Remove from wishlist"/>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        @if($room->photos)
                            <ol class="carousel-indicators">
                                @foreach($room->photos as $photo)
                                    <li data-target="#myCarousel" data-slide-to="{{ $photo->id - 1 }}"></li>
                                @endforeach
                            </ol>
                        @endif

                        {{--Wrapper for slides--}}
                        <div class="carousel-inner" role="listbox">
                            @if($room->photos)
                                @foreach($room->photos as $photo)
                                    <div class="item {{ $room->photos[0]->id == $photo->id ? 'active': '' }}">
                                        <img src="{{ asset("images/rooms/".$photo->name) }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>

    <!-- Close by Rooms -->
    <h3>Nearby</h3>
    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading preview">

                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
@endsection