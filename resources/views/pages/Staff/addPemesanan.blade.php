@extends('layouts.app')

@section('page-title', 'Tambah Pemesanan')
@section('custom-css')
    <link href="{{ asset('css/vendor/magnific-popup.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    @component('components.card')
        @slot('title', 'Pemesanan Barang')

        @component('components/form')
            @slot('action', route('pemesanan.store'))
            @slot('method', 'POST')

            @component('components/field')
                @slot('label', 'Kode Pemesanan')
                @slot('class', 'col-6')
                @slot('attribute', [
                    'type' => 'text',
                    'value' => App\Pemesanan::nextID(),
                    'disabled' => 'disabled'
                ])
            @endcomponent

            <div class="col-6">
                <a href="#barangWrapper" class="float-right open-popup-link">Cari Barang</a>
            </div>

            <div class="table-responsive">
                <table id="dataTableBarang" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody></tbody>
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
                                @if ($b['stok'] > 0)
                                <a 
                                    href="#"
                                    class="addGoodsButton btn btn-primary waves-effect waves-dark"
                                    data-name="{{ $b['nama_barang'] }}"
                                    data-stok="{{ $b['stok'] }}"
                                    data-kode="{{ $b['kode_barang'] }}"
                                    data-satuan="{{ $b['satuan'] }}"
                                    data-minimum="{{ $b['minimum_stok'] }}"
                                >Tambah</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="customForm row clearfix">
            <div class="col-12">Tambah Barang</div>
            <div class="col-3"><input type="text" id="changeDataKode" placeholder="{{ App\Barang::nextID() }}" /></div>
            <div class="col-3"><input type="text" id="changeDataName" placeholder="Nama Barang" /></div>
            <div class="col-2"><input type="number" id="changeDataStok" placeholder="Stok Barang" /></div>
            <div class="col-2"><input type="text" id="changeDataSatuan" placeholder="Satuan Barang" /></div>
            <div class="col-2">
                <a 
                    href="#"
                    id="customFormBtn"
                    class="addGoodsButton btn btn-primary waves-effect waves-dark"
                    data-name=""
                    data-stok=""
                    data-kode="{{ App\Barang::nextID() }}"
                    data-satuan="PCS"
                    data-minimum="10"
                >Tambah</a>
            </div>
        </div>
    @endcomponent
</div>
@endsection

@section('custom-scripts')
<script src="{{ asset('js/vendor/magnific-popup.min.js') }}"></script>
<script type="text/javascript">
    jQuery('.dataTables_length').css('display', 'none')
    jQuery('.dataTables_info').css('display', 'none')

    // custom form
    const customFormBtn = jQuery('#customFormBtn')
    jQuery('#changeDataKode').on('blur', function () { customFormBtn.attr('data-kode', jQuery(this).val()); })
    jQuery('#changeDataName').on('blur', function () { customFormBtn.attr('data-name', jQuery(this).val()); })
    jQuery('#changeDataStok').on('blur', function () { customFormBtn.attr('data-stok', jQuery(this).val()); })
    jQuery('#changeDataSatuan').on('blur', function () { customFormBtn.attr('data-satuan', jQuery(this).val()); })

    // magnific popup
    jQuery('.open-popup-link').magnificPopup({
        type:'inline',
        midClick: true
    });

    // datatable
    var t = jQuery('#dataTableBarang').DataTable({
        paging: false,
        searching: false,
        ordering: false,
        info: false,
        fnCreatedRow: function( row, data, index ) {
            jQuery(row).attr('data-index', index)
            jQuery(row).find('a.removeButton').attr('onClick', `removeBarang(${index})`)
        }
    });
    jQuery('.addGoodsButton').on('click', function() {
        const kode_barang = jQuery(this).attr('data-kode')
        const nama_barang = jQuery(this).attr('data-name')
        const stok_barang = jQuery(this).attr('data-stok')
        const satuan_barang = jQuery(this).attr('data-satuan')
        const minimum_stok = jQuery(this).attr('data-minimum')

        t.row.add([
            `${kode_barang} 
                <input type="hidden" name="kode_barang[]" value="${kode_barang}" />
                <input type="hidden" name="nama_barang[]" value="${nama_barang}" />
                <input type="hidden" name="stok_barang[]" value="${stok_barang}" />
                <input type="hidden" name="minimum_stok[]" value="${minimum_stok}" />
                <input type="hidden" name="satuan_barang[]" value="${satuan_barang}" />`,
            jQuery(this).attr('data-name'),
            '<input type="number" name="qty[]" max="'+ stok_barang +'" id="'+ kode_barang +'" onChange="maxInput(\''+ kode_barang +'\')" class="form-control" value="0" />',
            stok_barang,
            jQuery(this).attr('data-satuan'),
            '<a href="#" class="removeButton">Hapus</a>'
        ]).draw(false)
    })

    function maxInput(target) {
        const that = jQuery(`#${target}`)
        const val  = that.val()
        const max  = that.attr('max')
        if (parseInt(val) > parseInt(max)) {
            that.val(max)
        }
    }
    
    // remove selected barang
    function removeBarang(idx, row) {
        jQuery(`tr[data-index='${idx}']`).remove()
    }
</script>
@endsection