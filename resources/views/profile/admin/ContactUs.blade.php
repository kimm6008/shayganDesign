@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{$contact_us != null
                                    ? route('ContactUs.update',$contact_us['id'])
                                        : route('ContactUs.store')}}" class="form-horizontal">
        @csrf
        @if($contact_us != null) @method('PUT') @endif

        <x-admin-form.input-text name="phone" value="{{$contact_us?->Phone}}" id="phone" label="شماره تماس" faicon="fa-phone" required="true" />
        <x-admin-form.input-numeric name="mobile" maxlength="11" value="{{$contact_us?->Mobile}}" id="mobile" label="شماره همراه" required="true" faicon="fa-phone" />
        <x-admin-form.input-text name="fax" id="fax" label="فکس" value="{{$contact_us?->Fax}}" faicon="fa-fax" />
        <x-admin-form.input-text name="email" id="email" label="ایمیل" value="{{$contact_us?->Email}}" faicon="fa-email" />
        <x-admin-form.input-text name="instagram" id="instagram" label="اینستاگرام" value="{{$contact_us?->Instagram}}" faicon="fa-instagram" />
        <x-admin-form.input-text name="facebook" id="facebook" label="فیسبوک" value="{{$contact_us?->Facebook}}" faicon="fa-facebook" />
        <x-admin-form.input-text name="telegram" id="telegram" label=" کانال تلگرام" value="{{$contact_us?->Telegram}}" faicon="fa-telegram" />
        <x-admin-form.input-text name="whatsapp" id="whatsapp" label="Whatsapp" value="{{$contact_us?->Whatsapp}}" faicon="fa-whatsapp" />
        <x-admin-form.input-text name="twitter" id="twitter" label="X(توییتر سابق)" value="{{$contact_us?->twitter}}" faicon="fa-twitter" />
        <x-admin-form.input-numeric name="postalcode" id="postalcode" label="کد پستی" value="{{$contact_us?->PostalCode}}" faicon="fa-postalcode" />
        <x-admin-form.image-uploader name="pdf" id="pdf" label="فایل جهت ارسال رزومه" />

        <x-admin-form.input-textarea name="fa_address" id="fa_address" label="آدرس(فارسی)"
                                     value="{{$contact_us != null > 0
                                            ? $contact_us->translation()->where('languages_id',\App\Http\SettingHelper::getFaLangID())->first()->address : null}}" />
        <x-admin-form.input-textarea direction="ltr" name="en_address" id="en_address" label="آدرس(انگلیسی)"
                                     value="{{$contact_us != null > 0 ? $contact_us->translation()->where('languages_id',\App\Http\SettingHelper::getEnLangID())->first()->address : null}}" />

        {{--<x-admin-form.input-textarea name="fa_aboutus" id="fa_aboutus" label="درباره ما(فارسی)" :fa_ckeditor="true" value="{{$contactus[0]['fa_about_us']}}" />
        <x-admin-form.input-textarea direction="ltr" name="en_aboutus" id="en_aboutus" label="درباره ما(انگلیسی)" :en_ckeditor="true" value="{{$contactus[0]['en_about_us']}}" />
       --}}
        <x-admin-form.submit-button/>

    </form>

@endsection

