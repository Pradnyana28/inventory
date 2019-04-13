@component('components.card')
<div class="table-responsive">
    <table class="table table-striped table-inverse dataTableDef">
        <thead class="thead-inverse">
            <tr>
                <th>Nama Barang</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        
        <tbody>
        @if (count($data['barang']) > 0)
            @foreach ($data['barang'] as $barang)
            <tr>
                <td scope="row">{{ $barang['nama_barang'] }}</td>
                <td>Jumlah stok kurang dari {{ $barang['minimum_stok'] .' '. $barang['satuan'] }}</td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
@endcomponent