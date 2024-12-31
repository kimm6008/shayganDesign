@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li><a href="{{route('Products.index')}}">محصولات</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" action="{{route('ProductFeatureValue.store')}}">
        @csrf
        <input type="hidden" name="ProductUuid" value="{{$product->uuid}}">

    @foreach($features as $feature)
        @foreach($languages as $lang)
                <x-admin-form.input-text label="{{$feature['fa_name'].'('.$lang->lang_name.')'}}"
                                         id="{{$lang->lang_code.'_'.$feature['feature_id']}}"
                                         name="{{$lang->lang_code.'_'.$feature['feature_id']}}"
                                         value="{{$feature_value->count()==0 ? '' : $feature_value[$feature['feature_id']][$lang->lang_code.'_value']}}"
                                         placeholder=""  :readonly="false" :required="true"
                                         :disabled="false" faicon="fa-star" direction="{{$lang->lang_dir}}"
                />
        @endforeach

    @endforeach
        <x-admin-form.submit-button/>
    </form>
@endsection
