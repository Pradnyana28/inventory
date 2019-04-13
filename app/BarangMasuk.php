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

    public $incrementing = false;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function detailBarangMasuk() {
        return $this->hasMany(DetailBarangMasuk::class, 'kode_barang_masuk');
    }

    public static function nextID() {
        $data = self::all()->count();
        return 'BMS' . ($data + 1);
    }
}
