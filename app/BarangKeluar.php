<?php

namespace App;

use App\User;
use App\DetailBarangKeluar;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $primaryKey = 'kode_barang_keluar';

    protected $fillable = [
        'kode_barang_keluar',
        'user_id',
    ];

    static protected $codePrefix = 'BKS';

    public $incrementing = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailBarangKeluar() {
        return $this->hasMany(DetailBarangKeluar::class, 'kode_barang_keluar');
    }

    public static function nextID() {
        $data = self::latest()->first() ? ((self::latest()->first()))->kode_barang_keluar : self::$codePrefix . 0;
        $data = str_replace(self::$codePrefix, '', $data);
        return self::$codePrefix . ($data + 1);
    }
}
