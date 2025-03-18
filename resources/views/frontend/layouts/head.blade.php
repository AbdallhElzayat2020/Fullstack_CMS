<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title') @yield('title') @else {{ $setting['site_seo_title'] }} @endif
    </title>


    <meta name="description"
          content="@hasSection('meta_description')  @yield('meta_description') @else {{ $setting['site_seo_description'] }}  @endif ">

    <meta name="keywords" content="{{$setting['site_seo_keywords']}}">

    <meta name="og:title" content="@yield('meta_og_title')">

    <meta name="og:description" content="@yield('meta_og_description')">

{{--    <meta name="og:image" content="@hasSection('meta_og_image') @yield('meta_og_image') @else {{$setting[asset('site_logo')]}} @endif">--}}

    <meta name="twitter:title" content="@yield('meta_tw_title')">

    <meta name="twitter:description" content="@yield('meta_tw_description')">

    <meta name="twitter:image" content="@yield('meta_tw_image')">

    <link rel="icon" type="image/png" href="{{asset($setting['site_favicon'])}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/dashboard/modules/fontawesome/css/all.min.css') }}">

    <link href="{{ asset('assets/frontend/css/styles.css') }}" rel="stylesheet">

    <style>
        :root {
            --colorPrimary: {{$setting['site_color']}};
        }
    </style>

</head>
