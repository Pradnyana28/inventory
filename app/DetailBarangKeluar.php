<?php

namespace App;

use App\Barang;
use App\BarangKeluar;
use App\Pemesanan;
use Illuminate\Database\Eloquent\Model;

class DetailBarangKeluar extends Model
{
    protected $primaryKey = 'id_detail_barang_keluar';

    protected $fillable = [
        'kode_barang_keluar',
        'kode_pemesanan',
        'kode_barang',
        'jumlah_pemesanan',
        'jumlah_disetujui',
        'status'
    ];

    public function barang() {
        return $this->belongsTo(Barang::class, 'kode_barang');
    }

    public function pemesanan() {
        return $this->belongsTo(Pemesanan::class, 'kode_pemesanan');
    }

    public function barangKeluar() {
        return $this->belongsTo(BarangKeluar::class, 'kode_barang_keluar');
    }
}
