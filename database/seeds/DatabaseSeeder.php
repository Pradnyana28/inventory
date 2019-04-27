<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                [
                    'nama_user' => 'Agus Dibya',
                    'email' => 'operation@inventory.com',
                    'jabatan' => 'Staff',
                    'departemen' => 'Operation',
                    'password' => User::generatePassword('123456789')
                ],
                [
                    'nama_user' => 'Dibya Ajus',
                    'email' => 'admin@inventory.com',
                    'jabatan' => 'Admin',
                    'departemen' => 'Manajemen',
                    'password' => User::generatePassword('123456789')
                ],
                [
                    'nama_user' => 'Bos Dibya',
                    'email' => 'manajer@inventory.com',
                    'jabatan' => 'Manajer',
                    'departemen' => 'Manajemen',
                    'password' => User::generatePassword('123456789')
                ]
            ]);
    }
}
