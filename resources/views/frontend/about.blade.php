@extends('frontend.layouts.master')
@section('title', 'About')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- breadcrumb -->
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ route('home') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> {{__('Home')}}</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="" class="breadcrumbs__url">{{__('AboutUs')}}</a>
                        </li>
                    </ul>
                    <!-- End breadcrumb -->

                    <div class="wrap__about-us">
                        {!! $about->content !!}
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
