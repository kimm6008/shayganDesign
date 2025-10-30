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
            <th>محصول اسلاید</th>
            <th>عکس</th>
            <th>توضیحات</th>
            <th>حذف</th>
        </x-slot:headerData>
        <x-slot:bodyData>
            @foreach($slides as $slide)
                @if($slide->product_gallery_id!=null)
                <tr>
                    <td>{{$slide->productGallery->product->translation->first()->name}}</td>
                    <td> <img src="{{asset($slide->productGallery->imgPath)}}" width="100" height="100"  alt=""/> </td>
                    <td></td>
                    <td> <form method="POST" action="{{ route('SlideShow.destroy', $slide->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form></td>
                </tr>
                @else
                    <tr>
                        <td></td>
                        <td> <img src="{{asset($slide->imgPath)}}" width="100" height="100"  alt="{{asset($slide->imgPath)}}"/> </td>
                        <td>{{$slide->translation->first()->description}}</td>
                        <td><form method="POST" action="{{ route('SlideShow.destroy', $slide->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                            </form></td>
                    </tr>
                @endif
            @endforeach
        </x-slot:bodyData>
    </x-admin-form.fa-tab-view>
    <x-admin-form.en-tab-view>
        <x-slot:headerData>
            <th>slide product</th>
            <th>image</th>
            <th>description</th>
            <td>delete</td>
        </x-slot:headerData>
        <x-slot:bodyData>
            @foreach($slides as $slide)
                @if($slide->product_gallery_id!=null)
                    <tr>
                        <td>{{$slide->productGallery->product->translation->last()->name}}</td>
                        <td> <img src="{{asset($slide->productGallery->imgPath)}}" width="100" height="100"  alt=""/> </td>
                        <td></td>
                        <td> <form method="POST" action="{{ route('SlideShow.destroy', $slide->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">delete</button>
                            </form></td>
                    </tr>
                @else
                    <tr>
                        <td></td>
                        <td> <img src="{{asset($slide->imgPath)}}" width="100" height="100"  alt=""/> </td>
                        <td>{{$slide->translation->last()->description}}</td>
                        <td> <form method="POST" action="{{ route('SlideShow.destroy', $slide->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('آیا مطمئن هستید؟')">delete</button>
                            </form></td>
                    </tr>
                @endif
            @endforeach
        </x-slot:bodyData>
    </x-admin-form.en-tab-view>
    </div>
    <p  class="btn btn-info">توضیحات عکس های محصول از خود محصول خوانده می شود</p>
    <form action="{{route('SlideShow.store')}}" enctype="multipart/form-data" method="post">
    @csrf
        <x-admin-form.image-uploader name="img" id="img" label="عکس" />
        @foreach($languages as $lang)
            <x-admin-form.input-textarea name="{{$lang->lang_code}}_desc" id="{{$lang->lang_code}}_desc"
                                         label="توضیحات عکس({{$lang->lang_name}})" direction="{{$lang->lang_dir}}"    />
        @endforeach
        <x-admin-form.navbar-header :multilang="false"/>
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th></th>
                <th>عنوان محصول</th>
                <th>عکس محصول</th>
            </x-slot:headerData>
            <x-slot:bodyData>
        @foreach($product_gallery as $value)
            <tr>
               <td> <input type="checkbox" name="galleryImages[]"
                       value="{{$value->id}}"  class="form-control "> </td>
                <td>{{$value->product->translation()->first()->name}}</td>
                <td> <img src="{{asset($value->imgPath)}}" width="100" height="100"  alt=""/> </td>
            </tr>
        @endforeach
            </x-slot:bodyData>
        </x-admin-form.fa-tab-view>

        <div style="vertical-align: middle" class="col-lg-12">
        <x-admin-form.submit-button/>
        </div>
    </form>
@endsection
