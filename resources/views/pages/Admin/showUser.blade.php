@extends('layouts.app')
@section('page-title', 'Users')

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Data Users')
        @slot('button', ['link' => route('users.create'), 'text' => 'Tambah User'])

        <div class="table-responsive mt-4">
            <table class="table dTuser">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Nama User</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
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
    $('.dTuser').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route(Route::currentRouteName()) }}/data',
        columns: [
            { data: 'user_id' },
            { data: 'nama_user' },
            { data: 'jabatan' },
            { data: 'departemen' },
            { data: 'action' }
        ]
    });
</script>
@endsection