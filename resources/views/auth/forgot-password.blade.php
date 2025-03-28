@extends('frontend.layouts.master')
@section('title', __('Forget Password'))

@section('content')

    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto py-4" style="max-width: 380px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{__('Forget Password')}}</h4>

                            {{--check session for alert--}}
                            <x-auth-session-status class="mb-4 text-success" :status="session('status')"/>

                            <form action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="email" value="{{old('email')}}" required autofocus>
                                    @error('email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">{{__('Reset Link')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <p class="text-center mt-4 mb-0">{{__('Login to you Account')}} <a class="text-primary" href="{{ route('login') }}">{{__('Login in')}}</a></p>

                </div>
            </div>
        </div>
    </section>

@endsection

