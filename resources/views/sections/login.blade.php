@extends('app')
@section('Content')
    <div class="login-register-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <!--Login Form Start-->
                <div class="col-md-6 col-sm-6">
                    <div class="customer-login-register">
                        <div class="form-login-title">
                            <h2>{{__("LOGIN")}}</h2>
                        </div>

                            <div class="login-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="hidden" name="usertype" value="{{md5('User')}}">
                                    <div class="form-fild">
                                        <label>{{__("Mobile")}}</label>
                                        <input type="number" class="form-control" placeholder="{{__("Mobile")}}">
                                    </div>
                                    <div class="form-fild">
                                        <label>{{__("Password")}}</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="login-submit">
                                        <button type="submit" class="form-button">{{__("LOGIN")}}</button>
                                        <label>

                                            <span>{{__("Remember me")}}</span>
                                            <input class="checkbox" name="rememberme" value="" type="checkbox">
                                        </label>

                                    </div>
                                    <label >
                                        <a href="{{route('password.request',)}}">{{__("Forgotten Password")}}</a>
                                    </label>
                                    {{--<div class="checkbox">
                                        <label>
                                            <input class="checkbox" type="checkbox" >
                                        </label>


                                    </div>
                                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">{{__("LOGIN")}}</button>--}}
                                </form>
                            </div>
                        </div>

                </div>
                <!--Login Form End-->
                <!--Register Form Start-->
                <div class="col-md-6 col-sm-6">
                    <div class="customer-login-register register-pt-0">
                        <div class="form-register-title">
                            <h2>Register</h2>
                        </div>
                        <div class="register-form">
                            <form action="#">
                                <div class="form-fild">
                                    <p>
                                        <label>Username or email address
                                            <span class="required">*</span>
                                        </label>
                                    </p>
                                    <input name="username" value="" type="text">
                                </div>
                                <div class="form-fild">
                                    <p>
                                        <label>Password
                                            <span class="required">*</span>
                                        </label>
                                    </p>
                                    <input name="password" value="" type="password">
                                </div>
                                <div class="register-submit">
                                    <button type="submit" class="form-button">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Register Form End-->
            </div>
        </div>
    </div>
@endsection

