<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container container-tight min-vh-100 d-flex flex-column justify-content-center py-4">
        <div class="text-center mb-4">
            <a href="{{ route('login') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset('img/logo/visionvibe.png') }}" />
            </a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">{{ __('messages.login_title') }}</h2>
                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.email') }}</label>
                        <input type="email" class="form-control" placeholder="your@email.com" name="email"
                            :value="old('email')" required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            {{ __('messages.password') }}
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" placeholder="Your password" name="password"
                                required autocomplete="current-password">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path
                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" />
                            <span class="form-check-label">{{ __('messages.remember_me') }}</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">{{ __('messages.login') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
