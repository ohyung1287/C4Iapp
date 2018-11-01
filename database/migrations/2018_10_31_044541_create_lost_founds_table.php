<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLostFoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_founds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('roomId')->unsigned();
            $table->string('email')->nullable();
            $table->string('subject');
            $table->string('title');
            $table->string('message');
            $table->timestamps();
        });

        Schema::table('lost_founds', function($table) {
          $table->foreign('roomId')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lost_founds');
    }
}
