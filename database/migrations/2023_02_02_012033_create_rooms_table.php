<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id()->unique();
            $table->integer('hotel_id')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->string('price')->nullable();
            $table->integer('size')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo_second')->nullable();
            $table->string('color')->nullable();
            $table->string('square')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('cleaned')->nullable();
            $table->string('cleaned_type')->nullable();
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
