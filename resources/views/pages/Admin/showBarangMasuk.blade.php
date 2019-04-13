@extends('layouts.app')
@section('page-title', 'Barang Masuk')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Data Barang Masuk')
        @slot('button', ['link' => route('barangMasuk.create'), 'text' => 'Tambah Barang Masuk'])

        <div class="table-responsive mt-4">
            <table class="table dTbarang">
                <thead>
                    <tr>
                        <th>Kode Barang Masuk</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok Masuk</th>
                        <th>Satuan</th>
                        <th>Tgl. Masuk</th>
                    </tr>
                </thead>
            </table>
        </div>
    @endcomponent
</div>
@endsection

@section('custom-scripts')
<script type="text/javascript">
    $('.dTbarang').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route(Route::currentRouteName()) }}/data',
        columns: [
            { data: 'kode_barang_masuk' },
            { data: 'kode_barang' },
            { data: 'barang.nama_barang' },
            { data: 'jumlah' },
            { data: 'barang.satuan' },
            { data: 'created_at' }
        ]
    });
</script>
@endsection