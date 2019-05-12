@extends('layouts.app')
@section('page-title', 'Laporan Barang Keluar')

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

        @slot('button', 'Tampilkan Laporan')
        @if (request()->has('startDateReport') && request()->has('endDateReport'))
            @slot('appendButton')
                <a href="{{ route('cetak.laporanBarangKeluar') }}?startDateReport={{ request()->get('startDateReport') }}&endDateReport={{ request()->get('endDateReport') }}" target="_blank" class="btn btn-danger save-button float-right" style="margin-right: 5px;">Cetak Laporan</a>
            @endslot
        @endif
    @endcomponent
    </div>
    @endcomponent

    @component('components.card')
        @slot('title', 'Laporan Barang Keluar')

        {!! $dataTable->table() !!}
    @endcomponent
</div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush