@extends('layouts.app')
@section('page-title', 'Laporan Barang Masuk')

@section('content')
<div class="container-fluid">
    @component('components.card')
    <div class="row clearfix">
    @component('components.form')
        @slot('action', route(Route::currentRouteName()))
        @slot('method', 'GET')

        @component('components.field')
            @slot('label', 'Dari Tanggal')
            @slot('fieldClass', 'datepicker')
            @slot('attribute', [
                'type' => 'date',
                'placeholder' => 'pilih tanggal',
                'name' => 'startDateReport',
                'value' => request()->get('startDateReport')
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Sampai Tanggal')
            @slot('fieldClass', 'datepicker')
            @slot('attribute', [
                'type' => 'date',
                'placeholder' => 'pilih tanggal',
                'name' => 'endDateReport',
                'value' => request()->get('endDateReport')
            ])
        @endcomponent

        @slot('button', 'Cetak Laporan')
    @endcomponent
    </div>
    @endcomponent

    @component('components.card')
        @slot('title', 'Laporan Barang Masuk')

        <div class="table-responsive mt-4">
            <table class="table dTuser">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                    </tr>
                </thead>
            </table>
        </div>
    @endcomponent
</div>
@endsection

@php
    $params = isset($_GET) ? json_encode($_GET) : '';
    echo "<input type='hidden' id='reportParams' value='{$params}' />";
@endphp

@section('custom-scripts')
<script type="text/javascript">
    const params = document.getElementById('reportParams').value
    $('.dTuser').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route(Route::currentRouteName()) }}/data',
            data: JSON.parse(params)
        },
        columns: [
            { data: 'created_at' },
            { data: 'kode_barang' },
            { data: 'barang.nama_barang' },
            { data: 'jumlah' },
        ]
    });
</script>
@endsection