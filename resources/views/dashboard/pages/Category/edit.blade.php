@extends('dashboard.layouts.master')
@section('title','Edit Category')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Category')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Edit Category')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.update',$category->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="language">{{__('Language')}}</label>

                                        <select class="form-control select2" id="language-select" name="language">
                                            <option value="">---{{__('select')}}---</option>
                                            @foreach($languages as $key => $language)
                                                <option
                                                    @selected(old('language', $category->language ) === $language->lang) value="{{$language->lang}}">{{$language->name}}</option>
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
                                        <input required type="text" value="{{$category->name}}" class="form-control"
                                               id="name" name="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="show_at_nav">{{__('Show At Nav')}}</label>
                                        <select class="form-control" id="show_at_nav" name="show_at_nav">
                                            <option
                                                @selected(old('show_at_nav', $category->show_at_nav) ==='yes' ) value="yes">{{__('yes')}}</option>
                                            <option
                                                @selected(old('show_at_nav', $category->show_at_nav) ==='no' ) value="no">{{__('no')}}</option>
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
                                            <option
                                                @selected(old('status', $category->status) === 'active') value="active">{{__('Active')}}</option>
                                            <option
                                                @selected(old('status', $category->status) === 'inactive') value="inactive">{{__('InActive')}}</option>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">{{__('Update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
