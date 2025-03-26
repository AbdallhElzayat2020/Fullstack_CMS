@extends('dashboard.layouts.master')
@section('title','Edit Roles and Permission ')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Roles and Permission ')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Create')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.role.update',$role->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="role_name">{{__('Role Name')}}</label>
                                <input type="text" value="{{$role->name}}" class="form-control" name="role_name"
                                       id="role_name">
                                @error('role_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>
                            @foreach($permissions as $groupName => $permission)
                                <div class="form-group">
                                    <h6 class="text-primary">{{$groupName}}</h6>

                                    <div class="row">
                                        @foreach($permission as $item)
                                            <div class="col-md-3">
                                                <label class="custom-switch mt-3">
                                                    <input value="{{$item->name}}"

                                                           {{in_array($item->name , $rolesPermission) ? 'checked' : ''}}

                                                           type="checkbox"
                                                           name="permissions[]"
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


                            <button class="btn btn-primary" type="submit">{{__('Update')}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
