@extends('layouts.app')
@section('page-title', 'Edit Merk')

@section('content')
<div class="container-fluid">
@if (isset($data) && !empty($data))
    @component('components.card')
        @component('components.form')
            @slot('action', route('merk.update', $data->kode_merk))
            @slot('method', 'PUT')
            
            @component('components.field')
                @slot('label', 'Kode Merk')
                @slot('attribute', [
                    'type' => 'text',
                    'disabled' => 'disabled',
                    'value' => $data->kode_merk
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Nama Merk')
                @slot('attribute', [
                    'type' => 'text',
                    'placeholder' => 'merk',
                    'name' => 'nama_merk',
                    'value' => $data->nama_merk
                ])
            @endcomponent

            @slot('button', 'Simpan')
        @endcomponent
    @endcomponent
@endif
</div>
@endsection