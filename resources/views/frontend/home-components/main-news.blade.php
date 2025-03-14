<section class="pt-0 mt-5">
    <div class="popular__section-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="wrapper__list__article">
                        <h4 class="border_section">{{__('recent post')}}</h4>
                    </div>
                    <div class="row ">
                        @foreach($recentNews as $news)
                            @if($loop->index <= 1)
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <!-- Post Article -->
                                    <div class="card__post ">
                                        <div class="card__post__body card__post__transition">
                                            <a href="{{ route('news-details',$news->slug) }}">
                                                <img src="{{asset($news->image)}}" class="img-fluid"
                                                     alt="{{$news->title}}">
                                            </a>
                                            <div class="card__post__content bg__post-cover">
                                                <div class="card__post__category">
                                                    {{$news->category->name}}
                                                </div>
                                                <div class="card__post__title">
                                                    <h5>
                                                        <a href="{{ route('news-details',$news->slug) }}">
                                                            {!!\App\Helpers\truncate( $news->title,60,'...') !!}
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="card__post__author-info">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('news-details',$news->slug) }}">
                                                                {{__('by')}} {{$news->author->name}}
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                        <span>
                                                           {{date('Y-m-d',strtotime($news->created_at))}}
                                                        </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            @endif
                        @endforeach

                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-md-6">
                            <div class="wrapp__list__article-responsive">
                                @foreach($recentNews as $news)
                                    @if($loop->index > 1 && $loop->index <= 3)

                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details',$news->slug) }}">
                                                        <img src="{{asset($news->image)}}" class="img-fluid"
                                                             alt="{{$news->title}}">
                                                    </a>
                                                </div>


                                                <div class="card__post__body ">
                                                    <div class="card__post__content">

                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    {{__('by')}} {{$news->author->name}}
                                                                </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                      {{date('Y-m-d',strtotime($news->created_at))}}
                                                                </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route('news-details',$news->slug) }}">
                                                                    {!!\App\Helpers\truncate( $news->title,60,'...') !!}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach

                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 ">
                            <div class="wrapp__list__article-responsive">
                                @foreach($recentNews as $news)
                                    @if($loop->index > 3 && $loop->index <= 5)

                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details',$news->slug) }}">
                                                        <img src="{{asset($news->image)}}" class="img-fluid"
                                                             alt="{{$news->title}}">
                                                    </a>
                                                </div>

                                                <div class="card__post__body ">
                                                    <div class="card__post__content">

                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    {{__('by')}} {{$news->author->name}}
                                                                </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                      {{date('Y-m-d',strtotime($news->created_at))}}
                                                                </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route('news-details',$news->slug) }}">
                                                                    {!!\App\Helpers\truncate( $news->title,60,'...') !!}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-lg-4">
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{__('popular post')}}</h4>
                        <div class="wrapper__list-number">

                            @foreach($popularNews as $key=> $news)

                                <div class="card__post__list">
                                    <div class="list-number">
                                        <span>
                                         {{$key + 1}}
                                        </span>
                                    </div>
                                    <a href="{{ route('news-details',$news->slug) }}" class="category">
                                        {{$news->category->name}}
                                    </a>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h5>
                                                <a href="{{ route('news-details',$news->slug) }}">
                                                    {!! \App\Helpers\truncate($news->title , 60 , '...') !!}
                                                </a>
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach

                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


    <!-- Post news carousel -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <aside class="wrapper__list__article">
                    <h4 class="border_section">{{@$categorySectionOne->first()->category->name}}</h4>
                </aside>
            </div>
            <div class="col-md-12">

                <div class="article__entry-carousel">
                    @foreach($categorySectionOne as $sectionOne)
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route('news-details',$sectionOne->slug) }}">
                                        <img src="{{$sectionOne->image}}" alt="{{$sectionOne->title}}"
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                by {{$sectionOne->author->name}}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                               {{date('Y-m-d',strtotime($sectionOne->created_at))}}
                                            </span>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="{{ route('news-details',$sectionOne->slug) }}">
                                            {!! \App\Helpers\truncate($sectionOne->title , 20 , '...') !!}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <aside class="wrapper__list__article">
                    <h4 class="border_section">{{$categorySectionTwo->first()->category->name}}</h4>
                </aside>
            </div>
            <div class="col-md-12">

                <div class="article__entry-carousel">
                    @foreach($categorySectionTwo as $sectionTwo )

                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="#">
                                        <img src="{{asset($sectionTwo->image)}}" alt="{{$sectionTwo->title}}"
                                             class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                {{__('by')}} {{$sectionTwo->author->name}}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                 {{date('Y-m-d',strtotime($sectionTwo->created_at))}}
                                            </span>
                                        </li>

                                    </ul>
                                    <h5>
                                        <a href="{{ route('news-details',$sectionTwo->slug) }}">
                                            {!! \App\Helpers\truncate($sectionTwo->title , 20 , '...') !!}
                                        </a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <!-- End Popular news category -->


    <!-- Popular news category -->
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <aside class="wrapper__list__article mb-0">
                        <h4 class="border_section">lifestyle</h4>
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($categorySectionThree as $sectionThree)
                                    @if($loop->index <= 2)
                                        <div class="mb-4">
                                            <!-- Post Article -->
                                            <div class="article__entry">
                                                <div class="article__image">
                                                    <a href="{{ route('news-details',$sectionThree->slug) }}">

                                                        <img src="{{$sectionThree->image}}" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="article__content">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            {{__('by')}} {{$sectionThree->author->name}}
                                                        </span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                        <span>
                                                         {{date('Y-m-d',strtotime($sectionThree->created_at))}}
                                                        </span>
                                                        </li>

                                                    </ul>
                                                    <h5>
                                                        <a href="{{ route('news-details',$sectionThree->slug) }}">
                                                            {!! \App\Helpers\truncate($sectionThree->title , 20 , '...') !!}
                                                        </a>
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                            <div class="col-md-6">
                                @foreach($categorySectionThree as $sectionThree)
                                    @if($loop->index > 2 && $loop->index <= 5)
                                        <div class="mb-4">
                                            <!-- Post Article -->
                                            <div class="article__entry">
                                                <div class="article__image">
                                                    <a href="{{ route('news-details',$sectionThree->slug) }}">
                                                        <img src="{{$sectionThree->image}}" alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="article__content">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            {{__('by')}} {{$sectionThree->author->name}}
                                                        </span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                        <span>
                                                         {{date('Y-m-d',strtotime($sectionThree->created_at))}}
                                                        </span>
                                                        </li>
                                                    </ul>
                                                    <h5>
                                                        <a href="{{ route('news-details',$sectionThree->slug) }}">
                                                            {!! \App\Helpers\truncate($sectionThree->title , 20 , '...') !!}
                                                        </a>
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </aside>


                    <aside class="wrapper__list__article mt-5">
                        <h4 class="border_section">{{$categorySectionFour->first()->category->name}}</h4>

                        <div class="wrapp__list__article-responsive">
                            <!-- Post Article List -->
                            @foreach($categorySectionFour as $sectionFour)
                                <div class="card__post card__post-list card__post__transition mt-30">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <div class="card__post__transition">
                                                <a href="{{ route('news-details',$sectionFour->slug) }}">
                                                    <img src="{{$sectionFour->image}}" class="img-fluid w-100"
                                                         alt="{{$sectionFour->title}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 my-auto pl-0">
                                            <div class="card__post__body ">
                                                <div class="card__post__content  ">
                                                    <div class="card__post__category ">
                                                        {{$sectionFour->category->name}}
                                                    </div>
                                                    <div class="card__post__author-info mb-2">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                  {{__('by')}}  {{$sectionFour->author->name}}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                   {{date('Y-m-d',strtotime($sectionFour->created_at))}}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card__post__title">
                                                        <h5>
                                                            <a href="{{ route('news-details',$sectionFour->slug) }}">
                                                                {!! \App\Helpers\truncate($sectionFour->title , 60 , '...') !!}
                                                            </a>
                                                        </h5>
                                                        <p class="d-none d-lg-block d-xl-block mb-0">
                                                            {!! \App\Helpers\truncate($sectionFour->description , 120 , '...') !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </aside>
                </div>

                <div class="col-md-4">
                    <div class="sticky-top">
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">
                                {{__('Latest post')}}
                            </h4>
                            <div class="wrapper__list__article-small">
                                @foreach($mostViewedPosts as $mostViewNews)

                                    @if($loop->index === 0)
                                        <!-- Post Article -->
                                        <div class="article__entry">
                                            <div class="article__image">
                                                <a href="{{ route('news-details',$mostViewNews->slug) }}">
                                                    <img src="{{$mostViewNews->image}}" alt="" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="article__content">
                                                <div class="article__category">
                                                    {{$mostViewNews->category->name}}
                                                </div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                    <span class="text-primary">
                                                       {{__('by')}}  {{$mostViewNews->author->name}}
                                                    </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                    <span class="text-dark text-capitalize">
                                                        {{date('Y-m-d',strtotime($mostViewNews->created_at))}}
                                                    </span>
                                                    </li>

                                                </ul>
                                                <h5>
                                                    <a href="{{ route('news-details',$mostViewNews->slug) }}">
                                                        {!! \App\Helpers\truncate($mostViewNews->title , 60 , '...') !!}
                                                    </a>
                                                </h5>
                                                <p>
                                                    {!! \App\Helpers\truncate($mostViewNews->description , 120 , '...') !!}
                                                </p>
                                                <a href="{{ route('news-details',$mostViewNews->slug) }}"
                                                   class="btn btn-outline-primary mb-4 text-capitalize">
                                                    {{__('read more')}}
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    @if($loop->index > 0 && $loop->index < 3)
                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details',$mostViewNews->slug) }}">
                                                        <img src="{{$mostViewNews->image}}" class="img-fluid" alt="">
                                                    </a>
                                                </div>
                                                <div class="card__post__body ">
                                                    <div class="card__post__content">

                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                   {{__('by')}}  {{$mostViewNews->author->name}}
                                                                </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                    {{date('Y-m-d',strtotime($mostViewNews->created_at))}}
                                                                </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route('news-details',$mostViewNews->slug) }}">
                                                                    {!! \App\Helpers\truncate($mostViewNews->title , 60 , '...') !!}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{__('stay conected')}}</h4>
                            <!-- widget Social media -->
                            <div class="wrap__social__media">
                                @foreach($socialCount as $socialLink)
                                    <a href="#" target="_blank" class="mt-2">
                                        <div class="social__media__widget mt-3"
                                             style="background-color: {{$socialLink->color}}">
                                            <span class="social__media__widget-icon p-2">
                                                <i class="{{$socialLink->icon}}" style="font-size: 18px"></i>
                                            </span>
                                            <span class="social__media__widget-counter">
                                               {{$socialLink->fan_count}}   {{$socialLink->fan_type}}
                                            </span>
                                            <span class="social__media__widget-name">
                                                {{$socialLink->button_text}}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach


                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">tags</h4>
                            <div class="blog-tags p-0">
                                <ul class="list-inline">

                                    @foreach ($mostTags as $tag)
                                        <li class="list-inline-item">
                                            <a href="{{ route('news',['tag'=> $tag->name]) }}">
                                                #{{$tag->name}} ({{$tag->count}})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">Advertise</h4>
                            <a href="#">
                                <figure>
                                    <img src="images/newsimage3.png" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">newsletter</h4>
                            <!-- Form Subscribe -->
                            <div class="widget__form-subscribe bg__card-shadow">
                                <h6>
                                    The most important world news and events of the day.
                                </h6>
                                <p><small>Get magzrenvi daily newsletter on your inbox.</small></p>
                                <div class="input-group ">
                                    <input type="text" class="form-control" placeholder="Your email address">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">sign up</button>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</section>
