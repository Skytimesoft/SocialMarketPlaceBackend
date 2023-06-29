@php
    $user = auth()->user();
@endphp

<div class="d-header">
    <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{ Vite::asset('public/img/013m.jpg') }})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ $user->name }}</div>
                            <div class="mt-1 small text-muted">{{ $user->getRoleNames()->implode('|') }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ route('admin.profile') }}" class="dropdown-item">Profile</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">

                </div>
            </div>
        </div>
    </header>
</div>
