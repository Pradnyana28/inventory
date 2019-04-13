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

    public $incrementing = false;

    public function barang() {
        return $this->hasMany(Barang::class, 'kode_merk');
    }

    public function nextID() {
        $data = $this->all()->count();
        return 'BM' . ($data + 1);
    }
}
