<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailbarangmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailbarangmasuks', function (Blueprint $table) {
            $table->string('kode_detailbarang_masuk', 10)->primary();
            $table->string('kode_barang_masuk', 10);
            $table->string('kode_barang', 10);
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('kode_barang_masuk')->references('kode_barang_masuk')->on('barang_masuks');
            $table->foreign('kode_barang')->references('kode_barang')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailbarangmasuks');
    }
}
