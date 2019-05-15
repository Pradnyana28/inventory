<?php

namespace App\Http\Controllers\Barang;

use Validator;
use Exception;
use App\Barang;
use App\Merk;
use App\JenisBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    public function __constructor() {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.Admin.showBarang');
    }

    public function create() {
        $merks        = $this->fetchMerk();
        $jenis_barang = $this->fetchJenisBarang();
        return view('pages.Admin.createBarang', compact('jenis_barang', 'merks'));
    }

    public function store(Request $request) {
        try {
            // validate request
            $messages = [
                'required' => ':attribute harus diisi.',
                'confirmed' => ':attribute harus diisi.',
                'integer' => ':attribute harus berupa angka.'
            ];
            
            $validator = Validator::make($request->all(), [
                'kode_merk' => 'required',
                'kode_jenis_barang' => 'required',
                'nama_barang' => 'required',
                'minimum_stok' => 'required|integer',
                'satuan' => 'required'
            ], $messages);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $message) {
                    throw new Exception($message);
                }
            }
            // save it
            $data = $request->all();
            $data['stok'] = 0;
            $data['kode_barang'] = Barang::nextID();
            Barang::create($data);
            // return response
            return response()->json([
                'success' => true,
                'redirect' => route('barang.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        $data         = Barang::findOrFail($id);
        $merks        = $this->fetchMerk();
        $jenis_barang = $this->fetchJenisBarang();
        return view('pages.Admin.editBarang', compact('data', 'jenis_barang', 'merks'));
    }

    public function update(Request $request, $id) {
        try {
            // validate request
            $this->validate($request, [
                'kode_merk' => 'required',
                'kode_jenis_barang' => 'required',
                'nama_barang' => 'required',
                'minimum_stok' => 'required|integer'
            ]);
            // save it
            $data = $request->all();
            $barang = Barang::findOrFail($id);
            $barang->fill($data);
            $barang->save();
            // return response
            return response()->json([
                'success' => true,
                'redirect' => route('barang.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function fetchJenisBarang() {
        $jenisBarang = JenisBarang::all(); $jenis_barang = [];
        if ($jenisBarang):
            foreach ($jenisBarang as $jb):
                $jenis_barang[$jb->kode_jenis_barang] = $jb->nama_jenis_barang;
            endforeach;
        endif;
        return $jenis_barang;
    }

    public function fetchMerk() {
        $merk = Merk::all(); $merks = [];
        if ($merk):
            foreach ($merk as $m):
                $merks[$m->kode_merk] = $m->nama_merk;
            endforeach;
        endif;
        return $merks;
    }

    public function getData() {
        $barang = Barang::select(['kode_barang', 'kode_jenis_barang', 'kode_merk', 'nama_barang', 'stok', 'satuan', 'minimum_stok'])
                    ->with(['jenis_barang', 'merk'])
                    ->get()
                    ->toArray();
        return DataTables::of($barang)
                ->editColumn('merk', function ($b) {
                    return !isset($b['merk']['nama_merk']) ? 'Tidak ada merk' : $b['merk']['nama_merk'];
                })
                ->editColumn('jenis_barang', function ($b) {
                    return !isset($b['jenis_barang']['nama_jenis_barang']) ? 'Tidak ada jenis barang' : $b['jenis_barang']['nama_jenis_barang'];
                })
                ->addColumn('action', function ($b) {
                    return "<a href='". route('barang.edit', $b['kode_barang']) ."' class='btn btn-primary'>Edit</a>";
                })
                ->make();
    }
}
