<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shaygan Design Admin Panel</title>

    <meta name="description" content="Shaygan Design Admin ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/tflag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/jquery-ui.structure.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/jquery-ui.theme.css') }}">
    <!--   <link rel="stylesheet" href="AdminJs/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/scss/style.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/PersianDateTimePicker.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/lib/chosen/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/PersianDateTimePicker.css') }}">
    <link rel="stylesheet" href="{{ url('/css/AdminPanelStyle/css/dropify.min.css')}}">


    {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>--}}
    <script src="{{ url('/js/AdminJs/jquery.min.js?ver=3.6.0') }}"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-right"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-sm-5">
                <div class="user-area dropdown float-left">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <img class="user-avatar rounded-circle" src="{{asset('images/accounts.png')}}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{route('profile.edit')}}"><i class="fa fa- user"></i>
                            پروفایل من</a>
                        <a class="nav-link" href="#" onclick="event.preventDefault();
                                               document.getElementById('logoutform').submit();"><i class="fa fa-power -off"></i>
                            <form method="POST" id="logoutform" action="{{ route('logout') }}">
                                @csrf
                                    {{ __('Log Out') }}
                            </form>
                        </a>
                    </div>
                </div>

                {{--<div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language" >
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>--}}

            </div>

        </div>

    </header><!-- header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-right">
                <div class="page-title">
                    <h1>
                    {{$page_header}}
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                       @yield('breadcrumb')
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="card">
            @if(Session::has('error_msg'))
                <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                    <span class="badge badge-pill badge-warning">خطا</span>
                    {{session('error_msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @if(Session::has('success_msg'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-primary">موفقیت</span>
                    {{session('success_msg')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <div class="card-header">
                {{--<h4><span class="badge badge-dark">{{$page_header}}</span></h4>--}}
            </div>
            <div class="card-body card-block">

                @yield('content')

            </div>
        </div>
    </div> <!-- content -->
</div><!-- right-panel -->

<!-- Right Panel -->
<!-- Left Panel  Menu-->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="../../../../images/fa_logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="../../../../images/fa_logo.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            @include("profile.admin.AdminMenu")
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- left-panel -->

<!-- Left Panel -->

<script src="{{ url('/js/AdminJs/scripts.js') }}" ></script>
<script src="{{ url('/ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('/js/AdminJs/popper.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/plugins.js') }}"></script>
{{--
<script src="{{ url('/js/AdminJs/main.js') }}"></script>
--}}

<script src="{{ url('/js/AdminJs/lib/data-table/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/data-table/datatables-init.js') }}"></script>
<script src="{{ url('/js/AdminJs/lib/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{url('/js/AdminJs/jquery-ui.min.js')}}"></script>
<script src="{{url('/js/AdminJs/persian-date.min.js')}}"></script>
<script src="{{url('/js/AdminJs/persian-datepicker.min.js')}}"></script>
<script src="{{url('/js/jquery/jquery.mask.min.js') }}"></script>
<script src="{{url('/js/AdminJs/dropify.min.js')}}"></script>
<script src="{{url('/js/AdminJs/jquery.form-upload.init.js')}}" ></script>
</body>
</html>

