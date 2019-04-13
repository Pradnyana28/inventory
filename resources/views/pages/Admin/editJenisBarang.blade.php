@extends('layouts.app')
@section('page-title', 'Edit Jenis Barang')

@section('content')
<div class="container-fluid">
@if (isset($data) && !empty($data))
    @component('components.card')
    @component('components.form')
        @slot('action', route('jenisBarang.update', $data->kode_jenis_barang))
        @slot('method', 'PUT')

        @component('components.field')
            @slot('label', 'Kode Jenis Barang')
            @slot('attribute', [
                'type' => 'text',
                'disabled' => 'disabled',
                'value' => $data->kode_jenis_barang
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Nama Jenis Barang')
            @slot('attribute', [
                'type' => 'text',
                'placeholder' => 'jenis barang',
                'name' => 'nama_jenis_barang',
                'value' => $data->nama_jenis_barang
            ])
        @endcomponent

        @slot('button', 'Simpan')
    @endcomponent
    @endcomponent
@endif
</div>
@endsection