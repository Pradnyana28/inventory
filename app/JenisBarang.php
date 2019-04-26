<?php

namespace App;

use App\Barang;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    protected $primaryKey = 'kode_jenis_barang';

    protected $fillable = [
        'kode_jenis_barang',
        'nama_jenis_barang'
    ];

    static protected $codePrefix = 'DB';

    public $incrementing = false;

    public function barang() {
        return $this->hasMany(Barang::class, 'kode_barang');
    }

    public function nextID() {
        $data = (self::latest()->first())->kode_jenis_barang;
        $data = str_replace(self::$codePrefix, '', $data);
        return self::$codePrefix . ($data + 1);
    }
}
