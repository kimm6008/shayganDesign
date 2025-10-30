@extends('app')
@section('Content')
    <div class="title-breadcrumbs">
        <div class="title-breadcrumbs-inner">
            <div class="container">
                <nav class="woocommerce-breadcrumb">
                    <a href="/">{{__('HOME')}}</a>
                    <span class="separator">/</span> {{__('CONTACTUS')}}
                </nav>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area End -->
<!-- Contact page content -->
<div class="contact-page-area ">

    </div>
    <!-- contact page map -->
    <!-- contact form area -->
    <div class="contact-form-area pt-100 pb-65">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                        <!-- contact page map -->
                        <div class="contact-page-map">
                            <!-- Google Map Start -->
                            <div class="container-fluid">
                                <iframe id="map" style="width: 100%; height: 400px; border: none;"
                                        src="https://www.google.com/maps/embed?origin=mfe&zoom=15&pb=!1m3!2m1!1s121+مجتمع تجاری عفیف آباد
+Afif Abad+St,+Shiraz+Iran!6i13">

                                </iframe>
                            </div>
                            <!-- Google Map End -->
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-address-area">
                        <h2>{{__('CONTACTUS')}}</h2>
                        <p>{!! $contactUs->first()->contact_us !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact form area end -->
</div>
<!-- Contact page content end -->
@endsection
