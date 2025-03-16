@extends('dashboard.layouts.master')
@section('title','About Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('About Page')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('About Page')}}</h4>
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
                                            $about = \App\Models\About::where('language',$language->lang)->first();
                                        @endphp
                                        <div class="tab-pane fade show {{$loop->index === 0 ? 'active' : ''}}"
                                             id="home-{{$language->lang}}" role="tabpanel" aria-labelledby="home-tab2">
                                            <div class="card-body">

                                                <form action="{{ route('admin.about.update') }}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <div class="form-group">
                                                        <textarea name="content"
                                                                  class="summernote-{{$language->lang}}">{!! @$about->content !!}</textarea>
                                                        <input type="hidden" name="language"
                                                               value="{{$language->lang}}">
                                                        @error('content')
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


@push('js')
    <script !src="">

        if (jQuery().summernote) {
            @foreach($languages as $key => $language)
            $(".summernote-{{$language->lang}}").summernote({
                dialogsInBody: true,
                minHeight: 250,
            });
            @endforeach
        }
    </script>
@endpush

