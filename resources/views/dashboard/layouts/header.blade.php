<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">


        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/dashboard/img/avatar/avatar-1.png') }}"
                     class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{__('Hi')}},
                    @auth('admin')
                        {{ Auth::guard('admin')->user()->name }}
                    @endauth
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @auth('admin')
                    <div class="dropdown-title">
                        {{ Auth::guard('admin')->user()->email }}
                    </div>
                @endauth
                <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{__('Profile')}}
                </a>

                <div class="dropdown-divider"></div>
                <form id="logout" action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <a onclick="event.preventDefault(); document.getElementById('logout').submit();"
                       href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> {{__('Logout')}}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
