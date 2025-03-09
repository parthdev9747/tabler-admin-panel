<!-- Sidebar -->
<aside
    class="navbar navbar-vertical {{ session()->get('mode') === 'rtl' ? 'navbar-right' : '' }} navbar-expand-lg sidebar"
    data-bs-theme="dark" id="sidebar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('img/logo/visionvibe-dashboard.png') }}" />
            </a>
        </div>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item d-none d-lg-flex me-3">
                <div class="btn-list">
                    <a href="https://github.com/tabler/tabler" class="btn btn-5" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/brand-github -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-2">
                            <path
                                d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                        </svg>
                        Source code
                    </a>
                    <a href="https://github.com/sponsors/codecalm" class="btn btn-6" target="_blank" rel="noreferrer">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon text-pink icon-2">
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        Sponsor
                    </a>
                </div>
            </div>
            <div class="d-none d-lg-flex d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-1">
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-1">
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
            </div>
            <div class="nav-item dropdown moonicon">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                    aria-label="Select language">
                    <!-- Download SVG icon from http://tabler.io/icons/icon/language -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-1" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 5h7"></path>
                        <path d="M9 3v2c0 4.418 -2.239 8 -5 8"></path>
                        <path d="M5 9c0 2.144 2.952 3.908 6.7 4"></path>
                        <path d="M12 20l4 -9l4 9"></path>
                        <path d="M19.1 18h-6.2"></path>
                    </svg>
                    @php($languages = ['en' => 'En', 'fr' => 'Fr', 'ar' => 'Ar'])
                    <span>{{ $languages[Session::get('locale', config('app.locale'))] }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('language.switch', 'en') }}"
                            class="dropdown-item {{ Session::get('locale') === 'en' ? 'active' : '' }}">English</a>
                        <a href="{{ route('language.switch', 'ar') }}"
                            class="dropdown-item {{ Session::get('locale') === 'ar' ? 'active' : '' }}">Arabic</a>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url('https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random');"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="./profile.html" class="dropdown-item">Profile</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ isActiveRoute('dashboard') }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                            </svg>
                        </span>
                        <span class="nav-link-title"> {{ __('messages.home') }} </span>
                    </a>
                </li>
                @canany(['list-product-category', 'add-product-category', 'edit-product-category',
                    'delete-product-category', 'list-glass-category', 'add-glass-category', 'edit-glass-category',
                    'delete-glass-category', 'list-case-category', 'add-case-category', 'edit-case-category',
                    'delete-case-category'])
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ isActiveDropdown([
                            'product-category.index',
                            'product-category.create',
                            'product-category.edit',
                            'product-category.delete',
                            'glass-category.index',
                            'glass-category.create',
                            'glass-category.edit',
                            'glass-category.delete',
                            'case-category.index',
                            'case-category.create',
                            'case-category.edit',
                            'case-category.delete',
                        ]) }}"
                            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                            aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> {{ __('messages.categories') }}</span>
                        </a>
                        <div
                            class="dropdown-menu {{ isActiveDropdown([
                                'product-category.index',
                                'product-category.create',
                                'product-category.edit',
                                'product-category.delete',
                                'glass-category.index',
                                'glass-category.create',
                                'glass-category.edit',
                                'glass-category.delete',
                                'case-category.index',
                                'case-category.create',
                                'case-category.edit',
                                'case-category.delete',
                            ]) }}">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    @canany(['list-product-category', 'add-product-category', 'edit-product-category',
                                        'delete-product-category'])
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle {{ isActiveDropdown([
                                                'product-category.index',
                                                'product-category.create',
                                                'product-category.edit',
                                                'product-category.delete',
                                            ]) }}"
                                                href="#sidebar-authentication" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                {{ __('messages.product_category') }}
                                            </a>
                                            <div
                                                class="dropdown-menu {{ isActiveDropdown([
                                                    'product-category.index',
                                                    'product-category.create',
                                                    'product-category.edit',
                                                    'product-category.delete',
                                                ]) }}">
                                                @canany('list-product-category')
                                                    <a href="{{ route('product-category.index') }}"
                                                        class="dropdown-item {{ isActiveRoute(['product-category.index']) }}">
                                                        {{ __('messages.list') }}
                                                    </a>
                                                @endcan
                                                @canany('add-product-category')
                                                    <a href="{{ route('product-category.create') }}"
                                                        class="dropdown-item {{ isActiveRoute(['product-category.edit', 'product-category.create']) }}">
                                                        {{ __('messages.add') }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                                <div class="dropdown-menu-column">
                                    @canany(['list-glass-category', 'add-glass-category', 'edit-glass-category',
                                        'delete-glass-category'])
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle {{ isActiveDropdown([
                                                'glass-category.index',
                                                'glass-category.create',
                                                'glass-category.edit',
                                                'glass-category.delete',
                                            ]) }}"
                                                href="#sidebar-authentication" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                {{ __('messages.glass_category') }}
                                            </a>
                                            <div
                                                class="dropdown-menu {{ isActiveDropdown([
                                                    'glass-category.index',
                                                    'glass-category.create',
                                                    'glass-category.edit',
                                                    'glass-category.delete',
                                                ]) }}">
                                                @canany('list-glass-category')
                                                    <a href="{{ route('glass-category.index') }}"
                                                        class="dropdown-item {{ isActiveRoute(['glass-category.index']) }}">
                                                        {{ __('messages.list') }}
                                                    </a>
                                                @endcan
                                                @canany('add-glass-category')
                                                    <a href="{{ route('glass-category.create') }}"
                                                        class="dropdown-item {{ isActiveRoute(['glass-category.edit', 'glass-category.create']) }}">
                                                        {{ __('messages.add') }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                                <div class="dropdown-menu-column">
                                    @canany(['list-case-category', 'add-case-category', 'edit-case-category',
                                        'delete-case-category'])
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle {{ isActiveDropdown([
                                                'case-category.index',
                                                'case-category.create',
                                                'case-category.edit',
                                                'case-category.delete',
                                            ]) }}"
                                                href="#sidebar-authentication" data-bs-toggle="dropdown"
                                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                                {{ __('messages.case_category') }}
                                            </a>
                                            <div
                                                class="dropdown-menu {{ isActiveDropdown([
                                                    'case-category.index',
                                                    'case-category.create',
                                                    'case-category.edit',
                                                    'case-category.delete',
                                                ]) }}">
                                                @canany('list-case-category')
                                                    <a href="{{ route('case-category.index') }}"
                                                        class="dropdown-item {{ isActiveRoute(['case-category.index']) }}">
                                                        {{ __('messages.list') }}
                                                    </a>
                                                @endcan
                                                @canany('add-case-category')
                                                    <a href="{{ route('case-category.create') }}"
                                                        class="dropdown-item {{ isActiveRoute(['case-category.edit', 'case-category.create']) }}">
                                                        {{ __('messages.add') }}
                                                    </a>
                                                @endcan
                                            </div>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </li>
                @endcan
                @canany(['role-delete', 'role-list', 'role-create', 'role-edit', 'permission-list', 'permission-create',
                    'permission-edit', 'permission-delete', 'user.index', 'user-create', 'user-edit', 'user-list',
                    'user-delete'])
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ isActiveDropdown(['user.index', 'user.create', 'user.edit', 'role.index', 'role.create', 'role.edit', 'role.list']) }}"
                            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                            aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler.io/icons/icon/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                    <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                    <path d="M12 12l8 -4.5" />
                                    <path d="M12 12l0 9" />
                                    <path d="M12 12l-8 -4.5" />
                                    <path d="M16 5.25l-8 4.5" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> {{ __('messages.user') }}
                                {{ __('messages.management') }}</span>
                        </a>
                        <div
                            class="dropdown-menu {{ isActiveDropdown(['user.index', 'user.create', 'user.edit', 'role.index', 'role.create', 'role.edit']) }}">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    @canany(['user-delete', 'user-list', 'user-create', 'user-edit'])
                                        <a class="dropdown-item {{ isActiveRoute(['user.index', 'user.edit', 'user.create']) }}"
                                            href="{{ route('user.index') }}">
                                            {{ __('messages.user') }}
                                        </a>
                                    @endcan
                                    @canany(['role-delete', 'role-list', 'role-create', 'role-edit'])
                                        <a class="dropdown-item {{ isActiveRoute(['role.index', 'role.edit', 'role.create']) }}"
                                            href="{{ route('role.index') }}">
                                            {{ __('messages.role') }}
                                        </a>
                                    @endcan
                                    <div class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication"
                                            data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                                            aria-expanded="false">
                                            Authentication
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="./sign-in.html" class="dropdown-item">
                                                Sign in
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</aside>
