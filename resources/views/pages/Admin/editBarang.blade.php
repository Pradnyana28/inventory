@extends('layouts.app')
@section('page-title', 'Edit Barang')

@section('content')
<div class="container-fluid">
@if (isset($data) && !empty($data))
    @component('components.card')
    @component('components.form')
        @slot('action', route('barang.update', $data->kode_barang))
        @slot('method', 'PUT')
        
        @component('components.field')
            @slot('label', 'Kode Barang')
            @slot('class', 'col-md-4')
            @slot('attribute', [
                'type' => 'text',
                'disabled' => 'disabled',
                'value' => $data->kode_barang
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Kode Merk')
            @slot('class', 'col-md-4')
            @slot('select', true)
            @slot('selected', $data->kode_merk)
            @slot('attribute', [
                'name' => 'kode_merk',
                'options' => isset($merks) ? $merks : []
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Kode Jenis Barang')
            @slot('class', 'col-md-4')
            @slot('select', true)
            @slot('selected', $data->kode_jenis_barang)
            @slot('attribute', [
                'name' => 'kode_jenis_barang',
                'options' => isset($jenis_barang) ? $jenis_barang : []
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Nama Barang')
            @slot('class', 'col-md-6')
            @slot('attribute', [
                'type' => 'text',
                'placeholder' => 'nama barang',
                'name' => 'nama_barang',
                'value' => $data->nama_barang
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Stok')
            @slot('class', 'col-md-2')
            @slot('attribute', [
                'type' => 'number',
                'placeholder' => 'stok',
                'name' => 'stok',
                'value' => $data->stok
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Minimum Stok')
            @slot('class', 'col-md-2')
            @slot('attribute', [
                'type' => 'number',
                'placeholder' => 'minimum stok',
                'name' => 'minimum_stok',
                'value' => $data->minimum_stok
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Satuan')
            @slot('class', 'col-md-2')
            @slot('attribute', [
                'type' => 'text',
                'placeholder' => 'satuan',
                'name' => 'satuan',
                'value' => $data->satuan
            ])
        @endcomponent

        @slot('button', 'Simpan')
    @endcomponent
    @endcomponent
@endif
</div>
@endsection