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
        Schema::create('sales_shorts', function (Blueprint $table) {
            $table->id();
            $table->integer('salesShortID');
            $table->string('invNumber');
            $table->string('customerName');
            $table->string('salesDate');
            $table->decimal('grandTotal', 10,2);
            $table->decimal('paidAmount', 10,2);
            $table->decimal('duesAmount', 10,2);
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
        Schema::dropIfExists('sales_shorts');
    }
};
