<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->bigInteger('room_type_id');
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('facility_id')->unsigned()->nullable();
            $table->integer('hotel_stars')->nullable();
            $table->integer('number_of_rooms');
            $table->double('price');
            $table->text('image');
            $table->integer('hotel_owner_id');
            $table->boolean('status');
            $table->string('phone_number');
            $table->integer('check_in_time');
            $table->integer('check_out_time');
            $table->string('postal_code');
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
        Schema::dropIfExists('hotels');
    }
}
