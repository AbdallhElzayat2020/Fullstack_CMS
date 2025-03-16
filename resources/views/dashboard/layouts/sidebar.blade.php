<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">CMS System</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a class="nav-link " href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Startket</li>

            <li>
                <a class="nav-link" href="{{ route('admin.categories.index') }}"><i class="far fa-square"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>News</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.news.index') }}">All News</a></li>
                    <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.about.index') }}">About Page</a></li>
                    <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                </ul>
            </li>

            <li>
                <a class="nav-link" href="{{ route('admin.home-section-setting.index') }}"><i class="far fa-square"></i>
                    <span>Home Section Setting</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('admin.ads.index') }}"><i class="far fa-square"></i>
                    <span>Advertisement</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('admin.social-count.index') }}"><i class="far fa-square"></i>
                    <span>Social Count</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i>
                    <span>Languages</span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('admin.subscribers.index') }}"><i class="far fa-square"></i>
                    <span>Subscribers</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Footer Setting</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.social-link.index') }}">Social Links</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-grid-one.index') }}">Footer Grid One</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a>
                    </li>
                </ul>
            </li>


            {{--            <li><a class="nav-link" href=""><i class="far fa-square"></i> <span>Blank Page</span></a></li>--}}

            {{--            <li class="dropdown">--}}
            {{--                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>--}}
            {{--                <ul class="dropdown-menu">--}}
            {{--                    <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>--}}
            {{--                    <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>--}}
            {{--                    <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>--}}
            {{--                    <li><a class="nav-link" href="bootstrap-buttons.html">Buttons</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}

        </ul>
    </aside>
</div>
