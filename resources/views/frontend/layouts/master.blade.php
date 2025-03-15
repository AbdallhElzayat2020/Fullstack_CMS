<!DOCTYPE html>
<html lang="">

@include('frontend.layouts.head')
<body>
@php
    $socialLinks = \App\Models\FooterSocial::where('status', 'active')->get();
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
