@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form method="post" action="{{route('Cities.store')}}" class="form-horizontal">
        @csrf
        <x-admin-form.input-combo-box label="استان" id="province_id" name="province_id" required="true"
                                      data_caption="name" faicon="fa-star" :info="$provinces"/>
        <x-admin-form.input-text id="name" name="name" label="نام" placeholder="" value=""
                                 :required="true" :readonly="false" :disabled="false" faicon="fa-star"/>
        <x-admin-form.submit-button/>
    </form>
    <x-admin-form.navbar-header :multilang="false"/>
    <div class="tab-content">
        <x-admin-form.fa-tab-view>
            <x-slot:headerData>
                <th>استان</th>
                <th>نام شهر</th>
                <th>ویرایش</th>
            </x-slot:headerData>
            <x-slot name="bodyData">
                @foreach($cities as $value)
                    <tr>
                        <td>{{$value->province()->first()->name}}</td>
                        <td>{{$value->name}}</td>
                        <td><a href="#">{{$value->id}}</a></td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin-form.fa-tab-view>
    </div>
@endsection
