@extends('dashboard.layouts.master')
@section('title','Edit Social Link')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Social Link')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">

                    <div class="card-header">
                        <h4>{{__('Edit Social Link')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.social-link.update',$socialLink->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="icon">{{__('Icon')}}</label>
                                        <br>
                                        <button class="btn btn-primary" data-icon="{{$socialLink->icon}}" name="icon"
                                                role="iconpicker"></button>
                                        @error('icon')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label for="url">{{__('Link URL')}}</label>
                                        <input required type="text" value="{{$socialLink->url}}" class="form-control"
                                               id="url"
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
                                            <option @selected(old('status', $socialLink->status) === 'active' ) value="active">{{__('Active')}}</option>
                                            <option @selected(old('status', $socialLink->status) === 'inactive' ) value="inactive">{{__('InActive')}}</option>
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
