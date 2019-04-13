@extends('layouts.app')
@section('page-title', 'Detail Barang Keluar')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Detail Pemesanan')
        
        @component('components.form')
        @slot('method', 'PUT')
        @slot('action', route('detailBarangKeluar.bulkUpdate', $kode_barang_keluar))
        <div class="table-responsive">
            <table class="table dTdBarangKeluar">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>QTY</th>
                        <th>Jumlah Disetujui</th>
                        <th>Status</th>
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
    $('.dTdBarangKeluar').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route(Route::currentRouteName(), $kode_barang_keluar) }}/data',
        columns: [
            { data: 'kode_barang' },
            { data: 'barang.nama_barang' },
            { data: 'barang.satuan' },
            { data: 'jumlah_pemesanan' },
            { data: 'jumlah_disetujui' },
            { 
                data: 'status',
                render: function(d, t, r) {
                    return `<div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_penerimaan[${r.id_detail_barang_keluar}]" id="inlineRadio1" value="ya" ${d === "ya" ? "checked" : null}>
                                <label class="form-check-label" for="inlineRadio1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_penerimaan[${r.id_detail_barang_keluar}]" id="inlineRadio2" value="tidak" ${d === "tidak" ? "checked" : null}>
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>`
                }
            },
        ]
    });
</script>
@endsection