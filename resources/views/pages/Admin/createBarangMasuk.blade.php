@extends('layouts.app')

@section('page-title', 'Barang Masuk')
@section('custom-css')
    <link href="{{ asset('css/vendor/magnific-popup.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Tambah Barang Masuk')

        @component('components/form')
            @slot('action', route('barangMasuk.store'))
            @slot('method', 'POST')

            @component('components/field')
                @slot('label', 'Kode Barang Masuk')
                @slot('class', 'col-6')
                @slot('attribute', [
                    'type' => 'text',
                    'value' => App\BarangMasuk::nextID(),
                    'disabled' => 'disabled'
                ])
            @endcomponent

            <div class="col-6">
                <a href="#barangWrapper" class="float-right open-popup-link">Cari Barang</a>
            </div>

            <div class="table-responsive">
                <table id="dataTableBarang" class="table">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>

            @slot('button', 'Simpan')
        @endcomponent
    @endcomponent
</div>

<div id="barangWrapper" class="white-popup mfp-hide">
    @component('components.card')
        @slot('title', 'Data Barang')
        
        <div class="table-responsive">
            <table class="table dataTableDef">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($barang) > 0)
                        @foreach($barang as $b)
                        <tr>
                            <td>{{ $b['kode_barang'] }}</td>
                            <td>{{ $b['nama_barang'] }}</td>
                            <td>{{ $b['stok'] }}</td>
                            <td>
                                <a 
                                    href="#"
                                    class="addGoodsButton btn btn-primary waves-effect waves-dark"
                                    data-name="{{ $b['nama_barang'] }}"
                                    data-stok="{{ $b['stok'] }}"
                                    data-kode="{{ $b['kode_barang'] }}"
                                    data-satuan="{{ $b['satuan'] }}"
                                >Tambah</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    @endcomponent
</div>
@endsection

@section('custom-scripts')
<script src="{{ asset('js/vendor/magnific-popup.min.js') }}"></script>
<script type="text/javascript">
    jQuery('.dataTables_length').css('display', 'none')
    jQuery('.dataTables_info').css('display', 'none')

    // magnific popup
    jQuery('.open-popup-link').magnificPopup({
        type:'inline',
        midClick: true
    });

    // datatable
    var t = jQuery('#dataTableBarang').DataTable({
        fnCreatedRow: function( row, data, index ) {
            jQuery(row).attr('data-index', index)
            jQuery(row).find('a.removeButton').attr('onClick', `removeBarang(${index})`)
        }
    });
    jQuery('.addGoodsButton').on('click', function() {
        var kode_barang = jQuery(this).attr('data-kode')

        t.row.add([
            `${kode_barang} <input type="hidden" name="kode_barang[]" value="${kode_barang}" />`,
            jQuery(this).attr('data-name'),
            '<input type="number" name="qty[]" class="form-control" value="0" />',
            jQuery(this).attr('data-satuan'),
            '<a href="#" class="removeButton">Hapus</a>'
        ]).draw(false)
    })
    
    // remove selected barang
    function removeBarang(idx) {
        jQuery(`tr[data-index='${idx}']`).remove()
    }
</script>
@endsection