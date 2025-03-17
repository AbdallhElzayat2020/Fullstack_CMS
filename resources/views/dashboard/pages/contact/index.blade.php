@extends('dashboard.layouts.master')
@section('title','Contact Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Contact Page')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Contact Page')}}</h4>
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
                                            $contact = \App\Models\Contact::where('language',$language->lang)->first();
                                        @endphp
                                        <div class="tab-pane fade show {{$loop->index === 0 ? 'active' : ''}}"
                                             id="home-{{$language->lang}}" role="tabpanel" aria-labelledby="home-tab2">
                                            <div class="card-body">

                                                <form action="{{ route('admin.contact.update') }}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    <input type="hidden" name="language" value="{{$language->lang}}">
                                                    <div class="form-group">
                                                        <label for="">{{__('Address')}}</label>
                                                        <input type="text" value="{{@$contact->address}}" class="form-control" name="address">
                                                        @error('address')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">{{__('Phone')}}</label>
                                                        <input type="text" value="{{@$contact->phone}}" class="form-control" name="phone">
                                                        @error('phone')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">{{__('Email')}}</label>
                                                        <input type="text" value="{{@$contact->email}}" class="form-control" name="email">
                                                        @error('email')
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

