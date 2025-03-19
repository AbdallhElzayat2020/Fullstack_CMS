@extends('dashboard.layouts.master')
@section('title','Create Social Link')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Social Link')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Create Social Link')}}</h4>
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

                            <div class="form-group">
                                <h6>{{__('Category Permissions')}}</h6>

                                <div class="row">

                                    <div class="col-md-3">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                   class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">Show Category</span>
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                   class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">Add Category</span>
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                   class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">Delete Category</span>
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                   class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description">Delete Category</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">{{__('Create')}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
