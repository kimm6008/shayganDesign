@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="{{route('Provinces.store')}}" method="post" class="form-horizontal">
        @csrf
        <x-admin-form.input-combo-box label="کشور" id="country_id" name="country_id" required="true"
                                      data_caption="name" faicon="fa-star" :info="$countries"/>
        <x-admin-form.input-text id="name" name="name" label="نام" placeholder="" value=""
                                 :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
        <x-admin-form.submit-button/>
    </form>
    <x-admin-form.navbar-header :multilang="false"/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>کشور</th>
                <th>نام استان</th>
                <th>ویرایش</th>
            </x-slot:headerData>
            <x-slot name="bodyData">
                @foreach($provinces as $value)
                    <tr>
                        <td>{{$value->country()->first()->name}}</td>
                        <td>{{$value->name}}</td>
                        <td><a href="#">{{$value->id}}</a></td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin-form.fa-tab-view>
    </div>
@endsection
