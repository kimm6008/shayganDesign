@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route("ProductModels.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-admin-form.image-uploader name="img" id="img" label="عکس مدل" :required="true" />
        <x-admin-form.input-combo-box label="گروه مدل" id="product_group_id" name="product_group_id" required="true"
                                      data_caption="name" faicon="fa-star" data_id="product_group_id" :info="$product_groups_tr"  />
        @foreach($languages as $value)
            <x-admin-form.input-text id="{{$value->lang_code}}_name" name="{{$value->lang_code}}_name" label="عنوان مدل({{$value->lang_name}})"
                                     placeholder="" value=""
                                     :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
        @endforeach
        <x-admin-form.submit-button/>
    </form>
    <x-admin-form.navbar-header/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>عکس مدل</th>
                <th>عنوان مدل</th>
                <th>گروه مدل</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($product_models as $product_model)
                    <tr>
                        <td><img src="{{asset($product_model['imgPath'])}}" width="100" height="100"></td>
                        <td>{{$product_model['fa_name']}}</td>
                        <td>{{$product_model['fa_group_name']}}</td>
                        <td>{{$product_model['enable']==1 ? "فعال" : "غیر فعال"}}</td>
                        <td><a href="{{ route('ProductModels.edit', $product_model['id']) }}">ویرایش</a></td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>
        <x-admin-form.en-tab-view>
            <x-slot:headerData>
                <th>image</th>
                <th>Title</th>
                <th>Group</th>
                <th>Status</th>
                <th>Edit</th>

            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($product_models as $product_model)
                    <tr>
                        <td><img src="{{asset($product_model['imgPath'])}}" width="100" height="100"></td>
                        <td>{{$product_model['en_name']}}</td>
                        <td>{{$product_model['en_group_name']}}</td>
                        <td>{{$product_model['enable']==1 ? "Enable" : "Disable"}}</td>
                        <td>Edit</td>
                       
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.en-tab-view>
    </div>
@endsection
