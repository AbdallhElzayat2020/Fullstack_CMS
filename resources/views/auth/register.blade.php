@extends('frontend.layouts.master')
@section('title', __('Register'))

@section('content')

    <!-- register -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- register -->
                    <!-- Form Register -->

                    <div class="card mx-auto" style="max-width:520px;">
                        <article class="card-body">
                            <header class="mb-4">
                                <h4 class="card-title">{{__('Sign up')}}</h4>
                            </header>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>{{__('Name')}}</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}" required autofocus>
                                    @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{__('Email')}}</label>
                                    <input type="email" class="form-control" placeholder="email" name="email" value="{{old('email')}}" required>
                                    @error('email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>{{__('Create password')}}</label>
                                        <input class="form-control" type="password" name="password" required>
                                        @error('password')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>password confirmation</label>
                                        <input class="form-control" type="password" name="password_confirmation" required>
                                        @error('password_confirmation')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> {{__('Register')}}</button>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input">
                                        <span class="custom-control-label">
                                            {{__('I am agree with terms and conditions')}}
                                        </span>
                                    </label>
                                </div>
                            </form>
                        </article>
                    </div>
                    <!-- end register -->
                </div>
            </div>
        </div>
    </section>
    <!-- end register -->

@endsection
