<div class="card-body">
    <div class="row row-cards">
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.name') }}"
                    value="{{ isset($result) ? $result['name'] : old('name') }}" name="name" required>
                @error('name')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.email') }}"
                    value="{{ isset($result) ? $result['email'] : old('email') }}" name="email" required>
                @error('email')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.password') }}" value=""
                    name="password" {{ isset($result) ? '' : 'required' }}>
                @error('password')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.confirm_password') }}</label>
                <input type="password" class="form-control @error('confirm-password') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.confirm_password') }}" value=""
                    name="confirm-password" {{ isset($result) ? '' : 'required' }}>
                @error('confirm-password')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.role') }}</label>
                <select type="text" class="form-select" id="select-roles" value="" name="role" required>
                    <option value="">Select role</option>
                    @if (count($roles) > 0)
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                {{ ucfirst($label) }}</option>
                        @endforeach
                    @endif
                </select>
                @error('role')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

    </div>
</div>
@push('js')
    <script src="{{ asset('libs/tom-select/dist/js/tom-select.base.min.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('select-roles'), {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render: {
                    item: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
        });
    </script>
@endpush
