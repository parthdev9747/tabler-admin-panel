@push('css')
    <style>
        .permissions-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }

        .permissions-group {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
    </style>
@endpush

<div class="card-body">
    <div class="row row-cards">
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.role') }} {{ __('messages.name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.role') }} {{ __('messages.name') }}"
                    value="{{ isset($result) ? $result['name'] : old('name') }}" name="name" required>
                @error('name')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="mb-4">
        <label class="form-label">{{ __('messages.role') }} {{ __('messages.permission') }}</label>
        <div class="card border-0 shadow-none">
            <div class="table-responsive">
                <table
                    class="table table-vcenter table-responsive-sm table-responsive-md table-responsive-lg table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('messages.permission') }}</th>
                            <th>{{ __('messages.access_rights') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ __('messages.administrator_access') }}
                                <span class="ms-1" data-bs-toggle="tooltip"
                                    title="Allows a full access to the system">
                                </span>
                            </td>
                            <td>
                                <label class="form-check">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                    <span class="form-check-label">{{ __('messages.select_all') }}</span>
                                </label>
                            </td>
                        </tr>

                        @if (count($groupedPermissions) > 0)
                            @foreach ($groupedPermissions as $index => $permission)
                                <tr>
                                    <td>{{ ucfirst($index) }}</td>
                                    <td>

                                        <div class="permissions-grid">
                                            <div class="permissions-group">
                                                @if (count($permission) > 0)
                                                    @foreach ($permission as $singlePermission)
                                                        <label class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="permission[{{ $singlePermission->id }}]"
                                                                value="{{ $singlePermission->id }}"
                                                                {{ isset($rolePermissions) && in_array($singlePermission->id, $rolePermissions) ? 'checked' : '' }}>
                                                            <span
                                                                class="form-check-label">{{ ucfirst($singlePermission->name) }}</span>
                                                        </label>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                @error('permission')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.getElementById('select-all').addEventListener('change', function(e) {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#select-all)');
            checkboxes.forEach(checkbox => {
                checkbox.checked = e.target.checked;
            });
        });
    </script>
@endpush
