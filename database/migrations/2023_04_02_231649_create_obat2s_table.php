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
        Schema::create('obat2', function (Blueprint $table) {
            $table->id();
            $table->string('kode_obat', 45);
            $table->string('nama_obat', 255);
            $table->string('satuan_obat', 45);
            $table->double('harga_obat');
            $table->integer('stock_obat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat2');
    }
};
