@extends('layouts.app')
@section('page-title', 'Edit User')

@section('content')
<div class="container-fluid">
@if (isset($data) && !empty($data))
    @component('components.card')
    @component('components.form')
        @slot('action', route('users.update', $data->user_id))
        @slot('method', 'PUT')

        @component('components.field')
            @slot('label', 'Nama')
            @slot('class', 'col-md-4')
            @slot('attribute', [
                'type' => 'text',
                'placeholder' => 'nama',
                'name' => 'nama_user',
                'value' => $data->nama_user
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Email')
            @slot('class', 'col-md-4')
            @slot('attribute', [
                'type' => 'email',
                'placeholder' => 'email',
                'name' => 'email',
                'value' => $data->email
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Jabatan')
            @slot('class', 'col-md-4')
            @slot('select', true)
            @slot('selected', $data->jabatan)
            @slot('attribute', [
                'name' => 'jabatan',
                'options' => [
                    'Operator Gudang' => 'Operator Gudang',
                    'Staff Admin' => 'Staff Admin',
                    'Manajer' => 'Manajer'
                ]
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Departemen')
            @slot('class', 'col-md-4')
            @slot('select', true)
            @slot('selected', $data->departemen)
            @slot('attribute', [
                'name' => 'departemen',
                'options' => [
                    'Operation' => 'Karyawan',
                    'Admin' => 'Admin',
                    'Manajer' => 'Manajer'
                ]
            ])
        @endcomponent

        <div class="col-12 mt-3">
            <p>Gunakan form dibawah untuk merubah kata sandi.</p>
        </div>

        @component('components.field')
            @slot('label', 'Kata Sandi')
            @slot('class', 'col-6')
            @slot('attribute', [
                'type' => 'password',
                'placeholder' => 'kata sandi',
                'name' => 'password'
            ])
        @endcomponent

        @component('components.field')
            @slot('label', 'Ulangi Kata Sandi')
            @slot('class', 'col-6')
            @slot('attribute', [
                'type' => 'password',
                'placeholder' => 'ulangi kata sandi',
                'name' => 'password_confirmation'
            ])
        @endcomponent

        @slot('button', 'Simpan')
    @endcomponent
    @endcomponent
@endif
</div>
@endsection