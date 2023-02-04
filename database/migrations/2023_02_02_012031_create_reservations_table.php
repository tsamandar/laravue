<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('hotel_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('pay_type')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->string('rooms')->nullable();
            $table->string('room_type')->nullable();
            $table->string('status')->default('UNPAID');
            $table->float('amount')->nullable();
            $table->integer('order')->nullable();
            $table->tinyInteger('done')->nullable();
            $table->integer('corp_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
