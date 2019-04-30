<?php

namespace App\Http\Controllers\Barang;

use Auth;
use App\BarangKeluar;
use App\DetailBarangKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

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

    /**
     * DataTables ajax response for barang masuk report
     */
    public function report(Request $request) {
        $start = $request->get('startDateReport');
        $end = $request->get('endDateReport');
        $detailBarangKeluar = DetailBarangKeluar::with('barang')
        ->where('status', 'ya')
        ->whereBetween('created_at', [$start, $end])->get()->toArray();
        return DataTables::of($detailBarangKeluar)->make();
    }
}
