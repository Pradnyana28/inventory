@extends('layouts.app')
@section('page-title', 'Tambah User')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @component('components.form')
            @slot('action', route('users.store'))
            @slot('method', 'POST')

            @component('components.field')
                @slot('label', 'Nama')
                @slot('class', 'col-md-4')
                @slot('attribute', [
                    'type' => 'text',
                    'placeholder' => 'nama',
                    'name' => 'nama_user'
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Email')
                @slot('class', 'col-md-4')
                @slot('attribute', [
                    'type' => 'email',
                    'placeholder' => 'email',
                    'name' => 'email'
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Jabatan')
                @slot('class', 'col-md-4')
                @slot('select', true)
                @slot('attribute', [
                    'name' => 'jabatan',
                    'options' => \App\User::jabatanList()
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Departemen')
                @slot('class', 'col-md-4')
                @slot('select', true)
                @slot('attribute', [
                    'name' => 'departemen',
                    'options' => \App\User::departemenList()
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Kata Sandi')
                @slot('class', 'col-md-4')
                @slot('attribute', [
                    'type' => 'password',
                    'placeholder' => 'kata sandi',
                    'name' => 'password'
                ])
            @endcomponent

            @component('components.field')
                @slot('label', 'Ulangi Kata Sandi')
                @slot('class', 'col-md-4')
                @slot('attribute', [
                    'type' => 'password',
                    'placeholder' => 'ulangi kata sandi',
                    'name' => 'password_confirmation'
                ])
            @endcomponent

            @slot('button', 'Simpan')
        @endcomponent
    @endcomponent
</div>
@endsection