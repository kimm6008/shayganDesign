<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="MainPageCss/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('css/MainPageCss/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/animate.css')}} ">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/material-design-iconic-font.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/tippy.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/magnific-popup.css')}}">
    <script src="{{asset('js/MainPageJs/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<div class="wrapper">
    <!-- header start -->
    <header>
        <div class="header_area hdr_1 hdr_2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-auto col-md-2 col-12">
                        <div class="logo_area">
                            <a href="/"><img style="width: 151px;height: 80px" src="{{asset('images/fa_logo.png')}}" alt=""></a>
                        </div>
                    </div>
                   @include('menu')

                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    <!-- Slider Start -->
    @include('slider')
    <!-- Slider End -->
    <!-- Page Content Start -->
    @yield('Content')
    <!-- Page Content End  -->
    <footer>
        @include('footer')
    </footer>
    <!-- modal -->
    {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close" aria-hidden="true"></span>
                    </button>
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img src="MainPageCss/img/quick-view/l1.jpg" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal2" role="tabpanel">
                                    <img src="MainPageCss/img/quick-view/l2.jpg" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal3" role="tabpanel">
                                    <img src="MainPageCss/img/quick-view/l3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="quick-view-list nav" role="tablist">
                            <a class="active" href="#modal1" data-bs-toggle="tab" role="tab" aria-selected="true">
                                <img src="MainPageCss/img/quick-view/s1.jpg" alt="">
                            </a>
                            <a href="#modal2" data-bs-toggle="tab" role="tab" aria-selected="false" >
                                <img src="MainPageCss/img/quick-view/s2.jpg" alt="">
                            </a>
                            <a href="#modal3" data-bs-toggle="tab" role="tab" aria-selected="false">
                                <img src="MainPageCss/img/quick-view/s3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3>Handcrafted Supper Mug</h3>
                            <div class="price">
                                <span class="new">$90.00</span>
                                <span class="old">$120.00  </span>
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="ion-ios-star red-star"></i>
                                    <i class="ion-ios-star red-star"></i>
                                    <i class="ion-ios-star red-star"></i>
                                    <i class="ion-ios-star red-star"></i>
                                    <i class="ion-ios-star red-star"></i>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">900</option>
                                        <option value="">700</option>
                                    </select>
                                </div>
                                <div class="select-option-part">
                                    <label>Color*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">orange</option>
                                        <option value="">pink</option>
                                        <option value="">yellow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="quickview-plus-minus">
                                <div class="cart-plus-minus">
                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                </div>
                                <div class="quickview-btn-cart">
                                    <a class="btn-style cr-btn" href="#"><span>add to cart</span></a>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover cr-btn" href="#"><span><i class="ion-ios-heart-outline"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</div>

<!-- all js here -->
<script src="{{asset('js/jquery/jquery.js')}}"></script>
<script src="{{asset('js/MainPageJs/bootstrap.min.js')}}"></script>
<script src="{{asset('js/MainPageJs/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/MainPageJs/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/MainPageJs/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/MainPageJs/waypoints.min.js')}}"></script>
<script src="{{asset('js/MainPageJs/tippy.min.js')}}"></script>
{{--<script src="{{asset('js/MainPageJs/ajax-mail.js')}}"></script>--}}
<script src="{{asset('js/MainPageJs/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/MainPageJs/plugins.js')}}"></script>
<script src="{{asset('js/MainPageJs/main.js')}}"></script>
</body>
</html>
