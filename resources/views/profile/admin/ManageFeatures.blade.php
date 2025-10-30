@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route("Feature.store")}}" method="post" >
        @csrf
        @foreach($languages as $value)
            <x-admin-form.input-text id="{{$value->lang_code}}_name" name="{{$value->lang_code}}_name" label="عنوان مشخصه({{$value->lang_name}})"
                                     placeholder="" value="" direction="{{$value->lang_dir}}"
                                     :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
        @endforeach
        <x-admin-form.input-checkbox id="isColor" name="isColor" label="ویژگی از نوع رنگ است" />
        <x-admin-form.submit-button/>
    </form>
    <x-admin-form.navbar-header/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>عنوان گروه</th>
                <th>ویژگی از نوع رنگ است</th>
                <th>ویرایش</th>
               
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($features as $feature)
                    <tr id="row-{{ $feature->id }}">
                        <td id="fa_name_{{$feature->id}}">{{$feature->feature_with_lang_filter(\App\Http\SettingHelper::getFaLangID())->first()->name}}</td>
                        <td id="isColor_{{$feature->id}}">{{$feature->isColor ? 'x' : ""}}</td>
                        <td><a href="#" data-id="{{$feature->id}}"  class="showfeatureeditform">ویرایش</a></td>

                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>
        <x-admin-form.en-tab-view>
            <x-slot:headerData>
                <th>Title</th>
                <th>Is Color</th>
                <th>Edit</th>

            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($features as $feature)
                    <tr id="row-{{ $feature->id }}">
                        <td id="en_name_{{$feature->id}}">{{$feature->feature_with_lang_filter(\App\Http\SettingHelper::getEnLangID())->first()->name}}</td>
                        <td>{{$feature->isColor ? 'x' : ""}}</td>
                        <td>Edit</td>

                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.en-tab-view>
    </div>
    <x-dialog id="show_feature_editform" title="ویرایش ویژگی" div-class="div_showeditfeatureform" />
@endsection
