<?php

namespace App\DataTables;

use App\DetailBarangMasuk;
use Yajra\DataTables\Services\DataTable;

class LaporanBarangMasukDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables($query);
    }

    public function query()
    {
        return DetailBarangMasuk::with('barang')->whereBetween('created_at', [$this->start, $this->end])->get();
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }

    protected function getBuilderParameters()
    {
        return [
            'dom' => 'Bfrtip',
            'order'   => [[0, 'asc']],
            'buttons' => [],
        ];
    }

    protected function getColumns()
    {
        return [
            'created_at' => 'Tanggal',
            'kode_barang',
            'barang.nama_barang' => 'Nama Barang',
            'jumlah'
        ];
    }

    protected function filename()
    {
        return 'LaporanBarangMasuk_' . date('YmdHis');
    }
}
