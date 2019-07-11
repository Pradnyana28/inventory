<?php

namespace App\Http\Controllers\Report;

use Facades\App\Pemesanan;
use Facades\App\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanLainLainController extends Controller
{
    public function index(Request $request) {
        $laporan = [
            'departemenPemesan' => $this->departemenPemesan(),
            'barangSeringDipesan' => $this->barangSeringDipesan(),
            'barangBanyakDipesan' => $this->barangBanyakDipesan(),
            'barangSedikitDipesan' => $this->barangSedikitDipesan(),
            'barangJarangDipesan' => $this->barangJarangDipesan()
        ];
        return view('pages.Manajer.laporanLainLain', compact('laporan'));
    }

    public function departemenPemesan() {
        return Pemesanan::seringMemesan();
    }

    public function barangSeringDipesan() {
        return Barang::seringDipesan();
    }

    public function barangBanyakDipesan() {
        return Barang::banyakDipesan();
    }

    public function barangSedikitDipesan() {
        return Barang::seringDipesan('asc');
    }

    public function barangJarangDipesan() {
        return Barang::banyakDipesan('asc');
    }
}
