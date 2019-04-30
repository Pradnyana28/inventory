<?php

namespace App\DataTables;

use App\DetailBarangMasuk;
use Yajra\DataTables\Services\DataTable;

class LaporanBarangMasukDataTable extends DataTable
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
        return DetailBarangMasuk::with('barang')->whereBetween('created_at', [$this->start, $this->end])->get();
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
                    ->parameters([
                        'dom' => 'Bfrtip',
                        'buttons' => ['csv', 'excel']
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'created_at',
            'kode_barang',
            'barang.nama_barang',
            'jumlah'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LaporanBarangMasuk_' . date('YmdHis');
    }
}
