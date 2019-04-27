<?php

namespace App;

use App\DetailPemesanan;
use App\Merk;
use App\JenisBarang;
use App\DetailBarangMasuk;
use App\DetailBarangKeluar;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'kode_barang';

    protected $fillable = [
        'kode_barang',
        'kode_merk',
        'kode_jenis_barang',
        'nama_barang',
        'stok',
        'minimum_stok',
        'satuan'
    ];

    static protected $codePrefix = 'MM';

    public $incrementing = false;

    public function merk() {
        return $this->belongsTo(Merk::class, 'kode_merk');
    }

    public function jenis_barang() {
        return $this->belongsTo(JenisBarang::class, 'kode_jenis_barang');
    }

    public function detailPemesanan() {
        return $this->hasMany(DetailPemesanan::class, 'kode_barang');
    }

    public function detailBarangMasuk() {
        return $this->hasMany(DetailBarangMasuk::class, 'kode_barang');
    }

    public function detailBarangKeluar() {
        return $this->hasMany(DetailBarangKeluar::class, 'kode_barang');
    }

    public static function increaseStock($id, $stok) {
        $barang = self::findOrFail($id);
        $barang->stok += $stok;
        $barang->save();
        return new static();
    }

    public static function decreaseStock($id, $stok) {
        $barang = self::findOrFail($id);
        $barang->stok -= $stok;
        $barang->save();
        return new static();
    }

    public static function nextID() {
        $data = self::latest()->first() ? ((self::latest()->first()))->kode_barang : self::$codePrefix . 0;
        $data = str_replace(self::$codePrefix, '', $data);
        return self::$codePrefix . ($data + 1);
    }
}
