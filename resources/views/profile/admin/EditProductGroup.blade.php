@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li><a href="{{route('ProductGroups.index')}}">مدیریت گروه بندی ها</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route("ProductGroups.update",$product_group['uuid'])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="uuid" value="{{$product_group['uuid']}}">
        <x-admin-form.input-checkbox name="enable" id="enable" label="فعال" :checked="$product_group['enable']" />
        <x-admin-form.image-uploader name="img" id="img" label="عکس گروه"  value="{{$product_group['imgPath']}}"/>
        <x-admin-form.input-numeric name="DeliveryDuration" id="DeliveryDuration" label="تعداد روز تحویل"
                            value="{{old('DeliveryDuration',$product_group['DeliveryDuration'])}}"        :required="true"/>

        @foreach($languages as $value)
            <x-admin-form.input-text id="{{$value->lang_code}}_name" name="{{$value->lang_code}}_name"
                                     label="عنوان گروه({{$value->lang_name}})"
                                     placeholder="" value="{{$product_group[$value->lang_code.'_name']}}"
                                     :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
            <x-admin-form.input-textarea id="{{$value->lang_code}}_desc" name="{{$value->lang_code}}_desc" label="توضیحات ({{$value->lang_name}})"
                                         :required="true" :readonly="false" :disabled="false" faicon="fa-star" direction="{{$value->lang_dir}}"
                                         value="{{$product_group[$value->lang_code.'_desc']}}"
            />
        @endforeach
        <x-admin-form.submit-button/>
    </form>
@endsection
