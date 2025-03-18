@extends('dashboard.layouts.master')
@section('title','Setting Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Setting Count')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Setting')}}</h4>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-2">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab"
                                                   href="#home4" role="tab" aria-controls="home"
                                                   aria-selected="true">{{__('General Settings')}}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                   href="#profile4" role="tab" aria-controls="profile"
                                                   aria-selected="false">Profile</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab"
                                                   href="#contact4" role="tab" aria-controls="contact"
                                                   aria-selected="false">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-10">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                                 aria-labelledby="home-tab4">
                                                <div class="card border border-primary">
                                                    <div class="card-body mt-4">
                                                        <form action="{{ route('admin.general-setting.update') }}"
                                                              method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
{{--                                                            @dd($setting)--}}
                                                            <div class="form-group">
                                                                <label for="site_name">{{__('Site Name')}}</label>
                                                                <input type="text" value="{{$setting['site_name']}}" class="form-control" name="site_name"
                                                                       id="site_name">
                                                                @error('site_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Site Logo')}}</label>
                                                                <input type="file" class="form-control" name="site_logo"
                                                                       id="">
                                                                <img style="width: 150px;" src="{{asset($setting['site_logo'])}}" alt="">
                                                                @error('site_logo')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">{{__('Site Favicon')}}</label>
                                                                <input type="file" class="form-control"
                                                                       name="site_favicon" id="">
                                                                <img  style="width: 150px;"  src="{{asset($setting['site_favicon'])}}" alt="">
                                                                @error('site_favicon')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <button class="btn btn-primary" type="submit">{{__('Save')}}</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile4" role="tabpanel"
                                                 aria-labelledby="profile-tab4">
                                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit
                                                tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat,
                                                sed fermentum justo rutrum ultrices. Proin quis iaculis tellus.
                                                Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis
                                                neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a
                                                mattis velit. Donec hendrerit venenatis justo, eget scelerisque
                                                tellus pharetra a.
                                            </div>
                                            <div class="tab-pane fade" id="contact4" role="tabpanel"
                                                 aria-labelledby="contact-tab4">
                                                Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi
                                                maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit
                                                eget mauris. Pellentesque fermentum, sem interdum molestie finibus,
                                                nulla diam varius leo, nec varius lectus elit id dolor. Nam
                                                malesuada orci non ornare vulputate. Ut ut sollicitudin magna.
                                                Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum
                                                bibendum augue ut luctus.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
