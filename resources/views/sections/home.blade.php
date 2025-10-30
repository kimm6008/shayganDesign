{{--
@extends('app')
@section('Content')
<!-- banner area one -->
<div class="banner__h2_area nrb__1_s pt-20">
    <div class="container-fluid">
        <div class="row">
@foreach($productGroups as $key=>$productGroup)

                    <div class="col-lg-6 col-md-12 col-sm-12  col-xs-12">

                            <div class="banner_h2_Right_text ">
                                <div class="wpb_wrapper">
                                    <div class="banner_h2__left_image lft_to_right">
                                        <img src="{{asset($productGroup->imgPath)}}" alt="{{$productGroup->translation->first()->name}}">
                                    </div>
                                    <h3>{{$productGroup->translation->first()->name}}</h3>
                                    <p>{{$productGroup->translation->first()->description}}</p>
                                    <p>
                                        <a class="nrb_btn" href="{{route('ViewProductGroup',$productGroup->uuid)}}">{{__('shop_now')}}</a>
                                    </p>
                                </div>
                            </div>
                        --}}
{{--@else
                            <div class="banner_h2__left_image lft_to_right">
                                <img src="{{asset($productGroup->imgPath)}}" alt="{{$productGroup->translation->first()->name}}">
                            </div>--}}{{--




                    </div>

                   --}}
{{-- <div class=" col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        @if(($key+1)%2==1)
                            <div class="banner_h2__left_image lft_to_right">
                                <img src="{{asset($productGroup->imgPath)}}" alt="{{$productGroup->translation->first()->name}}">
                            </div>
                        @else
                            <div class="banner_h2_Right_text right_text_to_left text-right">
                                <div class="wpb_wrapper">
                                    <h3>{{$productGroup->translation->first()->name}}</h3>
                                    <p>{{$productGroup->translation->first()->description}}</p>
                                    <p>
                                        <a class="nrb_btn" href="#">{{__('shop_now')}}</a>
                                    </p>
                                </div>
                            </div>
                        @endif

                    </div>--}}{{--


@endforeach
        </div>
    </div>
</div>
<!-- product start -->
<div class="product-area pb-65 pt-100 product-padding">
    <div class="container">
        <div class="section-title-2 text-center mb-25">
            <h4 class="m-0">{{__('Featured_Products')}}</h4>
        </div>

        <div class="row">
            <div class="product-slider-active owl-carousel col-12">
                @foreach($selective_products as $key=>$sproduct)
                    <div class="product-row-{{$key}}">
                        <div class="product-wrapper mb-35">
                            <div class="product-img">
                                <a href="{{route('Products.show',$sproduct->uuid)}}">
                                    <img alt="{{$sproduct->translation->first()->name}}" src="{{asset($sproduct->gallery->first()->imgPath)}}">
                                </a>
                              --}}
{{--  <div class="product-action-2">
                                    <a href="#" title="Add to Compare" class="action-plus-2 tooltip">
                                        <i class="zmdi zmdi-refresh"></i>
                                    </a>
                                    <a href="#" title="Add to Wishlist" class="action-plus-2 tooltip">
                                        <i class="zmdi zmdi-favorite-outline"></i>
                                    </a>
                                    <a href="#"  title="Quick View" data-bs-target="#exampleModal" data-bs-toggle="modal" class="action-plus-2 tooltip">
                                        <i  class="zmdi zmdi-search"></i>
                                    </a>
                                    <a href="#"  title="Add To Cart" class="action-plus-2 tooltip">
                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                    </a>
                                </div>
                                <div class="rating-box">
                                    <a href="#"  title="1 star"><i class="far fa-star"></i></a>
                                    <a href="#"  title="2 star"><i class="far fa-star"></i></a>
                                    <a href="#" title="3 star"><i class="far fa-star"></i></a>
                                    <a href="#" title="4 star"><i class="far fa-star"></i></a>
                                    <a href="#" title="5 star"><i class="far fa-star"></i></a>
                                </div>--}}{{--

                            </div>
                            <div class="product-content text-center">
                                <h4><a href="{{route('Products.show',$sproduct->uuid)}}">{{$sproduct->translation->first()->name}}</a></h4>
                                --}}
{{--<div class="product-price-2">
                                    <div class="price-box">
                                        <del><span class="amount"><span class="Price-currencySymbol">$</span>50.00</span></del>
                                        <ins><span class="amount"><span class="Price-currencySymbol">$</span>75.00</span></ins>
                                    </div>
                                </div>--}}{{--

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Home Blog area start -->
--}}
{{--<div class="home_blog_area hm2_blog_area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="section-title-2 text-center mb-25">
                    <h2 class="m-0">From The Blog</h2>
                    <p>Update the latest article to help customers capture the most authentic of the operation of the store.</p>
                </div>
            </div>
            <div class="blog_slide_active owl-carousel">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">01 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Blog image post</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">05 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Post with Gallery</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">01 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Blog image post</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">01 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Blog image post</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">05 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Post with Gallery</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">01 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Blog image post</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">01 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Blog image post</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">01 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Blog image post</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">05 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Post with Gallery</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="sngl__blog">
                        <div class="post-wrapper">
                            <div class="post-info">
                                      <span class="post-date large">
                                          <span class="month">Mar </span>
                                          <span class="day">01 </span>
                                          <span class="year">2018 </span>
                                      </span>
                                <h3 class="post-title"><a tabindex="0" href="#">Blog image post</a></h3>
                                <div class="post-meta">
                                    <p class="post-author">Posted by : <a tabindex="0" href="#">admin</a></p>
                                    <p class="post-date"> <strong>Date : </strong>01/12/2018</p>
                                </div>
                                <div class="post-excerpt">
                                    <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                </div>
                                <a  class="readmore" href="#"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}{{--

@endsection
--}}
