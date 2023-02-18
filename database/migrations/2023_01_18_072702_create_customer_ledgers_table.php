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
        Schema::create('customer_ledgers', function (Blueprint $table) {
            $table->id();
            $table->integer('customerID');
            $table->string('customerName');
            $table->string('invNumber');
            $table->string('paymentDate');
            $table->string('particular');
            $table->decimal('purchaseAmount',10,2)->default(00.00);
            $table->decimal('paidAmount',10,2)->default(00.00);
            $table->decimal('totalBalance',10,2)->default(00.00);
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
        Schema::dropIfExists('customer_ledgers');
    }
};
