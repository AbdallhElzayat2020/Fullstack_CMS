@extends('dashboard.layouts.master')
@section('title','Update Social Count')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Social Count')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Edit Social Link')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.social-count.update',$socialCount->id) }}" method="post">
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
                                                    @selected(old('language', $socialCount->language) === $language->lang) value="{{$language->lang}}">{{$language->name}}</option>
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
                                        <input required type="text" class="form-control" value="{{$socialCount->name}}"
                                               id="name" name="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="icon">{{__('Icon')}}</label>
                                        <br>
                                        <button class="btn btn-primary" data-icon="{{$socialCount->icon}}" name="icon"
                                                role="iconpicker"></button>
                                        @error('icon')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="fan_count">{{__('Fan Count')}}</label>
                                        <input required type="text" class="form-control"
                                               value="{{$socialCount->fan_count}}" id="fan_count"
                                               name="fan_count">
                                        @error('fan_count')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="fan_type">{{__('Fan Type')}}</label>
                                        <input required type="text" class="form-control"
                                               value="{{$socialCount->fan_type}}"
                                               placeholder="{{__('ex: likes ,  fans , followers')}}" id="fan_type"
                                               name="fan_type">
                                        @error('fan_type')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label>{{__('Pick Your Color')}}</label>
                                        <div class="input-group colorpickerinput">
                                            <input name="color" value="{{$socialCount->color}}" type="text"
                                                   class="form-control">

                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-fill-drip"></i>
                                                </div>
                                            </div>
                                            @error('color')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="button_text">{{__('Button Text')}}</label>
                                        <input required type="text" class="form-control" id="button_text"
                                               value="{{$socialCount->button_text}}"
                                               name="button_text">
                                        @error('button_text')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="url">{{__('Link URL')}}</label>
                                        <input required type="text" class="form-control" id="url"
                                               value="{{$socialCount->url}}"
                                               name="url">
                                        @error('url')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Status')}}</label>
                                        <select class="form-control" id="status" name="status">
                                            <option
                                                @selected(old('status', $socialCount->status) === 'active' ) value="active">
                                                {{__('Active')}}
                                            </option>
                                            <option
                                                @selected(old('status', $socialCount->status) === 'inactive' ) value="inactive">
                                                {{__('InActive')}}
                                            </option>
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

@push('js')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
