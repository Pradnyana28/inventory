<?php

namespace App\Http\Controllers\Barang;

use Exception;
use DataTables;
use App\Barang;
use App\DetailBarangKeluar;
use App\DetailPemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailBarangKeluarController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($kode_barang_keluar) {
        return view('pages.Admin.showDetailBarangKeluar', compact('kode_barang_keluar'));
    }

    public function update(Request $request, $kode_barang_keluar) {
        try {
            /**
             * validate request
             * @param status_penerimaan array is required
             */
            $this->validate($request, ['status_penerimaan' => 'array|required']);
            
            // update data
            foreach ($request->get('status_penerimaan') as $id_detail_barang_keluar => $status) {
                $check = DetailBarangKeluar::findOrFail($id_detail_barang_keluar);

                if ($check->status != $status) {
                    $check->status = $status;
                    $check->save();
                    
                    DetailPemesanan::where('kode_pemesanan', $check->kode_pemesanan)
                                    ->where('kode_barang', $check->kode_barang)
                                    ->update([
                                        'status' => $status == 'ya' ? 'yes' : 'no'
                                    ]);
                    $this->stockTransaction($status, $check);
                }
            }

            // return success response
            return response()->json([
                'success' => true,
                'redirect' => route('barangKeluar.index')
            ]);

        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function stockTransaction($status, $check) {
        if ($status == 'ya') {
            Barang::decreaseStock($check->kode_barang, $check->jumlah_disetujui);
        } else {
            Barang::increaseStock($check->kode_barang, $check->jumlah_disetujui);
        }
    }

    public function report($kode_barang_keluar) {
        $data = DetailBarangKeluar::with(['barangKeluar', 'pemesanan', 'barang'])->where('kode_barang_keluar', $kode_barang_keluar)->get()->toArray();
        return DataTables::of($data)->make();
    }
}
