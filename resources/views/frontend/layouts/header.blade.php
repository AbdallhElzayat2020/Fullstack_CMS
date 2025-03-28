@php
    $languages = \App\Models\Language::where('status', 'active')->get();
@endphp

<header class="bg-light">
    <!-- Navbar  Top-->
    <div class="topbar d-none d-sm-block">
        <div class="container ">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <div class="topbar-left topbar-right d-flex">

                        <ul class="topbar-sosmed p-0">
                            @foreach($socialLinks as $link)

                                <li>
                                    <a href="{{$link->url}}"><i class="{{$link->icon}}"></i></a>
                                </li>
                            @endforeach

                        </ul>
                        <div class="topbar-text">
                            Friday, May 19, 2023
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="list-unstyled topbar-right d-flex align-items-center justify-content-end">
                        <div class="topbar_language">
                            <select id="site-language">
                                @foreach ($languages as $language)
                                    <option
                                        value="{{ $language->lang }}" {{\App\Helpers\getLanguage() === $language->lang ? 'selected' : ''}}>
                                        {{ $language->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <ul class="topbar-link">
                            @if(!auth()->check())
                                <li><a href="{{ route('login') }}">{{__('Login')}}</a></li>
                                <li><a href="{{ route('register') }}">{{__('Register')}}</a></li>
                            @else
                                <form id="logout" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li>
                                        <a class="btn btn-danger btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                            {{__('Logout')}}
                                        </a>
                                    </li>
                                </form>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Top  -->

    <!-- Navbar  -->
    <!-- Navbar menu  -->
    <div class="navigation-wrap navigation-shadow bg-white">
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
            <div class="container">
                <div class="offcanvas-header">
                    <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
                <figure class="mb-0 mx-auto">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($setting['site_logo']) }}" alt="{{$setting['site_name']}}"
                             class="img-fluid logo">
                    </a>
                </figure>

                <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">{{__('home')}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('about') }}"> {{__('about')}} </a>
                        </li>
                        <li class="nav-item dropdown has-megamenu">
                            <a class="nav-link" href="{{ route('news') }}">{{__('News')}} </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Pages </a>
                            <ul class="dropdown-menu animate fade-up">
                                <li><a class="dropdown-item icon-arrow" href="blog_details.html"> Blog single detail
                                    </a></li>
                                <li><a class="dropdown-item" href="404.html"> 404 Error </a>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"> {{__('contact')}} </a></li>
                    </ul>


                    <!-- Search bar.// -->
                    <ul class="navbar-nav ">
                        <li class="nav-item search hidden-xs hidden-sm "><a class="nav-link" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="{{ route('news') }}" method="get">
                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input name="search"
                                                   class="form-control border-secondary border-right-0 rounded-0"
                                                   type="search" value="" placeholder="Search "
                                                   id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <button
                                                class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>
    </div>
    <!-- End Navbar menu  -->


    <!-- Navbar sidebar menu  -->
    <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="widget__form-search-bar  ">
                        <div class="row no-gutters">
                            <div class="col">
                                <input class="form-control border-secondary border-right-0 rounded-0" value=""
                                       placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="list-group list-group-flush">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" href="{{ route('home') }}"> {{__('Home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('about') }}"> {{__('About')}} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('news') }}">{{__('Blog')}} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active dropdown-toggle  text-dark" href="#"
                                   data-toggle="dropdown">Pages </a>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a class="dropdown-item" href="#"> 404 Error</a></li>

                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link  text-dark" href="{{ route('contact') }}"> {{__('Contact')}} </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                <div class="modal-footer">
                    <p>© 2025 <a href="http://abdallh-elzayat.me/">Abdallh Elzayat</a>
                        -&amp;
                        Developed by <a class="text-primary" href="http://abdallh-elzayat.me/">Abdallh Elzayat</a></p>
                </div>
            </div>
        </div>
    </div>
</header>
