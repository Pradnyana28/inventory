<?php

namespace App\Http\Controllers\Barang;

use Validator;
use Exception;
use Auth;
use App\Barang;
use App\BarangMasuk;
use App\DetailBarangMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\DataTables\LaporanBarangMasukDataTable;

class BarangMasukController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.Admin.showBarangMasuk');
    }

    public function create() {
        $barang = Barang::all()->toArray();
        return view('pages.Admin.createBarangMasuk', compact('barang'));
    }

    public function store(Request $request) {
        try {
            $messages = [
                'required' => ':attribute harus diisi.',
                'min' => 'Mohon memasukkan jumlah barang masuk.'
            ];
            
            $validator = Validator::make($request->all(), [
                'qty' => 'array|required',
                'qty.*' => 'integer|min:1|required',
                'kode_barang' => 'array|required',
            ], $messages);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $message) {
                    throw new Exception($message);
                }
            }

            // save it
            $data = $request->all();
            $data['kode_barang_masuk'] = BarangMasuk::nextID();
            $data['user_id'] = Auth::user()->user_id;
            $data['tgl_masuk'] = date('Y-m-d');
            BarangMasuk::create($data);
            // save to detail barang masuk
            if (count($data['kode_barang']) > 0) {
                for ($i=0; $i < count($data['kode_barang']); $i++) { 
                    $detail['kode_detailbarang_masuk'] = DetailBarangMasuk::nextID();
                    $detail['kode_barang_masuk'] = $data['kode_barang_masuk'];
                    $detail['kode_barang'] = $data['kode_barang'][$i];
                    $detail['jumlah'] = $data['qty'][$i];
                    DetailBarangMasuk::create($detail);
                    // update stok barang
                    Barang::increaseStock($detail['kode_barang'], $detail['jumlah']);
                }
            }
            // return response
            return response()->json([
                'success' => true,
                'redirect' => route('barangMasuk.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function getData() {
        $detailBarangMasuk = DetailBarangMasuk::with('barang')->get()->toArray();
        return DataTables::of($detailBarangMasuk)->make();
    }

    public function report(LaporanBarangMasukDataTable $dataTable) {
        return $dataTable->with([
            'start' => request()->get('startDateReport'),
            'end' => request()->get('endDateReport')
        ])->render('pages.Manajer.laporanBarangMasuk');
    }
}
