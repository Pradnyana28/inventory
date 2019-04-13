@extends('layouts.app')
@section('page-title', 'Pesanan Masuk')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Pesanan Masuk')

        <div class="table-responsive">
            <table class="table dTpemesanan">
                <thead>
                    <tr>
                        <th>Kode Pemesanan</th>
                        <th>Departemen</th>
                        <th>Tanggal Pemesanan</th>
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
    $('.dTpemesanan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route(Route::currentRouteName()) }}/data',
        columns: [
            { data: 'kode_pemesanan' },
            { data: 'users.departemen' },
            { data: 'created_at' },
            { data: 'action' }
        ]
    });
</script>
@endsection