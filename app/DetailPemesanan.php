<?php

namespace App;

use App\Barang;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    protected $table = 'detailpemesanans';
    protected $primaryKey = 'kode_detail_pemesanan';

    protected $fillable = [
        'kode_detail_pemesanan',
        'kode_pemesanan',
        'kode_barang',
        'jumlah_pemesanan',
        'jumlah_disetujui',
        'status'
    ];
    
    public $incrementing = false;

    public function barang() {
        return $this->belongsTo(Barang::class, 'kode_barang');
    }

    public function pemesanan() {
        return $this->belongsTo(Pemesanan::class, 'kode_pemesanan');
    }

    public function nextID() {
        $data = $this->all()->count();
        return 'DP' . ($data + 1);
    }
}
