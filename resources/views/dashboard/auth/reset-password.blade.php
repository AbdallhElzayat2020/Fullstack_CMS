<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reset Password Admin</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('assets/dashboard/img/stisla-fill.svg') }}" alt="logo" width="100"
                             class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Reset Password Page Admin</h4>
                        </div>
                        <br>

                        <div class="card-body">
                            <form method="POST" action="{{route('admin.reset-password.send')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                           tabindex="1" required value="{{@request()->email}}">
                                    <input type="hidden" name="token" value="{{@request()->token}}">
                                    @error('email')
                                    <code class="text-danger">
                                        {{ $message }}
                                    </code>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password"
                                           tabindex="2" required>
                                    @error('password')
                                    <code class="text-danger">
                                        {{ $message }}
                                    </code>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password</label>
                                    <input id="password_confirmation" type="password" class="form-control"
                                           name="password_confirmation" tabindex="2" required>
                                    @error('password_confirmation')
                                    <code class="text-danger">
                                        {{ $message }}
                                    </code>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Abdallh Elzayat 2025
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/dashboard/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/popper.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('assets/dashboard/js/scripts.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom.js') }}"></script>
</body>

</html>
