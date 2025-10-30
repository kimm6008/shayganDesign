<div class="row menu-row">
    <div class="large-1 go-back">
        <i class="fa-arrow-left fa icon-x back" onclick="window.history.back()"></i>
    </div>
    <div class="large-7 columns p-l-0">
        <h2>{{__("Register")}}</h2>
    </div>
    <div class="large-4 columns menu-button text-left">
        <a class="showMenu" href="#home"><i class="fa-home fa icon-x back"></i></a>
        <a class="showMenu"><i class="fa-bars fa icon-x back"></i></a>
        <a class="showMenu"><i class="fa-search fa icon-x back"></i></a>
    </div>
</div>
<div class="row clear-fix">
    <div class="large-12 columns page-sub-title text-center">
        <p>پر کردن اطلاعات ستاره دار الزامی است</p>
        <p>
        @foreach($errors as $message)
            <li>{{$message}}</li>
        @endforeach
        </p>

    </div>
    <div class="large-9 columns">
        <div class="wpcf7" id="wpcf7-f6-p14-o1">
            <form id="register-frm" method="POST" action="{{ route('register') }}" class="wpcf7-form register-frm" >
                @csrf
                <div id="result"></div>
                <p>{{__("FirstName")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap firstname">
                           	<input type="text" name="firstname" value="" size="40"
                                   class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                   aria-required="true" aria-invalid="false" required></span>
                </p>
                <p>{{__("LastName")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap lastname">
                    <input type="text" name="lastname"
                           value="" size="40"
                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required "
                           aria-required="true" aria-invalid="false" required>
                </span>
                </p>
                <p>{{__("Mobile")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap mobile">
                    <input type="text" name="mobile"
                           value="" size="40" autocomplete="false"
                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required "
                           aria-required="true" aria-invalid="false" required>
                </span>
                </p>
                <p>{{__("Password")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap post-password-required">
                    <input type="password" name="password"
                           value="" size="40" autocomplete="false"
                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required "
                           aria-required="true" aria-invalid="false" required>
                </span>
                </p>
                <p>{{__("RePassword")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap repass">
                    <input type="password" name="password_confirmation"
                           value="" size="40" autocomplete="false"
                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required "
                           aria-required="true" aria-invalid="false" required>
                </span>
                </p>
                <p>{{__("province")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap ">
                   <select id="pr" class="wpcf7-form-control  wpcf7-validates-as-required " onchange="ShowCities(this.value,'cities')">
                       <option value="0">لطفا استان را انتخاب کنید</option>
                       @foreach($proviences as $value)
                           <option value="{{$value->id}}">
                               {{$value->name}}
                           </option>
                       @endforeach
                   </select>
                </span>
                </p>
                <p>{{__("City")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap cities" >
                    <div id="cities">
                        <select>

                        </select>
                    </div>
                </span>
                </p>
                <p>{{__("Address")}}*
                    <br>
                    <span class="wpcf7-form-control-wrap address">
                    <input type="text" name="address"
                           size="80"
                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required "
                           aria-required="true" aria-invalid="false" required>
                </span>
                </p>
                <p>{{__("PostalCode")}}
                    <br>
                    <span class="wpcf7-form-control-wrap address">
                    <input type="number" name="postalcode"
                           class="wpcf7-form-control wpcf7-text "
                           aria-required="true" aria-invalid="false">
                </span>
                </p>
                <p class="button">
                    <input type="submit" value="{{__("Register")}}" class="wpcf7-form-control wpcf7-submit">
                </p>
                <div class="wpcf7-response-output wpcf7-display-none"></div>
            </form>
        </div>
    </div>
</div>
