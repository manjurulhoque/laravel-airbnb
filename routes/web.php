<?php


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('rooms', 'RoomController');
    Route::get('profile', 'ProfileController@profile')->name('profile');
    Route::post('profile', 'ProfileController@update')->name('profile.update');

    Route::get('rooms', 'RoomController@index')->name('rooms');
    Route::post('reservations/store', 'ReservationController@store')->name('reservation.store');
});

Route::get('/', 'HomeController@index')->name('home');
