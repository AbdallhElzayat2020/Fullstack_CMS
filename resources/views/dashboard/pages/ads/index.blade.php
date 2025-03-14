@extends('dashboard.layouts.master')
@section('title','Ads')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Ads Page')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Update Ads')}}</h4>
                    </div>

                    <div class="card-body">
                        <h6 class="mb-3 text-primary">Home Page Ads</h6>
                        <form action="{{ route('admin.ads.update',1) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <img width="200" class="my-3" src="{{asset($ad->home_top_bar_ad)}}" alt="">
                                        <label for="home_top_bar_ad">{{__('Top Bar Ad')}}</label>
                                        <input  type="file"  class="form-control" id="home_top_bar_ad" name="home_top_bar_ad">
                                        @error('home_top_bar_ad')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                        <label class="custom-switch mt-2">
                                            <input value="1"
                                                   {{$ad->home_top_bar_ad_status == 1 ? 'checked' : ''}}
                                                   type="checkbox" name="home_top_bar_ad_status"
                                                   class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <img width="200" class="my-3" src="{{asset($ad->home_middle_ad)}}" alt="">
                                        <label for="home_middle_ad">{{__('Middle Bar Ad')}}</label>
                                        <input  type="file" class="form-control" id="home_middle_ad" name="home_middle_ad">
                                        @error('home_middle_ad')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="custom-switch mt-2">
                                            <input value="1" name="home_middle_ad_status"
                                                   {{$ad->home_middle_ad_status == 1 ? 'checked' : ''}}
                                                   type="checkbox"
                                                   class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>

                                <h6 class="mb-3 text-primary">News View Page Ads</h6>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <img width="200" class="my-3" src="{{asset($ad->view_page_ad)}}" alt="">
                                        <label for="view_page_ad">{{__('Bottom Ad')}}</label>
                                        <input  type="file" class="form-control" id="view_page_ad" name="view_page_ad">
                                        @error('view_page_ad')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="custom-switch mt-2">
                                            <input value="1" name="view_page_status"
                                                   {{$ad->view_page_status == 1 ? 'checked' : ''}}
                                                   type="checkbox"
                                                   class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>


                                <h6 class="mb-3 text-primary">News Page Ads</h6>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <img width="200" class="my-3" src="{{asset($ad->news_page_ad)}}" alt="">
                                        <label for="news_page_ad">{{__('Bottom Ad')}}</label>
                                        <input  type="file" class="form-control" id="news_page_ad" name="news_page_ad">
                                        @error('news_page_ad')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="custom-switch mt-2">
                                            <input value="1" name="news_page_ad_status"
                                                   {{$ad->news_page_ad_status == 1 ? 'checked' : ''}}
                                                   type="checkbox"
                                                   class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>

                                <h6 class="mb-3 text-primary">Sidebar Ads</h6>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <img width="200" class="my-3" src="{{asset($ad->side_bar_ad)}}" alt="">
                                        <label for="side_bar_ad">{{__('Sidebar Ad')}}</label>
                                        <input  type="file" class="form-control" id="side_bar_ad" name="side_bar_ad">
                                        @error('side_bar_ad')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="custom-switch mt-2">
                                            <input value="1" name="side_bar_ad_status"
                                                   {{$ad->side_bar_ad_status == 1 ? 'checked' : ''}}
                                                   type="checkbox"
                                                   class="custom-switch-input toggle-status">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
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
