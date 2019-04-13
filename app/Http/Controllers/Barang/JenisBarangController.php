<?php

namespace App\Http\Controllers\Barang;

use Exception;
use App\JenisBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class JenisBarangController extends Controller
{
    public function __constructor() {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.Admin.showJenisBarang');
    }

    public function create() {
        return view('pages.Admin.createJenisBarang');
    }

    public function store(Request $request) {
        try {
            $this->validate($request, ['nama_jenis_barang' => 'required']);
            // get request data
            $data = $request->all();
            $data['kode_jenis_barang'] = (new JenisBarang)->nextID();
            // save to database
            JenisBarang::create($data);
            // return response
            return response()->json([
                'success' => 'true',
                'redirect' => route('jenisBarang.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function edit($id) {
        $data = JenisBarang::findOrFail($id);
        return view('pages.Admin.editJenisBarang', compact('data'));
    }

    public function update(Request $request, $id) {
        try {
            $this->validate($request, ['nama_jenis_barang' => 'required']);
            // get request data
            $data = $request->all();
            // find jenis barang
            $jenisBarang = JenisBarang::findOrFail($id);
            $jenisBarang->nama_jenis_barang = $data['nama_jenis_barang'];
            $jenisBarang->save();
            // return response
            return response()->json([
                'success' => 'true',
                'redirect' => route('jenisBarang.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function getData() {
        $jenisBarang = JenisBarang::select(['kode_jenis_barang', 'nama_jenis_barang'])->get()->toArray();
        return Datatables::of($jenisBarang)
                ->addColumn('action', function ($m) {
                    return "<a href='". route('jenisBarang.edit', $m['kode_jenis_barang']) ."' class='btn btn-primary'>Edit</a>";
                })
                ->make();
    }
}
