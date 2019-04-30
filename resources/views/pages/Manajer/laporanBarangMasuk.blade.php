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

        @slot('button', 'Tampilkan Laporan')
    @endcomponent
    </div>
    @endcomponent

    @component('components.card')
        @slot('title', 'Laporan Barang Masuk')

        {!! $dataTable->table() !!}
    @endcomponent
</div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush