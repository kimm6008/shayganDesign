@extends('app')
@section('Content')
    <div class="title-breadcrumbs">
        <div class="title-breadcrumbs-inner">
            <div class="container">
                <nav class="woocommerce-breadcrumb">
                    <a href="/">{{__('HOME')}}</a>
                    <span class="separator">/</span> {{__('Model')}}
                </nav>
            </div>
        </div>
    </div>
    <div class="Shopping-cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pg___title">
                        <h2>{{__('Shopping Cart')}}</h2>
                    </div>
                    <form action="#">
                        <div class="table-content table-responsive" style="direction: rtl">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="anadi-product-remove">حذف</th>
                                    <th class="anadi-product-thumbnail">عکس</th>
                                    <th class="cart-product-name">محصول</th>
                                    <th class="anadi-product-price">مبلغ واحد</th>
                                    <th class="anadi-product-quantity">تعداد</th>
                                    <th class="anadi-product-subtotal">مبلغ نهایی</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="anadi-product-remove">
                                        <a href="#">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <td class="anadi-product-thumbnail">
                                        <a href="#">
                                            <img src="assets/img/cart/cart1.jpg" alt="">
                                        </a>
                                    </td>
                                    <td class="anadi-product-name">
                                        <a href="#">Aliquam lobortis est</a>
                                    </td>
                                    <td class="anadi-product-price">
                                        <span class="amount">$70.00</span>
                                    </td>
                                    <td class="anadi-product-quantity">
                                        <input value="1" type="number">
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">$70.00</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="anadi-product-remove">
                                        <a href="#">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <td class="anadi-product-thumbnail">
                                        <a href="#">
                                            <img src="assets/img/cart/cart2.jpg" alt="">
                                        </a>
                                    </td>
                                    <td class="anadi-product-name">
                                        <a href="#">Cras neque metus</a>
                                    </td>
                                    <td class="anadi-product-price">
                                        <span class="amount">$60.50</span>
                                    </td>
                                    <td class="anadi-product-quantity">
                                        <input value="1" type="number">
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">$60.50</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal
                                            <span>$130.00</span>
                                        </li>
                                        <li>Total
                                            <span>$130.00</span>
                                        </li>
                                    </ul>
                                    <a href="#">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
