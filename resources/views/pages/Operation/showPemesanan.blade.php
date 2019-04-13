@extends('layouts.app')

@section('page-title', 'Detail Pemesanan')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Detail Pemesanan')

        <div class="table-responsive">
            <table class="table dataTableDef">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>QTY</th>
                        <th>Jumlah Disetujui</th>
                        <th>Satuan</th>
                        <th>Tgl. Pemesanan</th>
                        <th>Status Pemesanan</th>
                        <th>Tgl. Diterima</th>
                    </tr>
                </thead>

                <tbody>
                @if (count($detail) > 0)
                    @foreach ($detail as $d)
                    <tr>
                        <td>{{ $d['barang']['nama_barang'] }}</td>
                        <td>{{ $d['jumlah_pemesanan'] }}</td>
                        <td>{{ $d['jumlah_disetujui'] }}</td>
                        <td>{{ $d['barang']['satuan'] }}</td>
                        <td>{{ $d['created_at'] }}</td>
                        <td>{{ $d['status'] == 'no' ? 'Belum Diterima' : 'Diterima' }}</td>
                        <td>{{ $d['updated_at'] }}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    @endcomponent
</div>
@endsection