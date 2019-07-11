@extends('layouts.app')
@section('page-title', 'Laporan Lain Lain')

@php
    $departemenPalingBanyak = $laporan['departemenPemesan'];
    $barangBanyakDipesan = $laporan['barangBanyakDipesan'];
    $barangSeringDipesan = $laporan['barangSeringDipesan'];
    $barangSedikitDipesan = $laporan['barangSedikitDipesan'];
    $barangJarangDipesan = $laporan['barangJarangDipesan'];
@endphp

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-6">
            @component('components.card')
                @slot('title', 'Departemen Paling Sering Memesan')

                @if (count($departemenPalingBanyak) > 0)
                    <ul>
                    @foreach ($departemenPalingBanyak as $item)
                        <li>{{ $item['users']['departemen'] .' - '. $item['total'] .'x' }}</li>
                    @endforeach
                    </ul>
                @else
                <p>Belum ada data masuk.</p>
                @endif
            @endcomponent
        </div>

        <div class="col-6">
            @component('components.card')
                @slot('title', 'Barang Sering Dipesan')

                @if (count($barangSeringDipesan) > 0)
                    <ul>
                    @foreach ($barangSeringDipesan as $item)
                        <li>{{ $item['barang']['nama_barang'] .' - '. $item['total'] .'x' }}</li>
                    @endforeach
                    </ul>
                @else
                <p>Belum ada data masuk.</p>
                @endif
            @endcomponent
        </div>

        <div class="col-6">
            @component('components.card')
                @slot('title', 'Barang Paling Banyak Dipesan')

                @if (count($barangBanyakDipesan) > 0)
                    <ul>
                    @foreach ($barangBanyakDipesan as $item)
                        <li>{{ $item['barang']['nama_barang'] .' - '. $item['total'] .'x' }}</li>
                    @endforeach
                    </ul>
                @else
                <p>Belum ada data masuk.</p>
                @endif
            @endcomponent
        </div>

        <div class="col-6">
            @component('components.card')
                @slot('title', 'Barang Paling Sedikit Dipesan')

                @if (count($barangSedikitDipesan) > 0)
                    <ul>
                    @foreach ($barangSedikitDipesan as $item)
                        <li>{{ $item['barang']['nama_barang'] .' - '. $item['total'] .'x' }}</li>
                    @endforeach
                    </ul>
                @else
                <p>Belum ada data masuk.</p>
                @endif
            @endcomponent
        </div>

        <div class="col-6">
            @component('components.card')
                @slot('title', 'Barang Paling Jarang Dipesan')

                @if (count($barangJarangDipesan) > 0)
                    <ul>
                    @foreach ($barangJarangDipesan as $item)
                        <li>{{ $item['barang']['nama_barang'] .' - '. $item['total'] .'x' }}</li>
                    @endforeach
                    </ul>
                @else
                <p>Belum ada data masuk.</p>
                @endif
            @endcomponent
        </div>
    </div>
</div>
@endsection