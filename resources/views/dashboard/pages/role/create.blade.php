@extends('dashboard.layouts.master')
@section('title','Create Roles and Permission ')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Roles')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Create Roles and Permission')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.role.store') }}" method="post">
                            @csrf
                            @method('post')


                            <div class="form-group">
                                <label for="role_name">{{__('Role Name')}}</label>
                                <input type="text" class="form-control" name="role_name" id="role_name">
                                @error('role_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            @foreach($permissions as $groupName => $permission)
                                <div class="form-group">
                                    <h6 class="my-2 text-primary">{{$groupName}}</h6>
                                    <div class="row">
                                        @foreach($permission as $item)
                                            <div class="col-md-3">
                                                <label class="custom-switch mt-2">
                                                    <input value="{{$item->name}}" type="checkbox" name="permissions[]"
                                                           class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span
                                                        class="custom-switch-description">{{$item->name}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endforeach


                            <button class="btn btn-primary" type="submit">{{__('Create')}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
