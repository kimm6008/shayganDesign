@extends('app')
@section('Content')
    <div class="title-breadcrumbs">
        <div class="title-breadcrumbs-inner">
            <div class="container">
                <nav class="woocommerce-breadcrumb">
                    <a href="/">{{__('HOME')}}</a>
                    <span class="separator">/</span> {{__('ABOUTUS')}}
                </nav>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area End -->
    <div class="about__us_page_area">
        <div class="container-fluid p-0">
            <div class="row g-0 align-items-center">
                <div class="col-xl-6 col-lg-12 d-none d-xl-block">
                    <div class="banner_h2__left_image">
                        <img alt="" src="{{asset('images/fa_logo.png')}}">
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12">
                    <div class="banner_h2_Right_text  about-us-wrapper">
                        <div class="wpb_wrapper">
                            <h3>ما سازنده مدرن ترین<br> منسوجات چوبی هستیم</h3>
                            <p> {!! $aboutus->first()->about_us !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about us area End -->
@endsection
