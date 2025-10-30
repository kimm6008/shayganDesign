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
            @if(!$feature['isColor'])
        @foreach($languages as $lang)

                <x-admin-form.input-text label="{{$feature['fa_name'].'('.$lang->lang_name.')'}}"
                                         id="{{$lang->lang_code.'_'.$feature['feature_id']}}"
                                         name="{{$lang->lang_code.'_'.$feature['feature_id']}}"
                                         value="{{$feature_value->count()==0 || !$feature_value->has($feature['feature_id']) ? '' : $feature_value[$feature['feature_id']][$lang->lang_code.'_value']}}"
                                         placeholder=""  :readonly="false" :required="true"
                                         :disabled="false" faicon="fa-star" direction="{{$lang->lang_dir}}"
                />

        @endforeach
            @else
                <div id="colorContainer" >
                    <div class="input-group-addon col-2 col-lg-2">{{$feature['fa_name']}}</div>
                    @if($feature_value->has($feature['feature_id']) && array_count_values($feature_value[$feature['feature_id']]['colors'])>0)
                        @foreach($feature_value[$feature['feature_id']]['colors'] as $color )
                            <div class="color-row">

                                <input  class="color-input" type="color" value="{{$color}}" name="colors{{$feature['feature_id']}}[]">
                            </div>
                        @endforeach
                    @else
                    <div class="color-row">

                        <input  class="color-input" type="color" name="colors{{$feature['feature_id']}}[]">
                    </div>

                    @endif
                    <button type="button" class="add-btn" onclick="addColor({{$feature['feature_id']}})">+</button>
                </div>
            @endif
    @endforeach
        <x-admin-form.submit-button/>
    </form>
@endsection
<style>
    .color-row {
        display: inline;
        align-items: center;
        margin-bottom: 10px;
    }
    .color-input {
        width: 60px;
        height: 40px;
        border: none;
        margin-left: 10px;
        cursor: pointer;
    }
    .add-btn {
        padding: 8px 14px;
        font-size: 20px;
        border-radius: 6px;
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
    }
    .add-btn:hover {
        background-color: #218838;
    }

</style>
