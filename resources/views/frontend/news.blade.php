@extends('frontend.layouts.master')

@section('content')
    <section class="blog_pages">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Breadcrumb -->
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ route('home') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> {{__('Home')}}</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="javascript:;" class="breadcrumbs__url">{{__('News')}}</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="blog_page_search">
                        <form action="{{ route('news') }}" method="GET">
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="text" name="search" value="{{request()->search}}"
                                           placeholder="Type here">
                                </div>
                                <div class="col-lg-4">
                                    <select name="category">
                                        <option value="">{{__('All')}}</option>
                                        @foreach($categories as $category)
                                            <option
                                                @selected(old('category', request()->category) === $category->slug) value="{{$category->slug}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit">{{__('search')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <aside class="wrapper__list__article ">
                        @if(request()->has('category'))
                            <h4 class="border_section">{{__('Category')}}: {{request()->category}}</h4>
                        @endif

                        <div class="row">
                            @forelse($news as $key=> $post)
                                <div class="col-lg-6">
                                    <!-- Post Article -->
                                    <div class="article__entry">
                                        <div class="article__image">
                                            <a href="{{ route('news-details',$post->slug) }}">
                                                <img src="{{asset($post->image)}}" alt="{{$post->title}}"
                                                     class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="article__content">
                                            <div class="article__category">
                                                {{$post->category->name}}
                                            </div>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                <span class="text-primary">
                                                    {{__('by')}} {{$post->author->name}}
                                                </span>
                                                </li>
                                                <li class="list-inline-item">
                                                <span class="text-dark text-capitalize">
                                                  {{date('Y-m-d',strtotime($post->created_at))}}
                                                </span>
                                                </li>

                                            </ul>
                                            <h5>
                                                <a href="{{ route('news-details',$post->slug) }}">
                                                    {!! \App\Helpers\truncate($post->title,30,'...') !!}
                                                </a>
                                            </h5>
                                            <p>
                                                {!! \App\Helpers\truncate($post->description,80,'...') !!}
                                            </p>
                                            <a href="{{ route('news-details',$post->slug) }}"
                                               class="btn btn-outline-primary mb-4 text-capitalize">
                                                {{__(' read more')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12 text-center w-100">
                                    <div class="alert alert-danger">
                                        {{__('No news found  :(')}}
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </aside>

                    <!-- Pagination -->
                    <div class="">
                        {{$news->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-sticky">
                        <aside class="wrapper__list__article ">
                            <h4 class="border_section">{{__('Sidebar')}}</h4>
                            <div class="wrapper__list__article-small">
                                @foreach($recentNews as $post)
                                    @if($loop->index <= 2)
                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details',$post->slug) }}">
                                                        <img src="{{asset($post->image)}}" class="img-fluid" alt="{{$post->title}}">
                                                    </a>
                                                </div>

                                                <div class="card__post__body ">
                                                    <div class="card__post__content">

                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                            <span class="text-primary">
                                                                {{__('by')}} {{$post->author->name}}
                                                            </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                            <span class="text-dark text-capitalize">
                                                                {{date('Y-m-d',strtotime($post->created_at))}}
                                                            </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route('news-details',$post->slug) }}">
                                                                    {!! \App\Helpers\truncate($post->title,30,'...') !!}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @foreach($recentNews as $post)
                                    @if($loop->index > 2)
                                        <!-- Post Article -->
                                        <div class="article__entry">
                                            <div class="article__image">
                                                <a href="{{ route('news-details',$post->slug) }}">
                                                    <img src="{{asset($post->image)}}" class="img-fluid" alt="{{$post->title}}">
                                                </a>
                                            </div>
                                            <div class="article__content">
                                                <div class="article__category">
                                                    {{__('by')}} {{$post->category->name}}
                                                </div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                <span class="text-primary">
                                                    {{__('by')}} {{$post->author->name}}
                                                </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                <span class="text-dark text-capitalize">
                                                   {{date('Y-m-d',strtotime($post->created_at))}}
                                                </span>
                                                    </li>

                                                </ul>
                                                <h5>
                                                    <a href="{{ route('news-details',$post->slug) }}">
                                                        {!! \App\Helpers\truncate($post->title,30,'...') !!}
                                                    </a>
                                                </h5>
                                                <p>
                                                    <a href="{{ route('news-details',$post->slug) }}">
                                                        {!! \App\Helpers\truncate($post->description,80,'...') !!}
                                                    </a>
                                                </p>

                                                <a href="{{ route('news-details',$post->slug) }}"
                                                   class="btn btn-outline-primary mb-4 text-capitalize">
                                                    {{__('read more')}}
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">tags</h4>
                            <div class="blog-tags p-0">
                                <ul class="list-inline">

                                    @foreach($mostTags as $tag)
                                        <li class="list-inline-item">
                                            <a href="{{ route('news',['tag'=> $tag->name]) }}">
                                                #{{$tag->name}} ({{$tag->count}})
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </aside>

                        <aside class="wrapper__list__article mt-3">
                            <h4 class="border_section">{{__('newsletter')}}</h4>
                            <!-- Form Subscribe -->
                            <div class="widget__form-subscribe bg__card-shadow">
                                <h6>
                                    {{__('The most important world news and events of the day')}}.
                                </h6>
                                <p><small>{{__('Get magzrenvi daily newsletter on your inbox')}}.</small></p>
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Your email address">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">{{__('sign up')}}</button>
                                    </div>
                                </div>
                            </div>
                        </aside>

                        <aside class="wrapper__list__article mt-3">
                            <h4 class="border_section">Advertise</h4>
                            <a href="#">
                                <figure>
                                    <img src="images/newsimage1.png" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </aside>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

        </div>
        <div class="large_add_banner mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="large_add_banner_img">
                            <img src="images/placeholder_large.jpg" alt="adds">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
