@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route("ProductGroups.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-admin-form.image-uploader name="img" id="img" label="عکس گروه" :required="true"/>
        <x-admin-form.input-numeric name="DeliveryDuration" id="DeliveryDuration" label="تعداد روز تحویل"
                                    :required="true"/>
        @foreach($languages as $value)
            <x-admin-form.input-text id="{{$value->lang_code}}_name" name="{{$value->lang_code}}_name"
                                     label="عنوان گروه({{$value->lang_name}})"
                                     placeholder="" value=""
                                     :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
        @endforeach
        <x-admin-form.submit-button/>
    </form>
    <x-admin-form.navbar-header/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>عکس گروه</th>
                <th>عنوان گروه</th>
                <th>زمان تحویل</th>
                <th>وضعیت</th>
                <th>تعیین ویژگی ها</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($product_groups as $product_group)
                    <tr>
                        <td><img src="{{asset($product_group->imgPath)}}" width="100" height="100"></td>
                        <td>{{$product_group->product_group_with_lang_filter(\App\Http\SettingHelper::getFaLangID())->first()->name}}</td>
                        <td>{{$product_group->DeliveryDuration}}</td>
                        <td>{{$product_group->enable==1 ? "فعال" : "غیر فعال"}}</td>
                        <td><x-nav-link :href="route('ProductGroupFeature.index','id='.$product_group->uuid)" >تعیین مشخصات گروه محصول</x-nav-link></td>
                        <td>ویرایش</td>
                        <td>حذف</td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>
        <x-admin-form.en-tab-view>
            <x-slot:headerData>
                <th>image</th>
                <th>Title</th>
                <th>Delivery duration</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($product_groups as $product_group)
                    <tr>
                        <td><img src="{{asset($product_group->imgPath)}}" width="100" height="100"></td>
                        <td>{{$product_group->product_group_with_lang_filter(\App\Http\SettingHelper::getEnLangID())->first()->name}}</td>
                        <td>{{$product_group->DeliveryDuration}}</td>
                        <td>{{$product_group->enable==1 ? "فعال" : "غیر فعال"}}</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.en-tab-view>
    </div>
@endsection
