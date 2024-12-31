<html class=" js no-touch cssanimations csstransitions" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Flat Metro</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" id="font-awesome-four-css" href="{{asset('css/MainPageCss/font-awesome.min.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="font-iransans-css" href="{{asset('css/MainPageCss/font-IRanSans.css')}}" type="text/css" media="all">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/fa_style.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/colors.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('css/MainPageCss/comments.css')}}" type="text/css" media="all">
    <link rel="stylesheet" id="responsiveslides-css" href="{{asset('css/MainPageCss/responsiveslides.css')}}"
          type="text/css" media="all">
    <link rel="stylesheet" id="reponsive-css" href="{{asset('css/MainPageCss/reponsive.css')}}" type="text/css"
          media="all">
    <link rel="stylesheet" id="animate-custom-css" href="{{asset('css/MainPageCss/animate-custom.css')}}"
          type="text/css" media="all">
</head>
<body style="">
@include('sections.navigation')
<div id="spaces-main" class="pt-perspective">
    @yield('Contents')
</div>

<script type="text/javascript" src="{{asset('js/jquery/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/MainPageJs/foundation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/MainPageJs/modernizr.custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/MainPageJs/foundation/foundation.section.js')}}"></script>
<script type="text/javascript" src="{{asset('js/MainPageJs/responsiveslides.js')}}"></script>
<script type="text/javascript" src="{{asset('js/MainPageJs/scripts.js')}}"></script>
<!-- jQuery library -->
<script src="{{asset('js/MainPageJs/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/MainPageJs/load-posts.js')}}"></script>

</body>
</html>
