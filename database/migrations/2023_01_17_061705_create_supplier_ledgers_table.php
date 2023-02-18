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
        Schema::create('supplier_ledgers', function (Blueprint $table) {
            $table->id();
            $table->integer('supplierID');
            $table->string('supplierName');
            $table->string('invNumber');
            $table->string('paymentDate');
            $table->string('particular');
            $table->decimal('supPrevBal',10,2)->default(00.00);
            $table->decimal('paymentAmount',10,2)->default(00.00);
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
        Schema::dropIfExists('supplier_ledgers');
    }
};
