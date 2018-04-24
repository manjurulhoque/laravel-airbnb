<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('home_type');
            $table->string('room_type');
            $table->string('listing_name');
            $table->string('address');
            $table->integer('accommodate');
            $table->integer('bed_room');
            $table->integer('bath_room');
            $table->integer('price');
            $table->text('summary');
            $table->boolean('is_tv')->default(0);
            $table->boolean('is_kitchen')->default(0);
            $table->boolean('is_heating')->default(0);
            $table->boolean('is_internet')->default(0);
            $table->boolean('active')->default(0);
            $table->boolean('is_air')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
