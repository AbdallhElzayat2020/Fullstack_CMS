@extends('frontend.layouts.master')
@section('title', __('Reset Password'))

@section('content')

    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto py-4" style="max-width: 380px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{__('Reset Password')}}</h4>


                            <form method="POST" action="{{ route('password.store') }}">

                                {{--  Password Reset Token --}}
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="email" value="{{old('email',$request->email)}}" required>
                                    @error('email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="new password" required>
                                    @error('password')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                    @error('password_confirmation')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">{{__('Rest Password')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

