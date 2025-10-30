@extends('app')
@section('Content')
    <div class="title-breadcrumbs">
        <div class="title-breadcrumbs-inner">
            <div class="container">
                <nav class="woocommerce-breadcrumb">
                    <a href="/">{{__('HOME')}}</a>
                    <span class="separator">/</span> {{__('ProductGroups')}}
                </nav>
            </div>
        </div>
    </div>
    <div class="co-portfolio-section-1 pt-50 pb-70">
        <div class="container-fluid">
            <div class="row">
                <!--Section Title-->
                <div class="col-xs-12 col-lg-12 col-md-12  text-center ">
                    <div class="co-section-title-2">
                        <h1>{{$group['fa_name']}}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-lg-12 col-md-12  text-center">
                    <div class="co-isotop-filter-1 isotop-filter">
                        <button class="active" data-filter="*">{{__("ALLModels")}}</button>
                    @foreach($group_models->product_models as $model)
                        <button data-filter=".{{$model->uuid}}">{{$model->product_model_translation()->first()->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="co-isotop-grid-1 isotop-grid row" style="position: relative; height: 717.825px;">
                @foreach($group_models->product_models as $model)
                    <div class="co-isotop-item-1 isotop-item {{$model->uuid}} web col-xl-3 col-lg-6 col-md-6 col-12"
                         >
                        <div class="portfolio___single">
                            <img src="{{asset($model->imgPath)}}" alt="{{$model->product_model_translation()->first()->name}}">
                            <div class="content">
                                <div class="portfolio__icon">
                                    <a href="{{route('ViewProductModel',$model->uuid)}}">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a class=" image-popup" href="{{asset($model->imgPath)}}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                                <div class="title">{{$model->product_model_translation()->first()->name}}</div>
                            </div>
                        </div>
                    </div>

                @endforeach
        </div>
    </div>

@endsection
