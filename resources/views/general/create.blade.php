@extends('layouts.app')

@section('page-title', 'Permissions')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.create') }} {{ $module_name }}</h3>
                <div class="card-actions">
                    <a href="{{ $module_route }}" class="btn btn-primary btn-3">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-2">
                            <path d="M19 12H5" />
                            <path d="M12 19l-7-7 7-7" />
                        </svg>
                        {{ __('messages.back') }}
                    </a>
                </div>
            </div>
            <form method="post" action="{{ $module_route }}" enctype="multipart/form-data">
                @csrf
                @include($module_view . '._form')
                <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                        <button type="submit" class="btn btn-primary btn-2">
                            {{ __('messages.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
@endpush
