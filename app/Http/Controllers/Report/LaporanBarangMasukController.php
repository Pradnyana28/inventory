<?php

namespace App\Http\Controllers\Report;

use PDF;
use App\DetailBarangMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanBarangMasukController extends Controller
{
    public function index(Request $request) {
        $start = $request->get('startDateReport');
        $end = $request->get('endDateReport');
        $data = DetailBarangMasuk::with('barang')->whereBetween('created_at', [$start, $end])->get();
        
        $pdf = PDF::loadView('layouts.pdf.barangMasuk', compact('data', 'start', 'end'));
	    return $pdf->stream('reportBarangMasuk_'. time() .'.pdf');
    }
}
