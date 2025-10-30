@extends('profile.admin.app')
@section('breadcrumb')
    <li class="active">{{$page_header}}</li>
@endsection
@section('content')
    <form action="#"
          method="post"
          enctype="multipart/form-data"
         >
        @csrf
        <input type="file"  class="dropify"
               />
    </form>

@endsection
