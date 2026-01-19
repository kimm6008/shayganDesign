@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{$about_us != null
                                    ? route('AboutUs.update',$about_us['id'])
                                        : route('AboutUs.store')}}" class="form-horizontal">
    @csrf
    @if($about_us != null) @method('PUT') @endif
        <x-admin-form.image-uploader name="video"  id="video" label="فیلم معرفی" />
        <video width="320" height="180" controls>
            <source src="{{$about_us?->video}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @foreach($languages as $lang)

            <x-admin-form.input-textarea name="{{$lang->lang_code}}_first_page_content"
                                         id="{{$lang->lang_code}}_first_page_content"
                                         value="{{$about_us?->translation()->where('languages_id',$lang->id)->first()->first_page_content}}"
                                         label="متن صفحه اصلی( {{$lang->lang_name}})" direction="{{$lang->lang_dir}}"
                                         required="true"       />


            <x-admin-form.input-textarea name="{{$lang->lang_code}}_vision"
                                         id="{{$lang->lang_code}}_vision"
                                         value="{{$about_us?->translation()->where('languages_id',$lang->id)->first()->vision}}"
                                         label="چشم انداز( {{$lang->lang_name}})" direction="{{$lang->lang_dir}}"
                                         required="true"       />
            <x-admin-form.input-textarea name="{{$lang->lang_code}}_mission"
                                         id="{{$lang->lang_code}}_mission"
                                         value="{{$about_us?->translation()->where('languages_id',$lang->id)->first()->mission}}"
                                         label="ماموریت( {{$lang->lang_name}})" direction="{{$lang->lang_dir}}"
                                         required="true"       />
            <x-admin-form.input-textarea  name="{{$lang->lang_code}}_content"
                                         id="{{$lang->lang_code}}_content"
                                          value="{{$about_us?->translation()->where('languages_id',$lang->id)->first()->content}}"
                                          label="درباره ما( {{$lang->lang_name}})" direction="{{$lang->lang_dir}}"
                                         required="true"
                                          :fa_ckeditor="$lang->lang_code === 'fa'"
                                          :en_ckeditor="$lang->lang_code === 'en'"
                                                 />
        @endforeach
        <x-admin-form.submit-button/>
@endsection
