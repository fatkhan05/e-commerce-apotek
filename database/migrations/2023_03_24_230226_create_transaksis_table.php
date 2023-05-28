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
            Schema::create('transaksi_penjualan', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('amount');
                $table->unsignedBigInteger('order_id')->constrained('orders')->cascadeOnUpdate()->cascadeOnDelete();
                $table->unsignedBigInteger('product_id')->constrained('products')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('transaksi_penjualan');
    }
};
