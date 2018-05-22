<?php


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('rooms', 'RoomController');
    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::post('profile', 'ProfileController@update')->name('profile.update');

    Route::get('rooms', 'RoomController@index')->name('rooms');
    Route::post('reservations/store', 'ReservationController@store')->name('reservation.store');
    Route::get('your_reservations', 'ReservationController@your_reservations')->name('your-reservations');
    Route::get('your_trips', 'ReservationController@your_trips')->name('your-trips');

    // wish list
    Route::get('your_wishlist', 'UserController@wishlists')->name('your-wishlist');
    Route::post('add_to_wishlist', 'UserController@make_wish')->name('add-to-wishlist');
});

Route::get('/', 'HomeController@index')->name('home');
