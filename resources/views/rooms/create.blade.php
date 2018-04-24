@extends('layouts.app')

@section('title')Create new room @endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Create your beautiful place
        </div>
        <div class="panel-body">
            <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="home_type">Home Type</label>
                            <select id="home_type" class="form-control" name="home_type" required>
                                <option value="Apartment">Apartment</option>
                                <option value="House">House</option>
                                <option value="Bed & Breakfast">Bed & Breakfast</option>
                                <option value="Apartment">Apartment</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label id="room_type">Room Type</label>
                            <select required id="room_type" class="form-control" name="room_type">
                                <option value="Entire">Entire</option>
                                <option value="Private">Private</option>
                                <option value="Shared">Shared</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="accommodate">Accommodate</label>
                            <select required id="accommodate" name="accommodate" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6+</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="bed_room">Bedrooms</label>
                            <select required id="bed_room" name="bed_room" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4+</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 select">
                        <div class="form-group">
                            <label for="bath_room">Bathrooms</label>
                            <select required id="bath_room" name="bath_room" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4+</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="listing_name">Listing name</label>
                            <textarea required id="listing_name" name="listing_name" class="form-control"
                                      placeholder="Be clear and descriptive"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="summary">Summary</label>
                            <textarea required id="summary" name="summary" class="form-control"
                                      placeholder="Tell about your house"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea required id="address" name="address" class="form-control"
                                      placeholder="What is your address?"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="checkbox" name="is_tv"> TV
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_kitchen"> Kitchen
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_internet"> Internet
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="checkbox" name="is_heating"> Heating
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="is_air"> Air Conditioning
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nightly Price</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" min="10" name="price" placeholder="eg. $100" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <span class="btn btn-default btn-file">
                                <i class="fa fa-cloud-upload fa-lg"></i>Upload Photos
                                <input type="file" name="images[]" multiple="multiple">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" name="active"> Active
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>
@endsection