<?php

namespace App;

use App\User;
use App\Barang;
use App\DetailBarangMasuk;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $primaryKey = 'kode_barang_masuk';

    protected $fillable = [
        'kode_barang_masuk',
        'user_id',
        'tgl_masuk'
    ];

    static protected $codePrefix = 'BMS';

    public $incrementing = false;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function detailBarangMasuk() {
        return $this->hasMany(DetailBarangMasuk::class, 'kode_barang_masuk');
    }

    public static function nextID() {
        $data = self::latest()->first() ? ((self::latest()->first()))->kode_barang_masuk : self::$codePrefix . 0;
        $data = str_replace(self::$codePrefix, '', $data);
        $nextID = $data + 1;
        while (self::find(self::$codePrefix . $nextID)) {
            $nextID++;
        }
        return self::$codePrefix . $nextID;
    }
}
