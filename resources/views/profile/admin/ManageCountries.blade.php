@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route('Countries.store')}}" method="post" class="form-horizontal" >
        @csrf
            <x-admin-form.input-text id="name" name="name" label="نام کشور" placeholder="" value=""
                                     :required="true" :readonly="false" :disabled="false" faicon="fa-star" />
            <x-admin-form.input-combo-box id="currency_id" name="currency_id" :info="$currencies" :required="true"
                                          label="ارز کشور"  data_caption="name" faicon="fa-dollar" />
        <x-admin-form.input-combo-box id="languages_id" name="languages_id" :info="$languages" :required="true"
                                      label="زبان کشور"  data_caption="lang_name" faicon="" />
            <x-admin-form.submit-button/>
    </form>
    <x-admin-form.navbar-header :multilang="false"/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>نام کشور</th>
                <th>زبان</th>
                <th>ارز</th>
                <th>ویرایش</th>
            </x-slot:headerData>
            <x-slot name="bodyData">
                @foreach($countries as $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td>{{$value->languages()->first()->lang_name}}</td>
                        <td>{{$value->currency()->first()->name}}</td>
                        <td><a href="#">-</a></td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin-form.fa-tab-view>
    </div>
@endsection
