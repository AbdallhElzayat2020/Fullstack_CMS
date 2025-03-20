@extends('dashboard.layouts.master')
@section('title','Create User Role')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Create User With Role')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Create User')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.role-users.store') }}" method="post">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <label for="name">{{__('User Name')}}</label>
                                <input value="{{old('name')}}" type="text" class="form-control" name="name" id="name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{__('Email')}}</label>
                                <input type="email" value="{{old('email')}}" class="form-control" name="email"
                                       id="email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{__('Password')}}</label>
                                <input type="password" class="form-control" name="password" id="password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{__('Password Confirmation')}}</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       id="password_confirmation">
                                @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">{{__('Role')}}</label>
                                <select class="select2 form-control" name="role" id="">
                                    <option value="">{{__('--Select--')}}</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">{{__('Create')}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
