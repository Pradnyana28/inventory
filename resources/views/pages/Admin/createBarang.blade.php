@extends('layouts.app')
@section('page-title', 'Tambah Barang')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @component('components.form')
            @slot('action', route('barang.store'))
            @slot('method', 'POST')
            
            @component('components.field')
                @slot('label', 'Kode Barang')
                @slot('class', 'col-md-4')
                @slot('attribute', [
                    'type' => 'text',
                    'disabled' => 'disabled',
                    'value' => App\Barang::nextID()
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Merk')
                @slot('class', 'col-md-4')
                @slot('select', true)
                @slot('attribute', [
                    'name' => 'kode_merk',
                    'options' => isset($merks) ? $merks : []
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Kode Jenis Barang')
                @slot('class', 'col-md-4')
                @slot('select', true)
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
                    'name' => 'nama_barang'
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Stok')
                @slot('class', 'col-md-2')
                @slot('attribute', [
                    'type' => 'number',
                    'placeholder' => 'stok',
                    'name' => 'stok',
                    'value' => 0,
                    'disabled' => 'disabled'
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Minimum Stok')
                @slot('class', 'col-md-2')
                @slot('attribute', [
                    'type' => 'number',
                    'placeholder' => 'minimum stok',
                    'name' => 'minimum_stok'
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Satuan')
                @slot('class', 'col-md-2')
                @slot('attribute', [
                    'type' => 'text',
                    'placeholder' => 'satuan',
                    'name' => 'satuan'
                ])
            @endcomponent

            @slot('button', 'Simpan')
        @endcomponent
    @endcomponent
</div>
@endsection