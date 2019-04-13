@extends('layouts.app')
@section('page-title', 'Merk')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Data Merk')
        @slot('button', ['link' => route('merk.create'), 'text' => 'Tambah Merk'])

        <div class="table-responsive mt-4">
            <table class="table dTmerks">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Merk</th>
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
            { data: 'kode_merk' },
            { data: 'nama_merk' },
            { data: 'action' }
        ]
    });
</script>
@endsection