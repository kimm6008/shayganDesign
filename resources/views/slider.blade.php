<div class="slider-area slider_s_2">
    <div class="slider-active owl-carousel">
        @foreach($slideshows as $key=>$slideshow)
            <div class="single-slider slider-1 gray-bg" style="background-image:
        url({{$slideshow->product_gallery_id!=null ? asset($slideshow->productGallery->imgPath) : asset($slideshow->imgPath)}})">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="slider-content slider-animated-{{$key}}">
                                <h2 class="animated">
                                    {{$slideshow->product_gallery_id!=null ? $slideshow->productGallery->product->translation->first()->name : ""}}
                                </h2>
                                <p class="animated">
                                    {{$slideshow->product_gallery_id!=null ? $slideshow->productGallery->product->translation->first()->description
                                        : $slideshow->translation->first()->description}}

                                </p>
                                @if($slideshow->product_gallery_id!=null )
                                    <a class="slider-btn animated" href="{{route('Products.show',$slideshow->productGallery->product->uuid)}}">{{__('shop_now')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

{{--
        <div class="single-slider slider-1 gray-bg"
             style="background-image: url(MainPageCss/img/slider/home2-slider1.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="slider-content slider-animated-2">
                            <h2 class="animated">ROUNDLAB WOODEN CHAIR.</h2>
                            <p class="animated">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                            <a class="slider-btn animated" href="shop.html">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
--}}
    </div>
</div>
