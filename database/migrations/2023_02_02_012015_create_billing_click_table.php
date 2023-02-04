<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingClickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_click', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('click_trans_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('merchant_trans_id')->nullable();
            $table->string('amount')->nullable();
            $table->integer('action')->nullable();
            $table->integer('error')->nullable();
            $table->string('error_note')->nullable();
            $table->string('sign_time')->nullable();
            $table->string('sight_string')->nullable();
            $table->string('merchant_confirm_id')->nullable();
            $table->integer('click_paydoc_id')->nullable();
            $table->integer('merchant_cancel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_click');
    }
}
