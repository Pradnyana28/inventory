@extends('layouts.app')
@section('page-title', 'Laporan')

@section('content')
<div class="container-fluid">
<div class="row clearfix">
    <div class="col-6">
    <a href="{{ route('laporanBarangMasuk') }}" title="laporan barang masuk">
        @component('components.card')
            <h2>Laporan Barang Masuk</h2>
            <p>Klik disini untuk melihar laporan</p>
        @endcomponent
    </a>
    </div>

    <div class="col-6">
    <a href="{{ route('laporanBarangKeluar') }}" title="laporan barang keluar">
        @component('components.card')
            <h2>Laporan Barang Keluar</h2>
            <p>Klik disini untuk melihat laporan</p>
        @endcomponent
    </a>
    </div>
</div>
</div>
@endsection