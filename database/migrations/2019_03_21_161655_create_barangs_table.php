<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('kode_barang', 10)->primary();
            $table->string('kode_merk', 10)->nullable();
            $table->string('kode_jenis_barang', 10)->nullable();
            $table->string('nama_barang', 50);
            $table->integer('stok');
            $table->integer('minimum_stok')->default(0);
            $table->string('satuan', 8);
            $table->timestamps();

            $table->foreign('kode_merk')->references('kode_merk')->on('merks');
            $table->foreign('kode_jenis_barang')->references('kode_jenis_barang')->on('jenis_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
