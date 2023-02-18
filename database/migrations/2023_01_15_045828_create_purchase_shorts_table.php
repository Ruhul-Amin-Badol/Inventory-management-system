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
        Schema::create('purchase_shorts', function (Blueprint $table) {
            $table->id();
            $table->integer('purchaseSID');
            $table->string('invNumber');
            $table->string('supplierName');
            $table->string('purchaseDate');
            $table->decimal('grandTotal',10,2);
            $table->decimal('paidAmount',10,2);
            $table->decimal('duesAmount',10,2);
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
        Schema::dropIfExists('purchase_shorts');
    }
};
