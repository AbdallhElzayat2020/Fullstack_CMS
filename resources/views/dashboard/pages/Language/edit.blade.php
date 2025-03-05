@extends('dashboard.layouts.master')
@section('title','Edit Language')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Languages')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Edit Language')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.language.update',$language->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Language')}}</label>
                                        <select class="form-control select2" id="language-select" name="lang">
                                            <option value="">---select---</option>
                                            @foreach(config('language') as $key => $lang)
                                                {{--                                                if($language->lang === $key) selected @endif--}}
                                                <option
                                                    @selected(old('lang', $language->lang) === $key) value="{{$key}}">
                                                    {{$lang['name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('lang')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input readonly type="text" value="{{$language->name}}" class="form-control"
                                               id="name" name="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input readonly type="text" class="form-control" value="{{$language->slug}}"
                                               id="slug" name="slug">
                                        @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Status')}}</label>
                                        <select class="form-control" id="name" name="status">
                                            <option
                                                @selected(old('status', $language->status) ==='active' ) value="active">
                                                Active
                                            </option>
                                            <option
                                                @selected(old('status', $language->status) === 'inactive' ) value="inactive">
                                                InActive
                                            </option>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="is default">{{__('Is It Default')}}</label>
                                        <select class="form-control" name="default" id="is default">
                                            <option @selected(old('default', $language->default) === 'no'  ) value="no">
                                                No
                                            </option>
                                            <option
                                                @selected(old('default', $language->default) === 'yes'  ) value="yes">
                                                Yes
                                            </option>
                                        </select>
                                        @error('default')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('js')
    <script>
        $(document).ready(function () {
            $('#language-select').on('change', function () {
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);
            });
        });
    </script>
@endpush
