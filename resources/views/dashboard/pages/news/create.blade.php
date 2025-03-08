@extends('dashboard.layouts.master')
@section('title','Create News')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('News Page')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Create News')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.news.store') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="language">{{__('Language')}}</label>
                                        <select name="language" id="language-select" class="form-control select2">
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
                                        <label for="category">{{__('Category')}}</label>
                                        <select class="form-control select2" id="category" name="category_id">
                                            <option>---{{__('Select Category')}}---</option>
                                            @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Title')}}</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Image')}}</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">{{__('Choose File')}}</label>
                                            <input type="file" name="image" id="image-upload">
                                        </div>
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">

                                    <div class="form-group">
                                        <label
                                            class="">{{__('Tags')}}</label>
                                        <div>
                                            <input name="tags" type="text" class="form-control inputtags">
                                        </div>
                                        @error('tags')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Description')}}</label>
                                        <textarea class="form-control summernote-simple" id="description" name="description">
                                        </textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Meta Title')}}</label>
                                        <input type="text" class="form-control" id="meta_title"
                                               name="meta_title">
                                        @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description" class="form-control"></textarea>
                                        @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="control-label">{{__('Status')}}</div>
                                                <label class="custom-switch mt-2">
                                                    <input value="active" type="checkbox" name="status"
                                                           class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="control-label">{{__('Is Breaking News')}}</div>
                                                <label class="custom-switch mt-2">
                                                    <input value="1" type="checkbox" name="is_breaking_news"
                                                           class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="control-label">{{__('Show At Slider')}}</div>
                                                <label class="custom-switch mt-2">
                                                    <input value="1" type="checkbox" name="show_at_slider"
                                                           class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="control-label">{{__('Show At Popular')}}</div>
                                                <label class="custom-switch mt-2">
                                                    <input value="1" type="checkbox" name="show_at_popular"
                                                           class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>

                                            </div>
                                        </div>
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

@push('js')
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('#language-select').on('change', function () {--}}
    {{--                let lang = $(this).val();--}}
    {{--                $.ajax({--}}
    {{--                    method: 'GET',--}}
    {{--                    url: "{{route('admin.fetch-news-category')}}",--}}
    {{--                    data: {lang: lang, _token: "{{ csrf_token() }}"},--}}
    {{--                })--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}


    <script>
        $(document).ready(function () {
            $('#language-select').on('change', function () {
                let lang = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.fetch-news-category')}}",
                    data: {lang: lang, _token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $('#category').html("<option value=''>--{{__('select')}}--</option>");
                        data.forEach(function (category) {
                            $('#category').append("<option value='" + category.id + "'>" + category.name + "</option>");
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
            });
        })
    </script>
@endpush
