<?php

namespace App\Http\Controllers\Barang;

use Auth;
use App\BarangKeluar;
use App\DetailBarangKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\DataTables\DataTableBase;

class BarangKeluarController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view("pages.{$this->jabatan()}.showBarangKeluar");
    }

    public function getData() {
        $barangKeluar = BarangKeluar::with('user')->get()->toArray();
        return Datatables::of($barangKeluar)->addColumn('action', function ($bk) {
                                return '<a href="'. route('barangKeluar.detail.index', $bk['kode_barang_keluar']) .'" class="btn btn-primary">Detail</a>';
                            })->make();
    }

    public function jabatan() {
        return Auth::user()->jabatan;
    }
}
