<?php

namespace App\DataTables;

use App\Models\Healthmetrics;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Database\Eloquent\Builder;

class HealthmetricsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        // Add a custom 'action' column (or modify as needed)
        return $dataTable->addColumn('action', 'healthmetrics.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Healthmetrics $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Healthmetrics $model): Builder
    {
        // Join the members table to access `mem_name`
        return $model->newQuery()
            ->join('members', 'healthmetricss.member_id', '=', 'members.id') // Join with members table
            ->select(
                'healthmetricss.*', // Select all healthmetrics columns
                'members.mem_name' // Select the member's name
            );
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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            'id',
            'member_name' => ['name' => 'members.mem_name', 'data' => 'mem_name', 'title' => 'Member Name'], // Use `mem_name`
            'measurement_date',
            'weight',
            'height',
            'bmi',
            'body_fat_percentage',
            'muscle_mass',
            'hydration_level',
            // 'created_at' => ['searchable' => false],
            // 'updated_at' => ['searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() : string
    {
        return 'healthmetrics_datatable_' . time();
    }
}
