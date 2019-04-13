@extends('layouts.app')
@section('page-title', 'Barang')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Data Barang')
        @slot('button', ['link' => route('barang.create'), 'text' => 'Tambah Barang'])

        <div class="table-responsive mt-4">
            <table class="table dTbarang">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Merk</th>
                        <th>Jenis Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Minimum Stok</th>
                        <th>Aksi</th>
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
            { data: 'kode_barang' },
            { data: 'merk.nama_merk' },
            { data: 'jenis_barang.nama_jenis_barang' },
            { data: 'nama_barang' },
            { data: 'stok' },
            { data: 'satuan' },
            { data: 'minimum_stok' },
            { data: 'action' }
        ]
    });
</script>
@endsection