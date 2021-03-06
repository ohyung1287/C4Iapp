<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomNumber');
            $table->string('facility_name');
            $table->double('duration');
            $table->double('fee');
            $table->string('facility_desc')->nullable();
            $table->time('time_in');
            $table->time('time_out');
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
        Schema::dropIfExists('facility_bookings');
    }
}
