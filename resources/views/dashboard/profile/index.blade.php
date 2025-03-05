@extends('dashboard.layouts.master')
@section('title', 'Profile')
@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Profile')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{__('Profile')}}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{__('Hi')}}, {{Auth::guard('admin')->user()->name}}</h2>
            <p class="section-lead">
                {{__('Change information about yourself on this page')}}.
            </p>
            <div class="row mt-sm-4">

                {{--Update Profile--}}
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('admin.profile.update',$user->id) }}"
                              class="needs-validation"
                              novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{__('Edit Profile')}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div id="image-preview" class="image-preview mb-3">
                                        <label for="image-upload" id="image-label">{{__('Choose File')}}</label>
                                        <input type="file" name="image" id="image-upload">
                                        <input type="hidden" name="old_image" value="{{$user->image}}">

                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>{{__('Name')}}</label>
                                        <input type="text" class="form-control" value="{{$user->name}}" name="name"
                                               required="">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>{{__('Email')}}</label>
                                        <input type="text" class="form-control" value="{{$user->email}}" name="email"
                                               required="">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{__('Save Changes')}}</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{--Update Password--}}
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        @if(session()->has('success_change'))
                            <div class="alert alert-success">
                                {{session()->get('success_change')}}
                            </div>
                        @endif
                        <form method="post" action="{{route('admin.profile.password.update',$user->id)}}"
                              class="needs-validation"
                              novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{__('Update Password')}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>{{__('Old Password')}}</label>
                                        <input type="password" class="form-control" name="current_password"
                                               required="">
                                        <div class="invalid-feedback">
                                            {{__('Please fill in the Old Password')}}
                                        </div>
                                        @error('current_password')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>{{__('New Password')}}</label>
                                        <input type="password" class="form-control" name="password"
                                               required="">
                                        <div class="invalid-feedback">
                                            {{__('Please fill in the New Password')}}
                                        </div>
                                        @error('password')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>{{__('Confirm Password')}}</label>
                                        <input type="password" class="form-control" value=""
                                               name="password_confirmation"
                                               required="">
                                        <div class="invalid-feedback">
                                            {{__('Please fill in the Confirm Password')}}
                                        </div>
                                        @error('password_confirmation')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{__('Save Changes')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            $(document).ready(function () {
                $('.image-preview').css({
                    "background-image": "url({{asset($user->image)}})",
                    "background-size": "cover",
                    "background-position": "center",
                });
            })
        </script>
    @endpush
@endsection
