<?php

namespace App\Support\DataTables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

abstract class BaseDataTable extends DataTable
{
    /**
     * The default builder for the datatable
     */
    protected function getBuilderParameters(): array
    {
        return [
            'dom' => 'Bfrtip',
            'buttons' => ['excel', 'csv', 'pdf', 'print', 'reset', 'reload'],
            'responsive' => true,
            'orderCellsTop' => true,
            'fixedHeader' => true,
            'stateSave' => true,
            'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
            'pageLength' => 25,
            'language' => [
                'search' => '',
                'searchPlaceholder' => 'Search...',
                'lengthMenu' => '_MENU_ records per page',
                'info' => 'Showing _START_ to _END_ of _TOTAL_ records',
                'infoEmpty' => 'Showing 0 to 0 of 0 records',
                'emptyTable' => 'No records available',
            ],
        ];
    }

    /**
     * Apply the search and filtering
     */
    protected function applyFilters(Builder $query): Builder
    {
        return $query;
    }

    /**
     * Get the base query for the datatable
     */
    abstract protected function getQuery(): Builder;

    /**
     * Configure the datatable columns
     */
    abstract protected function getColumns(): array;

    /**
     * Apply any additional customizations to the datatable
     */
    protected function customizeDataTable($dataTable)
    {
        return $dataTable;
    }

    /**
     * Process datatables ajax request.
     */
    public function ajax(): JsonResponse
    {
        $query = $this->getQuery();
        $query = $this->applyFilters($query);

        $dataTable = DataTables::of($query);

        // Add default row index column
        $dataTable->addIndexColumn();

        // Apply any class-specific customizations
        $dataTable = $this->customizeDataTable($dataTable);

        // Add action buttons if implemented
        if (method_exists($this, 'getActions')) {
            $dataTable->addColumn('actions', function ($row) {
                return $this->getActions($row);
            });
        }

        // Add status column with formatting if implemented
        if (method_exists($this, 'getStatus')) {
            $dataTable->addColumn('status_formatted', function ($row) {
                return $this->getStatus($row);
            });
        }

        // Format date columns
        foreach ($this->getDateColumns() as $dateColumn) {
            $dataTable->editColumn($dateColumn, function ($row) use ($dateColumn) {
                return $row->{$dateColumn} ? $row->{$dateColumn}->format('Y-m-d H:i') : '';
            });
        }

        // Raw HTML columns that need to be rendered
        foreach ($this->getRawColumns() as $rawColumn) {
            $dataTable->rawColumns([$rawColumn]);
        }

        return $dataTable->make(true);
    }

    /**
     * Optional method to specify which columns contain dates
     */
    protected function getDateColumns(): array
    {
        return ['created_at', 'updated_at'];
    }

    /**
     * Optional method to specify which columns contain raw HTML
     */
    protected function getRawColumns(): array
    {
        return ['actions', 'status_formatted'];
    }

    /**
     * Generate an HTML button with appropriate permissions check
     */
    protected function createButton(string $route, string $icon, string $label, string $class, ?string $permission = null): string
    {
        if ($permission && !Gate::allows($permission)) {
            return '';
        }

        return '<a href="' . $route . '" class="btn btn-sm ' . $class . '" data-toggle="tooltip" title="' . $label . '">
                <i class="' . $icon . '"></i> ' . $label . '
            </a>';
    }

    /**
     * Generate a view button
     */
    protected function viewButton(string $route, $model = null, string $permission = 'view'): string
    {
        $routePath = $model ? route($route, $model) : $route;
        return $this->createButton($routePath, 'fa fa-eye', 'View', 'btn-info', $permission);
    }

    /**
     * Generate an edit button
     */
    protected function editButton(string $route, $model = null, string $permission = 'edit'): string
    {
        $routePath = $model ? route($route, $model) : $route;
        return $this->createButton($routePath, 'fa fa-edit', 'Edit', 'btn-primary', $permission);
    }

    /**
     * Generate a delete button
     */
    protected function deleteButton(string $route, $model = null, string $permission = 'delete'): string
    {
        $routePath = $model ? route($route, $model) : $route;
        $modelId = $model ? $model->id : '';
        $modelName = class_basename($model);

        if ($permission && !Gate::allows($permission)) {
            return '';
        }

        return '<button type="button" class="btn btn-sm btn-danger delete-record" 
                    data-route="' . $routePath . '" 
                    data-id="' . $modelId . '"
                    data-name="' . $modelName . '"
                    data-toggle="tooltip" 
                    title="Delete">
                    <i class="fa fa-trash"></i> Delete
                </button>';
    }
}
