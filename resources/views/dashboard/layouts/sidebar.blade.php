<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{__('CMS System')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{__('Dashboard')}}</li>
            {{--            @if(\App\Helpers\canAccess(['dashboard show']) )--}}
            <li class="{{\App\Helpers\setSidebarActive(['admin.dashboard'])}}">
                <a class="nav-link " href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                    <span>{{__('Dashboard')}}</span>
                </a>
            </li>
            {{--            @endif--}}

            <li class="menu-header">{{__('Startket')}}</li>

            @if(\App\Helpers\canAccess(['category show','category create','category edit','category delete']) )

                <li class="{{\App\Helpers\setSidebarActive(['admin.categories.*'])}}">
                    <a class="nav-link" href="{{ route('admin.categories.index') }}"><i class="far fa-square"></i>
                        <span>{{__('Categories')}}</span>
                    </a>
                </li>

            @endif

            @if(\App\Helpers\canAccess(['show news']) )
                <li class="dropdown {{\App\Helpers\setSidebarActive(['admin.news.*'])}} ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>{{__('News')}}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{\App\Helpers\setSidebarActive(['admin.news.*'])}}">
                            <a class="nav-link " href="{{ route('admin.news.index') }}">{{__('All News')}}</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(\App\Helpers\canAccess(['show about page','show contact page']) )

                <li class="dropdown {{\App\Helpers\setSidebarActive(['admin.about.*','admin.contact.*'])}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                        <span>{{__('Pages')}}</span>
                    </a>

                    <ul class="dropdown-menu">
                        @if(\App\Helpers\canAccess(['show about page']) )

                            <li class="{{\App\Helpers\setSidebarActive(['admin.about.*'])}}">
                                <a class="nav-link" href="{{ route('admin.about.index') }}">
                                    {{__('About Page')}}
                                </a>
                            </li>

                        @endif

                        @if(\App\Helpers\canAccess(['show contact page']) )

                            <li class="{{\App\Helpers\setSidebarActive(['admin.contact.*'])}}">
                                <a class="nav-link" href="{{ route('admin.contact.index') }}">
                                    {{__('Contact Page')}}
                                </a>
                            </li>

                        @endif
                    </ul>
                </li>

            @endif

            @if(\App\Helpers\canAccess(['show home section setting']) )
                <li class="{{\App\Helpers\setSidebarActive(['admin.home-section-setting.*'])}}">
                    <a class="nav-link" href="{{ route('admin.home-section-setting.index') }}"><i
                            class="far fa-square"></i>
                        <span>{{__('Home Section Setting')}}</span>
                    </a>
                </li>
            @endif


            @if(\App\Helpers\canAccess(['show ads']) )
                <li class="{{\App\Helpers\setSidebarActive(['admin.ads.*'])}}">
                    <a class="nav-link" href="{{ route('admin.ads.index') }}"><i class="far fa-square"></i>
                        <span>{{__('Advertisement')}}</span>
                    </a>
                </li>
            @endif

            @if(\App\Helpers\canAccess(['show social count']) )
                <li class="{{\App\Helpers\setSidebarActive(['admin.social-count.*'])}}">
                    <a class="nav-link" href="{{ route('admin.social-count.index') }}"><i class="far fa-square"></i>
                        <span>{{__('Social Count')}}</span>
                    </a>
                </li>
            @endif

            @if(\App\Helpers\canAccess(['show contact message']) )

                <li class="{{\App\Helpers\setSidebarActive(['admin.contact-message.*'])}}">
                    <a class="nav-link" href="{{ route('admin.contact-message.index') }}"><i class="far fa-square"></i>
                        <span>{{__('Contact Messages ')}}</span>
                        @if($unReadMessages > 0)
                            <i class="badge bg-danger text-white mx-1">{{$unReadMessages}}</i>
                        @endif
                    </a>
                </li>
            @endif

            @if(\App\Helpers\canAccess(['show languages']) )
                <li class="{{\App\Helpers\setSidebarActive(['admin.language.*'])}}">
                    <a class="nav-link" href="{{ route('admin.language.index') }}"><i class="far fa-square"></i>
                        <span>{{_('Languages')}}</span>
                    </a>
                </li>
            @endif

            @if(\App\Helpers\canAccess(['show subscribers']) )
                <li class="{{\App\Helpers\setSidebarActive(['admin.subscribers.*'])}}">
                    <a class="nav-link" href="{{ route('admin.subscribers.index') }}"><i class="far fa-square"></i>
                        <span>{{__('Subscribers')}}</span>
                    </a>
                </li>
            @endif


            @if(\App\Helpers\canAccess(['footer show']) )
                <li class="dropdown {{\App\Helpers\setSidebarActive([
            'admin.social-link.*',
            'admin.footer-info.*',
            'admin.footer-grid-one.*',
            'admin.footer-grid-two.*',
            'admin.footer-grid-three.*'
             ])}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                        <span>{{__('Footer Setting')}}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="{{\App\Helpers\setSidebarActive(['admin.social-link.*'])}}">
                            <a class="nav-link" href="{{ route('admin.social-link.index') }}">
                                {{__('Social Links')}}
                            </a>
                        </li>

                        <li class="{{\App\Helpers\setSidebarActive(['admin.footer-info.*'])}}">
                            <a class="nav-link" href="{{ route('admin.footer-info.index') }}">
                                {{__('Footer Info')}}
                            </a>
                        </li>
                        <li class="{{\App\Helpers\setSidebarActive(['admin.footer-grid-one.*'])}}">
                            <a class="nav-link"
                               href="{{ route('admin.footer-grid-one.index') }}">
                                {{__('Footer Grid One')}}
                            </a>
                        </li>
                        <li class="{{\App\Helpers\setSidebarActive(['admin.footer-grid-two.*'])}}">
                            <a class="nav-link"
                               href="{{ route('admin.footer-grid-two.index') }}">{{__('Footer Grid Two')}}
                            </a>
                        </li>
                        <li class="{{\App\Helpers\setSidebarActive(['admin.footer-grid-three.*'])}}">
                            <a class="nav-link"
                               href="{{ route('admin.footer-grid-three.index') }}">{{__('Footer Grid Three')}}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(\App\Helpers\canAccess(['access management show']) )

                <li class="dropdown {{\App\Helpers\setSidebarActive(['admin.role.*'])}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                        <span>{{__('Access Management')}}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="{{\App\Helpers\setSidebarActive(['admin.role.*'])}}">
                            <a class="nav-link"
                               href="{{ route('admin.role.index') }}">{{__('Roles and Permission')}}
                            </a>
                        </li>
                        <li class="{{\App\Helpers\setSidebarActive(['admin.role-users.*'])}}">
                            <a class="nav-link"
                               href="{{ route('admin.role-users.index') }}">{{__('Role Users')}}
                            </a>
                        </li>
                    </ul>
                </li>
                
            @endif

            @if(\App\Helpers\canAccess(['show setting']) )

                <li class="{{\App\Helpers\setSidebarActive(['admin.settings.*'])}}">
                    <a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="far fa-square"></i>
                        <span>{{__('Settings')}}</span>
                    </a>
                </li>
            @endif


        </ul>
    </aside>
</div>
