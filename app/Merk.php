<?php

namespace App;

use App\Barang;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $primaryKey = 'kode_merk';

    protected $fillable = [
        'kode_merk',
        'nama_merk'
    ];

    static protected $codePrefix = 'BM';

    public $incrementing = false;

    public function barang() {
        return $this->hasMany(Barang::class, 'kode_merk');
    }

    public function nextID() {
        $data = (self::latest()->first())->kode_merk;
        $data = str_replace(self::$codePrefix, '', $data);
        return self::$codePrefix . ($data + 1);
    }
}
