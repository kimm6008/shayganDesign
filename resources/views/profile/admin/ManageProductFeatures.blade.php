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
                    <x-admin-form.input-text label="{{$feature['feature_fa_name'].' ('.$lang->lang_name.')'}}"
                                             id="{{$lang->lang_code.'_'.$feature['featureID']}}"
                                             name="{{$lang->lang_code.'_'.$feature['featureID']}}"
                                             value="{{ $feature_value->count() > 0 ?
                                                            $feature_value->where('featureID',$feature['featureID'])->first()[$lang->lang_code.'_value']
                                                            : null
                                                     }}"
                                             placeholder="" :readonly="false" :required="true"
                                             :disabled="false" faicon="fa-star" direction="{{$lang->lang_dir}}"
                    />
                @endforeach
            @else
                <div id="colorContainer">
                    <div class="input-group-addon col-2 col-lg-2">{{$feature['feature_fa_name']}}</div>
                    @if($feature != null && $feature_value->where('featureID',$feature['featureID'])->count()>0)
                        @foreach($feature_value->where('featureID',$feature['featureID'])->first()['colors'] as $color )
                            <div class="color-row">
                                <input class="color-input" type="color" value="{{$color}}"
                                       name="colors{{$feature['featureID']}}[]">
                            </div>
                        @endforeach
                    @else
                        <div class="color-row">
                            <input class="color-input" type="color" name="colors{{$feature['featureID']}}[]">
                        </div>

                    @endif
                    <button type="button" class="add-btn" onclick="addColor({{$feature['featureID']}})">+</button>
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
