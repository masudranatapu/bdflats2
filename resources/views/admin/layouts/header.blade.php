<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('web.home') }}" target="_blank" class="nav-link">
                <i class="fas fa-globe fa-2"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('cc') }}" class="nav-link">
                <i class="fas fa-broom"></i>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span class="image">
                    <img src="{{ getProfile(Auth::user()->profile_image) }}" alt="{{ auth::user()->name }}"
                        class="img-circle elevation-2" width="30">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item">{{ __('Profile & account') }}</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout')
                    }}</a>
                <form class="logout" id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
