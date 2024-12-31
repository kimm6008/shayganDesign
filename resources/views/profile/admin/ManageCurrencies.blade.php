@extends('profile.admin.app')
@section('breadcrumb')
    <li><a href="{{route('dashboard')}}">صفحه اصلی</a></li>
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
<form method="post" action="{{route('Currencies.store')}}" class="form-horizontal">
    @csrf
    <x-admin-form.input-text name="name" id="name" label="عنوان ارز" value="" :required="true" :readonly="false"
    faicon="fa-dollar" :disabled="false" placeholder=""   />
    <x-admin-form.submit-button/>
</form>
    <x-admin-form.navbar-header :multilang="false"/>
<div class="tab-content">
    <x-admin-form.fa-tab-view>
        <x-slot:headerData>
            <th>عنوان ارز</th>
            <th>ویرایش</th>
        </x-slot:headerData>
        <x-slot:bodyData>
            @foreach($currency as $c)
                <tr>
                    <td>{{$c->name}}</td>
                    <td></td>
                </tr>

            @endforeach
        </x-slot:bodyData>
    </x-admin-form.fa-tab-view>
</div>
@endsection
