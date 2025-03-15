@extends('dashboard.layouts.master')
@section('title','Home section settings Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Home section settings')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Home section settings')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{__('Create New')}}
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    @foreach($languages as $key => $language)
                                        <li class="nav-item">
                                            <a class="nav-link {{$key === 0 ?'active':''}} " id="home-tab2"
                                               data-toggle="tab" href="#home-{{$language->lang}}"
                                               role="tab" aria-controls="home"
                                               aria-selected="true">{{$language->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content tab-bordered" id="myTab3Content">
                                    @foreach($languages as $language )
                                        @php
                                            $categories = App\Models\Category::where('language',$language->lang)->get();
                                            $homeSectionSetting = App\Models\HomeSectionSetting::where('language',$language->lang)->first();
                                        @endphp
                                        <div class="tab-pane fade show {{$loop->index === 0 ? 'active' : ''}}"
                                             id="home-{{$language->lang}}" role="tabpanel" aria-labelledby="home-tab2">
                                            <div class="card-body">

                                                <form action="{{ route('admin.home-section-setting.update') }}" method="post">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group">
                                                        <label for="category_section_one">{{__('Category Section One')}}</label>
                                                        <input type="hidden" name="language" value="{{$language->lang}}">
                                                        <select  class="form-control select2" id="category_section_one" name="category_section_one">
                                                            <option value="">---{{__('select')}}---</option>
                                                            @foreach($categories as $category)

                                                                <option {{$homeSectionSetting->category_section_one == $category->id ? 'selected' : '' }}
                                                                        value="{{$category->id}}">
                                                                    {{$category->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                            @error('category_section_one')
                                                            <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="category_section_two">{{__('Category Section Two')}}</label>
                                                        <select class="form-control select2" id="category_section_two" name="category_section_two">
                                                            <option value="">---{{__('select')}}---</option>
                                                            @foreach($categories as $category)
                                                                <option {{$homeSectionSetting->category_section_two == $category->id ? 'selected' : '' }}
                                                                    value="{{$category->id}}">
                                                                    {{$category->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_section_two')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="category_section_three">{{__('Category Section Three')}}</label>
                                                        <select class="form-control select2" id="category_section_three" name="category_section_three">
                                                            <option value="">---{{__('select')}}---</option>
                                                            @foreach($categories as $category)
                                                                <option {{$homeSectionSetting->category_section_three === $category->id ? 'selected' : '' }}
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_section_three')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="category_section_four">{{__('Category Section Four')}}</label>
                                                        <select class="form-control select2" id="category_section_four" name="category_section_four">
                                                            <option value="">---{{__('select')}}---</option>
                                                            @foreach($categories as $category)
                                                                <option {{$homeSectionSetting->category_section_four == $category->id ? 'selected' : '' }}
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_section_four')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                   <button class="btn-primary btn" type="submit">{{__('Save')}}</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



