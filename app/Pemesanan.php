<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $primaryKey = 'kode_pemesanan';

    protected $fillable = [
        'kode_pemesanan',
        'user_id'
    ];

    static protected $codePrefix = 'P';

    public $incrementing = false;

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailPemesanan() {
        return $this->hasMany(DetailPemesanan::class);
    }

    public function nextID() {
        $data = (self::latest()->first())->kode_pemesanan;
        $data = str_replace(self::$codePrefix, '', $data);
        return self::$codePrefix . ($data + 1);
    }
}
