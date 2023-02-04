<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_payments', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('phone', 15);
            $table->integer('created')->nullable();
            $table->string('create_time', 50)->nullable();
            $table->string('perform_time', 50)->nullable();
            $table->integer('payed_date')->nullable();
            $table->string('cancel_time', 55)->nullable();
            $table->integer('status')->nullable();
            $table->integer('summ')->nullable();
            $table->string('info_billing')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->string('fio')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_payments');
    }
}
