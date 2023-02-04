<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('hotel_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->string('admin')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->integer('rooms')->nullable();
            $table->string('room_type')->nullable();
            $table->string('status')->default('CHECKIN');
            $table->string('amount')->nullable();
            $table->integer('pay_type')->nullable();
            $table->text('notes')->nullable();
            $table->string('paid')->nullable();
            $table->string('debt')->nullable();
            $table->string('persons')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
