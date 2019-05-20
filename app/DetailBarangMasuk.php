<?php

namespace App;

use App\Barang;
use App\BarangMasuk;
use Illuminate\Database\Eloquent\Model;

class DetailBarangMasuk extends Model
{
    protected $table = 'detailbarangmasuks';
    protected $primaryKey = 'kode_detailbarang_masuk';

    protected $fillable = [
        'kode_detailbarang_masuk',
        'kode_barang_masuk',
        'kode_barang',
        'jumlah'
    ];

    static protected $codePrefix = 'DBMS';

    public $incrementing = false;

    public function barang() {
        return $this->belongsTo(Barang::class, 'kode_barang');
    }

    public function barangMasuk() {
        return $this->belongsTo(BarangMasuk::class, 'kode_barang_masuk');
    }

    public static function nextID() {
        $data = self::latest()->first() ? ((self::latest()->first()))->kode_detailbarang_masuk : self::$codePrefix . 0;
        $data = str_replace(self::$codePrefix, '', $data);
        $nextID = $data + 1;
        while (self::find(self::$codePrefix . $nextID)) {
            $nextID++;
        }
        return self::$codePrefix . $nextID;
    }
}
