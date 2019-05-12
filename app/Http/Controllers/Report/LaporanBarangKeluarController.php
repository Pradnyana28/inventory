<?php

namespace App\Http\Controllers\Report;

use PDF;
use App\DetailBarangKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanBarangKeluarController extends Controller
{
    public function index(Request $request) {
        $start = $request->get('startDateReport');
        $end = $request->get('endDateReport');
        $data = DetailBarangKeluar::with('barang')->where('status', 'ya')->whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadView('layouts.pdf.barangKeluar', compact('data', 'start', 'end'));
        return $pdf->stream('reportBarangMasuk_'. time() .'.pdf');
    }
}
