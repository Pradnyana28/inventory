@extends('layouts.app')
@section('page-title', 'Tambah Merk')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @component('components.form')
            @slot('action', route('merk.store'))
            @slot('method', 'POST')
            
            @component('components.field')
                @slot('label', 'Kode Merk')
                @slot('attribute', [
                    'type' => 'text',
                    'disabled' => 'disabled',
                    'value' => (new App\Merk)->nextID()
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Nama Merk')
                @slot('attribute', [
                    'type' => 'text',
                    'placeholder' => 'merk',
                    'name' => 'nama_merk'
                ])
            @endcomponent

            @slot('button', 'Simpan')
        @endcomponent
    @endcomponent
</div>
@endsection