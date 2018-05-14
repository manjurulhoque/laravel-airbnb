@extends('layouts.app')

@section('title')Edit Profile @endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul class="sidebar-list">
                <li class="sidebar-item">
                    <a href="{{ route('profile') }}" class="sidebar-link active">Edit Profile</a>
                </li>
            </ul>
            <br>
            <a href="" class="btn btn-default wide">View My Profile</a>
        </div>

        <div class="col-md-9 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile</div>
                <div class="panel-body">
                    <div class="container">
                        <form action="{{ route('profile.update') }}" method="post">
                            <div class="form-group">
                                <input type="text" name="fullname" autofocus placeholder="Full name"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" autofocus placeholder="Email"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_number" autofocus placeholder="Phone Number"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" autofocus
                                       placeholder="New Password (leave blank if you don't want to change it)"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" autofocus
                                       placeholder="Confirm Password"
                                       class="form-control">
                            </div>
                            <div class="actions">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection