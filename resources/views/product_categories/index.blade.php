@extends('layouts.app')

@section('page-title', $module_name)

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $module_name }} {{ __('messages.list') }}</h3>
                <div class="card-actions">
                    @canany('add-product-category')
                        <a href="{{ route('product-category.create') }}" class="btn btn-primary btn-3">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-2">
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            {{ __('messages.add_new') }}
                        </a>
                    @endcan
                </div>
            </div>

            <div class="card-body">
                <!-- Filters -->
                <div class="mb-4">
                    <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        function deleteRecord(id) {
            let url = '{{ $module_route }}/' + id;
            deleteRecordByAjax(url, "{{ $module_name }}", 'product-categories-table');
        }

        function updateStatus(id) {
            let url = '{{ $module_route }}/change-status';
            changeStatusByAjax(url, 'product-categories-table', id);
        }
    </script>
@endpush
