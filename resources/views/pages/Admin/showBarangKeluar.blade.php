@extends('layouts.app')
@section('page-title', 'Barang Keluar')

@section('content')
<div class="container-fluid">
    @component('components.card')
        <div class="table-responsive">
            <table class="table dTbarangKeluar">
                <thead>
                    <tr>
                        <th>Kode Barang Keluar</th>
                        <th>Disetujui Oleh</th>
                        <th>Tgl. Barang Keluar</th>
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
    $('.dTbarangKeluar').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route(Route::currentRouteName()) }}/data',
        columns: [
            { data: 'kode_barang_keluar' },
            { data: 'user.nama_user' },
            { data: 'created_at' },
            { data: 'action' }
        ]
    });
</script>
@endsection