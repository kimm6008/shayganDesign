@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li><a href="{{route('Products.index')}}">محصولات</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" enctype="multipart/form-data" action="{{route('ProductGallery.store')}}" class="form-horizontal">
        @csrf
        <input type="hidden" name="product_id" value="{{$pd->id}}">
        <x-admin-form.image-uploader name="img" id="img" label="عکس " :required="true" />
        <x-admin-form.submit-button/>
    </form>

    <x-admin-form.navbar-header :multilang="false" />
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>عکس</th>
                <th>اصلی</th>
                <th>تبدیل به عکس اصلی</th>
                <th>حذف</th>
            </x-slot:headerData>
            <x-slot:bodyData>
                @foreach($gallery as $g)
                    <tr>
                        <td><img src="{{asset($g['imgPath'] )}}" width="100" height="100"></td>
                        <td>{{$g->isMainImage ? 'بلی' : 'خیر'}}</td>
                        <td><form method="POST" action="{{ route('ProductGallery.update', $g->id) }}" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <input type="hidden" name="pid" value="{{$g->product_id}}">
                                <button {{$g->isMainImage ? 'disabled' : ''}} type="submit" onclick="return confirm('آیا مطمئن هستید؟')">تبدیل به عکس اصلی</button>
                            </form></td>
                        <td><form method="POST" action="{{ route('ProductGallery.destroy', $g->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button {{$g->isMainImage ? 'disabled' : ''}} type="submit" onclick="return confirm('آیا برای حذف مطمئن هستید؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>
    </div>
@endsection
