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
            $table->id();
            $table->string('title_ru')->nullable();
            $table->string('title_uz')->nullable();
            $table->string('info_ru')->nullable();
            $table->string('info_uz')->nullable();
            $table->string('comfortables')->nullable();
            $table->integer('region_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('rating')->nullable();
            $table->string('info_en')->nullable();
            $table->string('title_en')->nullable();
            $table->string('photos_url')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('main_photo')->nullable();
            $table->string('comments_url')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->string('photos_room')->nullable();
            $table->string('photos_reception')->nullable();
            $table->string('photos_front')->nullable();
            $table->string('photos_bathroom')->nullable();
            $table->string('photos_breakfast')->nullable();
            $table->string('photos_other')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('auth_key')->nullable();
            $table->string('password_hash')->nullable();
            $table->smallInteger('status')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->integer('single')->nullable();
            $table->integer('double')->nullable();
            $table->integer('triple')->nullable();
            $table->integer('family')->nullable();
            $table->integer('deluxe')->nullable();
            $table->integer('twin')->nullable();
            $table->string('role')->nullable();
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
