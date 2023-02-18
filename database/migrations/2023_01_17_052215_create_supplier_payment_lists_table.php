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
        Schema::create('supplier_payment_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('purchaseSID')->default(0);
            $table->string('invNumber');
            $table->integer('supplierID');
            $table->string('supplierName');
            $table->string('paymentDate');
            $table->string('transactionMethod')->default(0);
            $table->decimal('supplierPrevBalance',10,2)->default(00.0);
            $table->decimal('paymentAmount',10,2)->default(00.00);
            $table->decimal('duesAmount',10,2)->default(00.00);
            $table->decimal('supplierCurrentBalance',10,2)->default(00.00);
            $table->string('note')->default('---');
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
        Schema::dropIfExists('supplier_payment_lists');
    }
};
