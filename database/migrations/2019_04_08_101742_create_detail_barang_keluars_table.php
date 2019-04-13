<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barang_keluars', function (Blueprint $table) {
            $table->bigIncrements('id_detail_barang_keluar');
            $table->string('kode_barang_keluar');
            $table->string('kode_pemesanan');
            $table->string('kode_barang');
            $table->integer('jumlah_pemesanan')->default(0);
            $table->integer('jumlah_disetujui')->default(0);
            $table->string('status');
            $table->timestamps();

            $table->foreign('kode_barang_keluar')->references('kode_barang_keluar')->on('barang_keluars');
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
        Schema::dropIfExists('detail_barang_keluars');
    }
}
