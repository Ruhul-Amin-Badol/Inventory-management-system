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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('purchaseShortID');
            $table->foreignId('productID')->constrained('products');
            $table->string('prodCode');
            $table->string('invNumber');
            $table->string('purchaseDate');
            $table->integer('supplierID');
            $table->string('supplierName');
            $table->integer('prodQty');
            $table->decimal('prodRate',8,2);
            $table->decimal('totalPrice',8,2);
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
        Schema::dropIfExists('purchases');
    }
};
