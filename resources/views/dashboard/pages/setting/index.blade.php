@extends('dashboard.layouts.master')
@section('title','Setting Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Setting Count')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Setting')}}</h4>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-2">
                                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab4" data-toggle="tab"
                                                   href="#home4" role="tab" aria-controls="home"
                                                   aria-selected="true">{{__('General Settings')}}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab4" data-toggle="tab"
                                                   href="#profile4" role="tab" aria-controls="profile"
                                                   aria-selected="false">{{__('SEO Setting')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab4" data-toggle="tab"
                                                   href="#contact4" role="tab" aria-controls="contact"
                                                   aria-selected="false">{{__('Appearance')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-10">
                                        <div class="tab-content no-padding" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                                 aria-labelledby="home-tab4">

                                                {{-- General Setting Form --}}
                                                @include('dashboard.pages.setting.cards.general-settings')

                                            </div>
                                            <div class="tab-pane fade" id="profile4" role="tabpanel"
                                                 aria-labelledby="profile-tab4">

                                                {{-- SEO Setting Form --}}
                                                @include('dashboard.pages.setting.cards.seo-settings')

                                            </div>
                                            <div class="tab-pane fade" id="contact4" role="tabpanel"
                                                 aria-labelledby="contact-tab4">

                                                {{-- Appearance Setting Form --}}
                                                @include('dashboard.pages.setting.cards.appearance-settings')
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
