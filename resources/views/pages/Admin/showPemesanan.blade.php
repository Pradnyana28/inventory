@extends('layouts.app')

@section('page-title', 'Detail Pemesanan')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Detail Pemesanan')
        
        @component('components.form')
        @slot('method', 'PUT')
        @slot('action', route('pemesanan.update', Request::route('pemesanan')))
        <div class="table-responsive">
            <table class="table dTdPemesanan">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>QTY</th>
                        <th>Jumlah Disetujui</th>
                    </tr>
                </thead>
            </table>
        </div>

        @slot('button', 'Simpan')
        @endcomponent
    @endcomponent
</div>
@endsection

@section('custom-scripts')
<script type="text/javascript">
    $('.dTdPemesanan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route(Route::currentRouteName(), Request::route("pemesanan")) }}/data',
        columns: [
            { data: 'barang.kode_barang' },
            { data: 'barang.nama_barang' },
            { data: 'barang.satuan' },
            { data: 'jumlah_pemesanan' },
            { 
                data: 'jumlah_disetujui',
                render: function(d, t, r) {
                    // if (parseInt(d) > 0) {
                    //     jQuery('.save-button').remove()
                    //     return d;
                    // } else {
                        return `<input type="number" name="jumlah_disetujui[${r.kode_detail_pemesanan}]" value="${d}" class="form-control" />`
                    // }
                }
            },
        ]
    });
</script>
@endsection