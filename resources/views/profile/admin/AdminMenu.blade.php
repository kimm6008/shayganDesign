<ul class="nav navbar-nav">
    <li class="active">
        <a href="{{url('admin/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>صفحه اصلی </a>
    </li>
    <h3 class="menu-title">اطلاعات پایه</h3> <!--/.menu-title -->
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-dollar"></i>مدیریت ارزها</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-dollar"></i><a href="{{route('Currencies.index')}}">مدیریت ارزها</a></li>
        </ul>

    </li>
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-plus-square"></i>مدیریت شهرها و استان ها</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-minus-square"></i><a href="{{route('Countries.index')}}">مدیریت کشور ها</a></li>
            <li><i class="fa fa-minus-square"></i><a href="{{route('Provinces.index')}}">مدیریت استان ها</a></li>
            <li><i class="fa fa-minus-square"></i><a href="{{route('Cities.index')}}">مدیریت شهرها</a></li>
        </ul>

    </li>
    <h3 class="menu-title">مدیریت محصولات</h3> <!--/.menu-title -->
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-sitemap"></i>مدیریت مشخصات </a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-sitemap"></i><a href="{{route('Feature.index')}}">مشخصات </a></li>
        </ul>
    </li>
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-sitemap"></i>مدیریت گروه بندی محصولات</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-sitemap"></i><a href="{{route('ProductGroups.index')}}">گروه بندی محصولات</a></li>
           {{-- <li><i class="fa fa-sitemap"></i><a href="{{route('ProductGroupFeature.index')}}"></a></li>--}}
        </ul>


    </li>
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-briefcase"></i>مدیریت مدل های محصولات</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-briefcase"></i><a href="{{route('ProductModels.index')}}">مدل محصولات</a></li>
        </ul>
    </li>
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-briefcase"></i>محصولات</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-briefcase"></i><a href="{{route('Products.create')}}">تعریف محصولات</a></li>
            <li><i class="fa fa-briefcase"></i><a href="{{route('Products.index')}}">مدیریت محصولات</a></li>
        </ul>

    </li>
    <h3 class="menu-title">مدیریت سفارشات</h3> <!--/.menu-title -->

    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-info"></i>سفارشات</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-folder-o"></i><a href="">سفارشات جدید</a></li>
            <li><i class="menu-icon fa fa-folder-open"></i><a href="">سفارشات باز</a></li>
            <li><i class="menu-icon fa fa-external-link"></i><a href="">سفارشات ارسال شده</a></li>
            <li><i class="menu-icon fa fa-th"></i><a href="">تمامی سفارشات</a></li>
        </ul>
    </li>
    <h3 class="menu-title">مدیریت واریزی ها</h3> <!--/.menu-title -->
    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-info"></i>واریزی ها</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-dollar"></i><a href="">لیست واریزی ها</a></li>

        </ul>
    </li>
    <h3 class="menu-title">تنظیمات</h3> <!--/.menu-title -->

    <li class="menu-item-has-children dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-info"></i>تنظیمات</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-image"></i><a href="{{route('SlideShow.index')}}">مدیریت اسلاید شو</a></li>
            <li><i class="menu-icon fa fa-phone"></i><a href="{{route('ContactUs.index')}}">تماس با ما</a></li>
            <li><i class="menu-icon fa fa-phone"></i><a href="{{route('AboutUs.index')}}">درباره ما</a></li>
            <li><i class="menu-icon fa fa-th"></i><a href="{{route('SiteSetting')}}">تنظیمات</a></li>
        </ul>
    </li>
</ul>
