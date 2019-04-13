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

    public $incrementing = false;

    public function barang() {
        return $this->hasMany(Barang::class, 'kode_barang');
    }

    public function nextID() {
        $data = $this->all()->count();
        return 'DB' . ($data + 1);
    }
}
