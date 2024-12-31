@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li><a href="{{route('ProductGroups.index')}}">گروه بندی محصولات</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route("ProductGroupFeature.store")}}" method="post" >
        @csrf
        <input type="hidden" name="id"  value="{{$product_group->uuid}}">
    <x-admin-form.navbar-header  :multilang="false" />
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>انتخاب</th>
                <th>عنوان مشخصه</th>

            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($features as $feature)
                    <tr>
                        <td><input type="checkbox" name="features[]" value="{{$feature->id}}"
                                {{$product_group_feature->contains($feature->id) ? 'checked' : ''}} /></td>
                        <td>{{$feature->feature_with_lang_filter(\App\Http\SettingHelper::getFaLangID())->first()->name}}</td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>
    </div>
        <x-admin-form.submit-button/>
    </form>
@endsection
