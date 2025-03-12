@extends('dashboard.layouts.master')
@section('title','Create Social Count')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Social Count')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Create Social Link')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.social-count.store') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="language">{{__('Language')}}</label>

                                        <select class="form-control select2" id="language-select" name="language">
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
                                        <label for="name">{{__('Name')}}</label>
                                        <input required type="text" class="form-control" id="name" name="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="icon">{{__('Icon')}}</label>
                                        <br>
                                        <button class="btn btn-primary" name="icon" role="iconpicker"></button>
                                        @error('icon')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="fan_count">{{__('Fan Count')}}</label>
                                        <input required type="text" class="form-control" id="fan_count"
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
                                               placeholder="{{__('ex: likes ,  fans , followers')}}" id="fan_type"
                                               name="fan_type">
                                        @error('fan_type')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label>Pick Your Color</label>
                                        <div class="input-group colorpickerinput">
                                            <input name="color" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-fill-drip"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="button_text">{{__('Button Text')}}</label>
                                        <input required type="text" class="form-control" id="button_text"
                                               name="button_text">
                                        @error('button_text')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="name">{{__('Status')}}</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active">{{__('Active')}}</option>
                                            <option value="inactive">{{__('InActive')}}</option>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
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
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
