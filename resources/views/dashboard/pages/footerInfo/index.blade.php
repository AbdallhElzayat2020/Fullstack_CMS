@extends('dashboard.layouts.master')
@section('title','Footer Info section settings Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Footer Info settings')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Footer Info settings')}}</h4>
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

                                            $footerInfo = App\Models\AdminFooterInfo::where('language',$language->lang)->first();
                                        @endphp
                                        <div class="tab-pane fade show {{$loop->index === 0 ? 'active' : ''}}"
                                             id="home-{{$language->lang}}" role="tabpanel" aria-labelledby="home-tab2">
                                            <div class="card-body">

                                                <form action="{{ route('admin.footer-info.store') }}" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <img src="{{asset($footerInfo->logo)}}" style="width: 200px" alt="">
                                                        <br>
                                                        <label for="logo">{{__('Logo')}}</label>
                                                        <input type="file" class="form-control" name="logo" id="logo">
                                                        <input type="hidden" class="form-control"
                                                               value="{{$language->lang}}" name="language">
                                                        @error('logo')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">{{__('Short Description')}}</label>
                                                        <textarea class="form-control" type="text" name="description"
                                                                  id="description">{{$footerInfo->description}}</textarea>
                                                        @error('description')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="copyright">{{__('Copyright Text')}}</label>
                                                        <input value="{{$footerInfo->copyright}}" class="form-control" type="text" name="copyright"
                                                               id="copyright">
                                                        @error('copyright')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <button class="btn-primary btn"
                                                            type="submit">{{__('Save')}}</button>
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



