@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
    @include("pages.". mb_strtolower(Auth::user()->jabatan, 'utf-8') .".dashboard")
@endsection