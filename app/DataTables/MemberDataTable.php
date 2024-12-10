<?php

namespace App\DataTables;

use App\Models\Member;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MemberDataTable extends DataTable
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

        return $dataTable
            ->addColumn('group_name', function ($row) {
                return $row->group_name ?? 'N/A';
            })
            ->addColumn('action', 'members.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Member $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Member $model)
    {
        // Join with groups table and select relevant columns
        return $model->newQuery()
            ->leftJoin('users', 'members.id', '=', 'users.member_id')
            ->leftJoin('groups', 'users.group_id', '=', 'groups.id')
            ->leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
            ->select([
                'members.*', // Select all member columns
                'groups.name as group_name', // Include the group name
                'multi_branchs.branch_name'

            ]);
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
            ->minifiedAjax(url('members'))
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner'],
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
            'member_unique_id' => ['title' => 'Member ID'],
            'mem_name' => ['title' => 'Name'],
            'branch_name' => ['title' => 'Branch'],
            'group_name' => ['title' => 'Role'],
            'mem_father' => ['title' => 'Father Name'],
            'mem_address'  => ['title' => 'Address'],
            'mem_cell'     => ['title' => 'Contact'],
            'mem_email'     => ['title' => 'Email'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'members_' . time();
    }
}
