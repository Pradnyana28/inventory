<?php

namespace App\DataTables;

use App\DetailBarangKeluar;
use Yajra\DataTables\Services\DataTable;

class LaporanBarangKeluarDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return DetailBarangKeluar::with('barang')
                     ->where('status', 'ya')
                     ->whereBetween('created_at', [$this->start, $this->end])->get();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'Tanggal' => ['name' => 'created_at', 'data' => 'created_at'],
            'kode_barang',
            'Nama Barang' => ['name' => 'barang.nama_barang', 'data' => 'barang.nama_barang'],
            'jumlah_disetujui'
        ];
    }

    protected function getBuilderParameters() {
        return [
            'dom' => 'Bfrtip',
            'order'   => [[0, 'asc']],
            'buttons' => []
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LaporanBarangKeluar_' . date('YmdHis');
    }
}
