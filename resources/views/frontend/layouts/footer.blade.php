<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <!-- Footer -->
        <footer>
            <div class="wrapper__footer bg__footer-dark pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <figure class="image-logo">


                                        <img style="width: 100px!important; height: 100px!important;"
                                             src="{{asset(@$footerInfo->logo)}}" alt="" class="logo-footer">



                                </figure>

                                <p style="overflow-wrap: break-word;">

                                    {!! @$footerInfo->description !!}
                                </p>


                                <div class="social__media mt-4">
                                    <ul class="list-inline">

                                        @foreach($socialLinks as $gridOne)

                                            <li class="list-inline-item">
                                                <a href="{{$gridOne->url}}" class="btn btn-social rounded text-white ">
                                                    <i style="font-size: 20px" class="{{$gridOne->icon}}"></i>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        Special Links
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach($footerGridOne as $link)

                                        <li>
                                            <a href="{{$link->$link}}">{{$link->name}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        Tabs
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach($footerGridTwo as $link)
                                        <li>
                                            <a href="{{$link->$link}}">{{$link->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        Blogs
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach($footerGridThree as $link)

                                        <li>
                                            <a href="{{$link->link}}">{{$link->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="wrapper__footer-bottom bg__footer-dark">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top-1 bg__footer-bottom-section">
                                <p class="text-white text-center">
                                    {{@$footerInfo->copyright}}
                                    <a class="text-warning bold" href="https://abdallh-elzayat.me" target="_blank">
                                        {{__('Abdallh Elzayat')}}
                                    </a>
                                </p>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</section>
