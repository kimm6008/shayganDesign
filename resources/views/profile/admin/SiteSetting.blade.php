@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" action="{{route('SiteSettingUpdate')}}" class="form-horizontal">
        @csrf
        <x-admin-form.input-text name="fa_sitetitle" id="fa_sitetitle" label="عنوان سایت(فارسی)"
                 value="{{$setting[0]['fa_site_title']}}"  :required="true" :readonly="false"
                                 faicon="fa-dollar" :disabled="false" placeholder=""   />
        <x-admin-form.input-text direction="ltr" name="en_sitetitle" id="en_sitetitle" label="عنوان سایت(انگلیسی)"
                                  value="{{$setting[0]['en_site_title']}}" :required="true" :readonly="false"
                                 faicon="fa-dollar" :disabled="false" placeholder=""   />
        <x-admin-form.input-textarea name="fa_sitedesc" id="fa_sitedesc" label="توضیحات سایت(فارسی)"
                                     value="{{$setting[0]['fa_site_desc']}}" :fa_ckeditor="true"/>
        <x-admin-form.input-textarea direction="ltr" name="en_sitedesc" id="en_sitedesc" label="توضیحات سایت(انگلیسی)"
                                     value="{{$setting[0]['en_site_desc']}}" :en_ckeditor="true"/>

        <x-admin-form.submit-button/>

    </form>

@endsection

