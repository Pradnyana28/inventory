<?php

namespace App\Http\Controllers\Pemesanan;

use Auth;
use App\Pemesanan;
use App\DetailPemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class PemesananDetailController extends Controller
{
    public function index($kode_pemesanan) {
        if (Auth::user()->departemen == 'Admin') {
            return $this->forAdmin($kode_pemesanan);
        }

        return $this->forOperation($kode_pemesanan);
    }

    public function forAdmin() {
        return view("pages.admin.showPemesanan");
    }

    public function forOperation($kode_pemesanan) {
        $detailPemesanan = DetailPemesanan::with(['barang', 'pemesanan'])
                                ->where('kode_pemesanan', $kode_pemesanan)
                                ->get()
                                ->toArray();
        return view("pages.staff.showPemesanan", ['detail' => $detailPemesanan]);
    }

    public function getData($kode_pemesanan) {
        $detailPemesanan = DetailPemesanan::select(['kode_barang', 'kode_pemesanan', 'kode_detail_pemesanan', 'jumlah_pemesanan', 'jumlah_disetujui'])
                                ->where('kode_pemesanan', $kode_pemesanan)
                                ->with(['barang', 'pemesanan'])
                                ->get()
                                ->toArray();
        return Datatables::of($detailPemesanan)->make();
    }
}
