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

    <div class="product-details-area hm-3-padding ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-img-content">
                        <div class="product-details-tab">
                            <div class="product-details-large tab-content">
                                @foreach($gallery as $key=>$g)
                                <div class="tab-pane {{$g->isMainImage ? 'active' : ''}}" id="pro-details{{$key}}">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{asset($g->imgPath)}}">
                                            <img src="{{asset($g->imgPath)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="product-details-small nav mt-12 product-dec-slider owl-carousel">
                                @foreach($gallery as $key=>$g)
                                <a  href="#pro-details{{$key}}">
                                    <img src="{{asset($g->imgPath)}}" alt="">
                                    @endforeach
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content" data-id="{{$product['id']}}"
                         data-name="{{$product['fa_name']}}" data-price="{{$price!=null ? $price->price : 0}}"
                         data-img="{{$product['main_image']}}">
                        <h2>{{$product['fa_name']}}</h2>
                        {{--<div class="product-rating">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <span> ( 01 Customer Review )</span>
                        </div>--}}
                        <div class="product-price">
                            {{--<span class="old">$22.00 </span>--}}
                            <span>{{$price!=null ? \App\Http\SettingHelper::ConvertToPersianNumber(number_format($price->price))." ".$price->currency->first()->name : ''}}</span>
                        </div>
                        <div class="product-overview">
                            <h5 class="pd-sub-title">{{__('POverview')}}</h5>
                            <ul>
                                    <li>
                                        <a href="javascript:void(0)" >{{__('PGroup')}} : </a>
                                        <a href="javascript:void(0)">{{$product['fa_group_name']}}</a>
                                    </li>
                                <li>
                                    <a href="javascript:void(0)" >{{__('PModel')}} : </a>
                                    <a href="javascript:void(0)">{{$product['fa_model_name']}}</a>
                                </li>

                            </ul>
                        </div>
                        <div class="product-color">
                            <h5 class="pd-sub-title">{{__('PColor')}}</h5>
                            <span style="background-color: {{$product['color']}}"></span>

                        </div>

                        <div class="quickview-plus-minus">
                            <div class="cart-plus-minus">
                                <input type="text" value="1" name="qtybutton" data-id="{{$product['id']}}"
                                       class="cart-plus-minus-box product-qty">
                            </div>
                            <div class="quickview-btn-cart">
                                <button class="btn-style cr-btn add-to-cart" data-id="{{$product['id']}}" href="#">
                                    <span>{{__('AddToCard')}}</span>
                                    <b style="top: -1.97501px; left: 91.4px;"></b>
                                </button>
                            </div>
                           {{-- <div class="quickview-btn-wishlist">
                                <a class="btn-hover cr-btn" href="#">
                                        <span>
                                            <i class="ion-ios-heart-outline"></i>
                                        </span>
                                    <b></b></a>
                            </div>--}}
                        </div>
                        <div class="product-categories">
                            <h5 class="pd-sub-title">{{__('features')}}</h5>
                            <ul>
                                @foreach($features as $feature)
                                    <li>
                                        <a href="javascript:void(0)" >{{$feature['feature_fa_name']}} : </a>
                                        @if(!$feature["isColor"])
                                            <a href="javascript:void(0)">{{$feature['fa_value']}}</a>
                                        @else
                                            @foreach($feature['colors'] as $color)
                                                <input disabled  class="color-input" type="color" value="{{$color}}" >

                                            @endforeach
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Product Description Review Area Start-->
    <div class="product-description-review-area pb-55">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-review-tab">
                        <!--Review And Description Tab Menu Start-->
                        <ul class="nav dec-and-review-menu">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#description">{{__('PDesc')}}</a>
                            </li>
                        </ul>
                        <!--Review And Description Tab Menu End-->
                        <!--Review And Description Tab Content Start-->
                        <div class="tab-content product-review-content-tab" id="myTabContent-4">
                            <div class="tab-pane fade active show" id="description">
                                <div class="single-product-description">
                                    {{$product['fa_desc']}}
                                </div>
                            </div>
                        </div>
                        <!--Review And Description Tab Content End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Description Review Area Start-->
@endsection
