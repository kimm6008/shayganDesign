@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <x-admin-form.navbar-header/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>عکس محصول</th>
                <th>عنوان محصول</th>
                <th>گروه محصول</th>
                <th>مدل محصول</th>
                <th>وضعیت</th>
                <th>ویژگی های محصول</th>
                <th>قیمت محصول</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{asset($product['main_image'] )}}" width="100" height="100"></td>
                        <td>{{$product['fa_name']}}</td>
                        <td>{{$product['fa_model_name']}}</td>
                        <td>{{$product['fa_group_name']}}</td>
                        <td>{{$product['enable']==1 ? "فعال" : "غیر فعال"}}</td>
                        <td><a href="ProductFeatureValue/{{$product['uuid']}}">ویژگی های محصول</a></td>
                        <td><a href="#" data-id="{{$product["id"]}}"  class="addprice">ثبت قیمت</a>|
                            <a href="#" data-id="{{$product["id"]}}"  class="showprice">مشاهده قیمت</a>
                        </td>
                        <td><a href="{{ route('Products.edit', $product['id']) }}">ویرایش</a></td>
                        <td><form method="POST" action="{{ route('Products.destroy', $product['id']) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>
        <x-admin-form.en-tab-view>
            <x-slot:headerData>
                <th>image</th>
                <th>Title</th>
                <th>Group</th>
                <th>Model</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{asset($product['main_image'] )}}" width="100" height="100"></td>
                        <td>{{$product['en_name']}}</td>
                        <td>{{$product['en_model_name']}}</td>
                        <td>{{$product['en_group_name']}}</td>
                        <td>{{$product['enable']==1 ? "Enable" : "Disable"}}</td>
                        <td><a href="{{ route('Products.edit', $product['id']) }}">Edit</a></td>
                        <td><form method="POST" action="{{ route('Products.destroy', $product['id']) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">Delete</button>
                            </form></td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.en-tab-view>
    </div>
   <x-dialog id="add_product_price" title="ثبت قیمت محصول" />
    <x-dialog id="show_product_price" title="مشاهده قیمت محصول" />

@endsection
