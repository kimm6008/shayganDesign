@extends('app')
@section('Content')
    <div class="title-breadcrumbs">
        <div class="title-breadcrumbs-inner">
            <div class="container">
                <nav class="woocommerce-breadcrumb">
                    <a href="/">{{__('HOME')}}</a>
                    <span class="separator">/</span> {{__('Model')}}
                </nav>
            </div>
        </div>
    </div>
    <div class="co-portfolio-section-1 pt-50 pb-70">
        <div class="container-fluid">
            <div class="row">
                <!--Section Title-->
                <div class="col-xs-12 col-lg-12 col-md-12  text-center">
                    <div class="co-section-title-2">
                        <h1>{{$models['fa_name']}}</h1>
                    </div>
                </div>
            </div>
           {{-- <div class="row">
                <div class="col-xs-12 col-lg-12 col-md-12  text-center">
                    <div class="co-isotop-filter-1 isotop-filter">
                        <button class="active" data-filter="*">All Work</button>
                        <button data-filter=".branding">Branding</button>
                        <button data-filter=".mobile-app">Mobile App</button>
                        <button data-filter=".web">Web</button>
                        <button data-filter=".photography">Photography</button>
                        <button data-filter=".illustration">Illustration</button>
                    </div>
                </div>
            </div>--}}
            <div class="co-isotop-grid-1 isotop-grid row" style="position: relative; height: 717.825px;">
                @foreach($products as $product)
                    <div class="co-isotop-item-1 isotop-item branding web col-xl-3 col-lg-6 col-md-6 col-12"
                         >
                        <div class="portfolio___single">
                            <img src="{{asset($product['main_image'])}}" alt="{{$product['en_name']}}">
                            <div class="content">
                                <div class="portfolio__icon">
                                    <a href="{{route('Products.show',$product['uuid'])}}">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a class=" image-popup" href="{{asset($product['main_image'])}}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="title">{{$product['fa_name']}}</div>
                            </div>
                        </div>
                    </div>

                @endforeach

              {{--  <div class="co-isotop-item-1 isotop-item mobile-app photography col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 379.8px; top: 0px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p3.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p3.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">There are many variations</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item illustration web col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 759.6px; top: 0px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p6.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p6.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">Coffee &amp; Cookie Time</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item photography branding col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 1139.4px; top: 0px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p8.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p8.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">passage of Lorem Ipsum</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item illustration mobile-app col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 0px; top: 239.275px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p8.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p8.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">looked up one of the more</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item branding web col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 379.8px; top: 239.275px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p2.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p2.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">If you are going to use</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item branding web col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 759.6px; top: 239.275px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p3.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p3.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">accompanied by English</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item mobile-app photography col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 1139.4px; top: 239.275px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p4.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p4.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">Coffee &amp; Cookie Time</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item illustration web col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 0px; top: 478.55px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p5.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p5.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">Coffee &amp; Cookie Time</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item photography branding col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 379.8px; top: 478.55px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p6.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p6.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">Coffee &amp; Cookie Time</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item illustration mobile-app col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 759.6px; top: 478.55px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p7.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p7.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">Coffee &amp; Cookie Time</div>
                        </div>
                    </div>
                </div>

                <div class="co-isotop-item-1 isotop-item branding web col-xl-3 col-lg-6 col-md-6 col-12 " style="position: absolute; left: 1139.4px; top: 478.55px;">
                    <div class="portfolio___single">
                        <img src="assets/img/portfolio/p8.jpg" alt="">
                        <div class="content">
                            <div class="portfolio__icon">
                                <a href="portfolio-details.html">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a class=" image-popup" href="assets/img/portfolio/p8.jpg">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="title">Coffee &amp; Cookie Time</div>
                        </div>
                    </div>
                </div>
--}}            </div>
        </div>
    </div>

@endsection
