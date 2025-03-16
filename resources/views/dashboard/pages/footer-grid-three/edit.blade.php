@extends('dashboard.layouts.master')
@section('title','Footer Grid Three')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Footer Grid Three')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Update Footer Grid Three')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.footer-grid-three.update',$footer->id) }}" method="post">
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
                                                    @selected(old('language', $language->lang) == $language->lang) value="{{$language->lang}}">{{$language->name}}</option>
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
                                        <input value="{{$footer->name}}" required type="text" class="form-control"
                                               id="name" name="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="link">{{__('Url')}}</label>
                                        <input value="{{$footer->link}}" required type="text" class="form-control"
                                               id="link" name="link">
                                        @error('link')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Status')}}</label>
                                        <select class="form-control" id="status" name="status">
                                            <option
                                                @selected(old('status', $footer->status) === 'active') value="active">{{__('Active')}}</option>
                                            <option
                                                @selected(old('status', $footer->status) ==='inactive' ) value="inactive">{{__('InActive')}}</option>
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
