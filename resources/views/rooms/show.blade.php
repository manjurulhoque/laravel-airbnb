@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">

            <!-- image -->
            <div class="row">
                <div class="col-md-12">
                    <img style="width: 100%" src="{{asset('/images/rooms/' . $room->name)}}"
                         class="img-responsive center-block">
                </div>
            </div>

            <br>

            <!-- Main Info -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            user image<br><br>
                            {{ $room->user->fullname }}
                        </div>

                        <div class="col-md-9">
                            <h4>{{ $room->listing_name }}</h4>
                            $room->address

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
                                    $room->home_type
                                </div>
                                <div class="col-sm-3">
                                    {{ $room->accommodate }} {{ count($room->accommodate) > 1 ? 'Guests': 'Guest' }}
                                </div>
                                <div class="col-sm-3">
                                    {{ $room->bed_room }} {{ count($room->bed_room) > 1 ? 'Bedrooms': 'Bedroom' }}
                                </div>
                                <div class="col-sm-3">
                                    {{ $room->bath_room }} {{ count($room->bath_room) > 1 ? 'Bathrooms': 'Bathroom' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Reservation form -->
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
                        <div class="col-md-6">
                            <ul class="amenities">
                                <li class="{{ $room->is_tv == false ? 'text-line-through' : ''  }}">TV</li>
                                <li class="{{ $room->is_kitchen == false ? 'text-line-through' : ''  }}">Kitchen</li>
                                <li class="{{ $room->is_internet == false ? 'text-line-through' : ''  }}">Internet</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <li class="{{ $room->is_heating == false ? 'text-line-through' : ''  }}">Heating</li>
                            <li class="{{ $room->is_air == false ? 'text-line-through' : ''  }}">Air Conditioning</li>
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
                                    <li data-target="#myCarousel" data-slide-to="{{ $photo->id }}"></li>
                                @endforeach
                            </ol>
                    @endif
                    </div>
                </div>
            </div>
    {{--Wrapper for slides
        <div class="carousel-inner" role="listbox">--}}
                            {{--<% if @photos %>--}}
                            {{--<% @photos.each do |photo| %>--}}
                            {{--<div class="item <%= 'active' if photo.id == @photos[0].id %>">--}}
        {{--<%= image_tag photo.image.url() %>--}}
    {{--</div>--}}
{{--<% end %>--}}
{{--<% end %>--}}
{{--</div>--}}

{{--<!-- Left and right controls -->--}}
{{--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">--}}
{{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
{{--<span class="sr-only">Previous</span>--}}
{{--</a>--}}
{{--<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">--}}
{{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
{{--<span class="sr-only">Next</span>--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<br>--}}
{{--<hr>--}}

{{--<!-- Google Map -->--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<div id="map"></div>--}}
{{--</div>--}}

{{--<style>--}}
{{--#map {--}}
{{--width: 100%;--}}
{{--height: 400px;--}}
{{--}--}}
{{--</style>--}}

{{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}
{{--<script>--}}
{{--function initialize() {--}}
{{--var mapCanvas = document.getElementById('map');--}}
{{--var mapOptions = {--}}
{{--center: new google.maps.LatLng(<%= @room.latitude %>, <%= @room.longitude %>),--}}
{{--zoom: 14,--}}
{{--mapTypeId: google.maps.MapTypeId.ROADMAP--}}
{{--}--}}
{{--var map = new google.maps.Map(mapCanvas, mapOptions)--}}
{{--var marker = new google.maps.Marker({--}}
{{--position: new google.maps.LatLng(<%= @room.latitude %>, <%= @room.longitude %>),--}}
{{--title: "AirAlien"--}}
{{--});--}}
{{--marker.setMap(map);--}}
{{--}--}}
{{--google.maps.event.addDomListener(window, 'load', initialize);--}}
{{--</script>--}}
{{--</div>--}}

{{--<!-- Close by Rooms -->--}}
{{--<h3>Nearby</h3>--}}
{{--<div class="row">--}}
{{--<% for room in @room.nearbys(10) %>--}}
{{--<div class="col-md-4">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading preview">--}}
{{--<%= image_tag room.photos[0].image.url(:medium) %>--}}
{{--</div>--}}
{{--<div class="panel-body">--}}
{{--<%= link_to room.listing_name, room %><br>--}}
{{--(<%= room.distance.round(2) %> miles away)--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<% end %>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
@endsection