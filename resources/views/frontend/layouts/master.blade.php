<!DOCTYPE html>
<html lang="">

@include('frontend.layouts.head')
<body>

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
