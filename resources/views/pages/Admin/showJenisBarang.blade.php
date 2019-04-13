@extends('layouts.app')
@section('page-title', 'Merk')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Data Jenis Barang')
        @slot('button', ['link' => route('jenisBarang.create'), 'text' => 'Tambah Jenis Barang'])

        <div class="table-responsive mt-4">
            <table class="table dTmerks">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Jenis Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    @endcomponent
</div>
@endsection

@section('custom-scripts')
<script type="text/javascript">
    $('.dTmerks').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route(Route::currentRouteName()) }}/data',
        columns: [
            { data: 'kode_jenis_barang' },
            { data: 'nama_jenis_barang' },
            { data: 'action' }
        ]
    });
</script>
@endsection