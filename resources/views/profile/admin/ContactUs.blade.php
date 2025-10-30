@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" action="{{route('UpdateContactUs')}}" class="form-horizontal">
        @csrf
        <x-admin-form.input-textarea name="fa_aboutus" id="fa_aboutus" label="درباره ما(فارسی)" :fa_ckeditor="true" value="{{$contactus[0]['fa_about_us']}}" />
        <x-admin-form.input-textarea direction="ltr" name="en_aboutus" id="en_aboutus" label="درباره ما(انگلیسی)" :en_ckeditor="true" value="{{$contactus[0]['en_about_us']}}" />
        <x-admin-form.input-textarea name="fa_contactus" id="fa_contactus" label="تماس با ما(فارسی)" :fa_ckeditor="true" value="{{$contactus[0]['fa_contact_us']}}" />
        <x-admin-form.input-textarea direction="ltr" name="en_contactus" id="en_contactus" label="درباره ما(انگلیسی)" :en_ckeditor="true" value="{{$contactus[0]['en_contact_us']}}" />

        <x-admin-form.submit-button/>

    </form>

@endsection

