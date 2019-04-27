@extends('layouts.app')

@section('page-title', 'Pemesanan')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Riwayat Pemesanan')

        <div class="table-responsive">
            <table class="table dTpemesanan">
                <thead>
                    <tr>
                        <th>Kode Pemesanan</th>
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
        { data: 'created_at' },
        { data: 'action' }
    ]
});
</script>
@endsection