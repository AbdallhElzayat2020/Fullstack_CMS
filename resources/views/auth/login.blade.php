@extends('frontend.layouts.master')
@section('title', __('Login'))

@section('content')

    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{_('Sign in')}}</h4>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" name="email" placeholder="email" value="{{old('email')}}" required autofocus type="email">
                                    @error('email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Password" type="password">
                                    @error('password')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('password.request') }}" class="float-right">{{__('Forgot password?')}}</a>
                                    <label class="float-left custom-control custom-checkbox">
                                        <input name="remember" type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">{{__('Remember')}}</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">{{__('Login')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <p class="text-center mt-4 mb-0">{{__('Don\'t have account?')}} <a href="{{ route('register') }}">{{__('Sign up')}}</a></p>
                </div>
            </div>
        </div>
    </section>

@endsection
