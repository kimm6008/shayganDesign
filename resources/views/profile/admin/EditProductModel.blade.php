@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li><a href="{{route('ProductModels.index')}}">مدیریت مدل های محصول</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route("ProductModels.update",$product_model->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-admin-form.input-checkbox name="enable" id="enable" label="فعال" :checked="$product_model->enable" />
        <x-admin-form.image-uploader name="img" id="img" label="عکس مدل" value="{{$product_model->imgPath}}" />
        <x-admin-form.input-combo-box label="گروه مدل" id="product_group_id" name="product_group_id" required="true"
                                      data_caption="name" faicon="fa-star" :selected_value="$product_model->product_group_id"
                                      data_id="product_group_id" :info="$product_groups_tr"  />
        @foreach($languages as $value)
            <x-admin-form.input-text id="{{$value->lang_code}}_name" name="{{$value->lang_code}}_name" label="عنوان مدل({{$value->lang_name}})"
                                     placeholder="" value="{{$product_model->product_model_translation()->whereLanguagesId($value->id)->first()->name}}"
                                     :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
        @endforeach
        <x-admin-form.submit-button/>
    </form>
@endsection
