<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_payment_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('salesShortID')->default(0);
            $table->string('invNumber')->default('------');
            $table->integer('customerID');
            $table->string('customerName');
            $table->string('paymentDate');
            $table->string('transactionMethod')->default('------');
            $table->decimal('custPrevBalance',10,2)->default(00.00);
            $table->decimal('paymentAmount',10,2)->default(00.00);
            $table->decimal('duesAmount',10,2)->default(00.00);
            $table->decimal('custCurrBalance',10,2)->default(00.00);
            $table->string('note')->default('------');
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
        Schema::dropIfExists('customer_payment_lists');
    }
};
