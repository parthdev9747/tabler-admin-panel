<?php

namespace App\DataTables;

use App\Models\GlassCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class GlassCategoriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $editBtn = '';
                $deleteBtn = '';
                if (auth()->user()->can('edit-glass-category')) {
                    $editBtn = '<a href="' . route('glass-category.edit', $row->id) . '" class="btn btn-blue btn-icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" /><path d="M16 5l3 3" /><path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" /></svg></a>';
                }
                if (auth()->user()->can('delete-glass-category')) {
                    $deleteBtn = '<button class="btn btn-red btn-icon" title="Delete" onclick="deleteRecord(' . $row->id . ')"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></button>';
                }
                return $editBtn . ' ' . $deleteBtn;
            })
            ->addColumn('parent', function ($row) {
                return $row->parent ? $row->parent->name : 'None';
            })
            ->addColumn('status', function ($row) {
                $statusClass = $row->status == 'active' ? 'checked' : '';
                return '<label class="form-check form-check-single form-switch">
						<input class="form-check-input" onclick="updateStatus(' . $row->id . ')" type="checkbox" ' . $statusClass . '>
					</label>';
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\GlassCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(GlassCategory $model): QueryBuilder
    {
        return $model->newQuery()->with('parent');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('glass-categories-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->pageLength(10)
            ->addTableClass('table table-bordered')
            ->language([
                'lengthMenu' => 'Show _MENU_ entries'
            ])
            ->parameters([
                'debug' => true
            ])
            ->buttons([]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false),
            Column::make('name'),
            Column::make('parent'),
            Column::make('sequence'),
            Column::make('status')->addClass('text-center')->width(80),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'GlassCategories_' . date('YmdHis');
    }
}
