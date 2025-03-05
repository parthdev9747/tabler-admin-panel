<div class="card-body">
    <div class="row row-cards">
        <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label class="form-label">{{ __('messages.permission') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.permission') }}"
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
                <label class="form-label">{{ __('messages.group_name') }}</label>
                <input type="text" class="form-control @error('group_name') is-invalid @enderror"
                    placeholder="{{ __('messages.enter') }} {{ __('messages.group_name') }}"
                    value="{{ isset($result) ? $result['group_name'] : old('group_name') }}" name="group_name" required>
                @error('group_name')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
