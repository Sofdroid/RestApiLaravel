<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->date('invoice_month');
            $table->string('meter_code');
            $table->integer('customer_id');
            $table->string('customer_code');
            $table->string('customer_name');
            $table->integer('total_usage');
            $table->date('due_date');
            $table->float('settle_amount');
            $table->float('total_amount');
            $table->string('currency_sign');
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
        Schema::drop('invoice');
    }
}
