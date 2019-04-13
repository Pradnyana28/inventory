<?php

namespace App\Http\Controllers;

use Exception;
use App\Merk;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MerkController extends Controller
{
    public function __constructor() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.Admin.showMerk');
    }

    public function create()
    {
        return view('pages.Admin.createMerk');
    }

    public function store(Request $request)
    {
        try {
            // validate request
            $this->validate($request, ['nama_merk' => 'required']);
            // save it
            $data = $request->all();
            $data['kode_merk'] = (new Merk)->nextID();
            Merk::create($data);
            // return response
            return response()->json([
                'success' => true,
                'redirect' => route('merk.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Merk::findOrFail($id);
        return view('pages.Admin.editMerk', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            // validate request
            $this->validate($request, ['nama_merk' => 'required']);
            // save it
            $data = $request->all();
            // find data
            $merk = Merk::findOrFail($id);
            $merk->nama_merk = $data['nama_merk'];
            $merk->save();
            // return response
            return response()->json([
                'success' => true,
                'redirect' => route('merk.index')
            ]);
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
    }

    public function getData() {
        $merks = Merk::select(['kode_merk', 'nama_merk'])->get()->toArray();
        return Datatables::of($merks)
                ->addColumn('action', function ($m) {
                    return "<a href='". route('merk.edit', $m['kode_merk']) ."' class='btn btn-primary'>Edit</a>";
                })
                ->make();
    }
}
