<div class="col-xl-8 col-lg-auto col-md-8 col-12">
    <div class="main_menu_area">
        <div class="main-menu">
            <nav>
                <ul style="direction: rtl">
                    <li class="active"><a href="/">{{__('HOME')}}</a>
                    </li>
                    <li><a href="#">{{__('PRODUCTS')}} <i class="ion-ios-arrow-down"></i></a>
                        <ul class="mega-menu">
                            @foreach($productGroups as $productGroup)
                                <li>
                              <ul>
                                  <li class="mega-menu-title">
                                     <a style="font-weight: bold" href="{{route('ViewProductGroup',$productGroup->uuid)}}">
                                      {{$productGroup->translation->first()->name}}</a></li>
                                  @if($productGroup->product_models->isNotEmpty())
                                      @foreach($productGroup->product_models as $model)
                                          <li><a href="{{route('ViewProductModel',$model->uuid)}}">{{$model->product_model_translation->first()->name}}</a></li>
                                      @endforeach

                                  @endif

                              </ul>
                          </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('login')}}">{{__('LOGIN')}}/{{__('Register')}}</a></li>
                    <li><a href="{{route('AboutUs')}}">{{__('ABOUTUS')}}</a></li>
                    <li><a href="#">{{__('BLOG')}}</a></li>
                    <li><a href="{{route('MainPageContactUs')}}">{{__('CONTACTUS')}}</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="col-xl-2 col-lg-auto col-md-2 col-12">
    <div class="header-site-icon">
        <div class="header-search same-style">
            <div class="sidebar-trigger-search">

                <span class="zmdi zmdi-search"></span>
                <div class="search__form">
                    <form>
                        <div class="form-search">
                            <input type="search" placeholder="Enter your search..." value="" class="input-text" id="search">
                            <button>
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('cart')
    </div>
</div>

<div class="mobile-menu-area ">
    <div class="mobile-menu">
        <nav id="mobile-menu-active">
            <ul class="menu-overflow">
                <li class="active"><a href="/">{{__('HOME')}}</a>
                </li>
                <li><a href="#">{{__('PRODUCTS')}} <i class="ion-ios-arrow-down"></i></a>
                    <ul class="mega-menu">
                        @foreach($productGroups as $productGroup)
                            <li>
                                <ul>
                                    <li class="mega-menu-title">{{$productGroup->translation->first()->name}}</li>
                                    @if($productGroup->product_models->isNotEmpty())
                                        @foreach($productGroup->product_models as $model)
                                            <li><a href="#">{{$model->product_model_translation->first()->name}}</a></li>
                                        @endforeach

                                    @endif

                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('AboutUs')}}">{{__('ABOUTUS')}}</a></li>



                <li><a href="#">{{__('BLOG')}}</a></li>



                <li><a href="">{{__('CONTACTUS')}}</a></li>
            </ul>
        </nav>
    </div>
</div>
