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

    public $incrementing = false;

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detailPemesanan() {
        return $this->hasMany(DetailPemesanan::class);
    }

    public function nextID() {
        $data = $this->all()->count();
        return 'P' . ($data + 1);
    }
}
