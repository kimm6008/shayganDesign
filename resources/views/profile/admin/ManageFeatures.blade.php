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
                                     placeholder="" value=""
                                     :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
        @endforeach
        <x-admin-form.submit-button/>
    </form>
    <x-admin-form.navbar-header/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>

                <th>عنوان گروه</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($features as $feature)
                    <tr>
                        <td>{{$feature->feature_with_lang_filter(\App\Http\SettingHelper::getFaLangID())->first()->name}}</td>

                        <td>ویرایش</td>
                        <td>حذف</td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>
        <x-admin-form.en-tab-view>
            <x-slot:headerData>

                <th>Title</th>

                <th>Edit</th>
                <th>Delete</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($features as $feature)
                    <tr>

                        <td>{{$feature->feature_with_lang_filter(\App\Http\SettingHelper::getEnLangID())->first()->name}}</td>

                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.en-tab-view>
    </div>
@endsection
