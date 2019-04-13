<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = "user_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password',
        'email',
        'nama_user',
        'jabatan',
        'departemen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function setNameAttribute($name) {
        $this->attributes['nama_user'] = strtolower($name);
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }

    public function pemesanan() {
        return $this->hasMany(Pemesanan::class, 'user_id');
    }

    public function barangMasuk() {
        return $this->hasMany(BarangMasuk::class, 'user_id');
    }

    public function barangKeluar() {
        return $this->hasMany(BarangKeluar::class, 'user_id');
    }

    public static function generatePassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}
