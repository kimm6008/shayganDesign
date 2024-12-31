@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{route('Products.store')}}" class="form-horizontal">
        @csrf
        <x-admin-form.input-combo-box label="گروه محصول" id="product_group_id" name="product_group_id" required="true"
                                      data_caption="name" faicon="fa-info" data_id="product_group_id" :info="$product_groups"  />
        <x-admin-form.input-combo-box label="خانواده محصول" id="product_model_id" name="product_model_id"
                                      data_caption="name" faicon="fa-info" data_id="product_group_id" :info="$group_models"  />
        <x-admin-form.image-uploader name="img" id="img" label="عکس اصلی" :required="true" />
        @foreach($languages as $value)
            <x-admin-form.input-text id="{{$value->lang_code}}_name" name="{{$value->lang_code}}_name" label="عنوان محصول({{$value->lang_name}})"
                                     placeholder="" value="" :required="true" :readonly="false" :disabled="false" faicon="fa-star"
                                     direction="{{$value->lang_dir}}"
            />
            <x-admin-form.input-textarea id="{{$value->lang_code}}_desc" name="{{$value->lang_code}}_desc" label="توضیحات ({{$value->lang_name}})"
                                         :required="true" :readonly="false" :disabled="false" faicon="fa-star" direction="{{$value->lang_dir}}"
            />
        @endforeach
        <x-admin-form.submit-button/>
    </form>

@endsection
