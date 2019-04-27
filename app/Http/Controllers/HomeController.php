<?php

namespace App\Http\Controllers;

use Auth;
use App\Barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        if (Auth::user()->jabatan == 'Admin') {
            // get data barang to show on dashboard
            $data['barang'] = Barang::whereRaw('stok < minimum_stok')->get()->toArray();
        }
        // return $data;
        return view('home', compact('data'));
    }
}
