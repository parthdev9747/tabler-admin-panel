<div class="card-body">
    <div class="row row-cards">
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.category_name') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.category_name') }}"
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
                <label class="form-label">{{ __('messages.parent_category') }}</label>
                <select class="form-select" id="select-parent" name="p_id">
                    <option value="">{{ __('messages.select') }} {{ __('messages.parent_category') }}</option>
                    @if (isset($categories) && count($categories) > 0)
                        @foreach ($categories as $category)
                            @if (!isset($result) || (isset($result) && $result['id'] != $category->id))
                                <option value="{{ $category->id }}"
                                    {{ isset($result) && $result['p_id'] == $category->id ? 'selected' : (old('p_id') == $category->id ? 'selected' : '') }}>
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    @endif
                </select>
                @error('p_id')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.sequence') }}</label>
                <input type="number" class="form-control @error('sequence') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.sequence') }}"
                    value="{{ isset($result) ? $result['sequence'] : old('sequence', 0) }}" name="sequence"
                    min="0">
                @error('sequence')
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
            window.TomSelect && (new TomSelect(el = document.getElementById('select-parent'), {
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
