@extends('dashboard.layouts.master')
@section('title','Create Category')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Category')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Create Category')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="language">{{__('Language')}}</label>

                                        <select class="form-control select2" id="language-select" name="language">
                                            <option value="">---{{__('select')}}---</option>
                                            @foreach($languages as $key => $language)
                                                <option value="{{$language->lang}}">{{$language->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('language')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input required type="text" class="form-control" id="name" name="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="show_at_nav">{{__('Show At Nav')}}</label>
                                        <select class="form-control" id="show_at_nav" name="show_at_nav">
                                            <option value="yes">{{__('yes')}}</option>
                                            <option value="no">{{__('no')}}</option>
                                            @error('show_at_nav')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Status')}}</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active">{{__('Active')}}</option>
                                            <option value="inactive">{{__('InActive')}}</option>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
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
