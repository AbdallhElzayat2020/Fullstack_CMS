<!DOCTYPE html>
<html lang="">

@include('frontend.layouts.head')
<body>
{{--Global Variables--}}
@php
    $socialLinks = \App\Models\FooterSocial::where('status', 'active')->get();

    $footerInfo = \App\Models\AdminFooterInfo::where('language', \App\Helpers\getLanguage())->first();

    $footerGridOne= \App\Models\FooterGrid::where([
        'status'=>'active',
         'language'=> \App\Helpers\getLanguage()
    ])->get();

    $footerGridTwo= \App\Models\FooterGridTwo::where([
        'status'=>'active',
         'language'=> \App\Helpers\getLanguage()
    ])->get();

     $footerGridThree= \App\Models\FooterGridThree::where([
        'status'=>'active',
         'language'=> \App\Helpers\getLanguage()
    ])->get();

@endphp
    <!-- Header news -->
@include('frontend.layouts.header')
<!-- End Header news -->

@yield('content')

<!--Footer Section -->
@include('frontend.layouts.footer')
<!--Footer Section -->

<!--scripts -->

@include('frontend.layouts.scripts')
<!--scripts -->

</body>

</html>
