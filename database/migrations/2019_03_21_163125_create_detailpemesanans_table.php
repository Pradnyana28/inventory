<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpemesanans', function (Blueprint $table) {
            $table->string('kode_detail_pemesanan', 10)->primary();
            $table->string('kode_pemesanan', 10);
            $table->string('kode_barang', 10);
            $table->integer('jumlah_pemesanan')->default(0);
            $table->integer('jumlah_disetujui')->default(0);
            $table->string('status', 5);
            $table->timestamps();

            $table->foreign('kode_pemesanan')->references('kode_pemesanan')->on('pemesanans');
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
        Schema::dropIfExists('detailpemesanans');
    }
}
