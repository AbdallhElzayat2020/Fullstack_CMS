@extends('dashboard.layouts.master')
@section('title','Edit News')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('News Page')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Edit News')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.news.update',$news->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="language">{{__('Language')}}</label>
                                        <select name="language" id="language-select" class="form-control select2">
                                            <option value="">---{{__('select')}}---</option>
                                            @foreach($languages as $key => $language)
                                                <option
                                                    @selected(old('language', $news->language) === $language->lang) value="{{$language->lang}}">
                                                    {{$language->name}}
                                                </option>
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
                                        <select class="form-control select2"
                                                id="category" name="category_id">
                                            <option>---{{__('Select Category')}}---</option>
                                            @foreach($categories as $category)
                                                <option
                                                    @selected(old('category_id', $news->category_id) === $category->id) value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>

                                            @endforeach
                                            @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Title')}}</label>
                                        <input value="{{$news->title}}" type="text" class="form-control" id="title"
                                               name="title">
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
                                            <input name="tags"
                                                   {{--                                                   value="{{\App\Helpers\formatTags($news->tags()->pluck('name')->toArray())}}"--}}
                                                   value="{{$tags}}"
                                                   type="text"
                                                   class="form-control inputtags">
                                        </div>
                                        @error('tags')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Description')}}</label>
                                        <textarea class="form-control summernote-simple" id="description"
                                                  name="description">{{$news->description}}
                                        </textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="meta_title">{{__('Meta Title')}}</label>
                                        <input value="{{$news->meta_title}}" type="text" class="form-control"
                                               id="meta_title"
                                               name="meta_title">
                                        @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="meta_description">{{__('Meta Description')}}</label>
                                        <textarea name="meta_description"
                                                  class="form-control">{{$news->meta_description}}</textarea>
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
                                                    <input @checked(old('status', $news->status)) value="active"
                                                           type="checkbox" name="status"
                                                           class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        @if(\App\Helpers\canAccess(['news status','news all-access']))
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="control-label">{{__('Is Breaking News')}}</div>
                                                    <label class="custom-switch mt-2">
                                                        <input
                                                            @checked(old('is_breaking_news', $news->is_breaking_news)) value="1"
                                                            type="checkbox" name="is_breaking_news"
                                                            class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="control-label">{{__('Show At Slider')}}</div>
                                                    <label class="custom-switch mt-2">
                                                        <input
                                                            @checked(old('show_at_slider', $news->show_at_slider)) value="1"
                                                            type="checkbox" name="show_at_slider"
                                                            class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="control-label">{{__('Show At Popular')}}</div>
                                                    <label class="custom-switch mt-2">
                                                        <input
                                                            @checked(old('show_at_popular', $news->show_at_popular)) value="1"
                                                            type="checkbox" name="show_at_popular"
                                                            class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>

                                                </div>
                                            </div>
                                        @endif
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
            $('.image-preview').css({
                "background-image": "url({{asset($news->image)}})",
                "background-size": "cover",
                "background-position": "center",
            });
        })

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
