@extends('layouts.app')
@section('page-title', 'Tambah Jenis Barang')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @component('components.form')
            @slot('action', route('jenisBarang.store'))
            @slot('method', 'POST')
            
            @component('components.field')
                @slot('label', 'Kode Jenis Barang')
                @slot('attribute', [
                    'type' => 'text',
                    'disabled' => 'disabled',
                    'value' => (new App\JenisBarang)->nextID()
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Nama Jenis Barang')
                @slot('attribute', [
                    'type' => 'text',
                    'placeholder' => 'jenis barang',
                    'name' => 'nama_jenis_barang'
                ])
            @endcomponent

            @slot('button', 'Simpan')
        @endcomponent
    @endcomponent
</div>
@endsection