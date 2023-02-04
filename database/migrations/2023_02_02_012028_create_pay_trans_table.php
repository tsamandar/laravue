<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_trans', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('pay_id', 25);
            $table->string('pay_time', 13);
            $table->dateTime('perform_time')->nullable();
            $table->dateTime('cancel_time')->nullable();
            $table->integer('pay_amount');
            $table->tinyInteger('stat');
            $table->tinyInteger('reason')->nullable();
            $table->string('receivers', 500)->nullable()->comment("JSON array of receivers");
            $table->string('pay_acount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_trans');
    }
}
