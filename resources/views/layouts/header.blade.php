<?php
$active_menu = 'home';
if (request()->get('verified') == '1') {
    $active_menu = 'verified_property';
}
if (request()->segment(2) == 'rent') {
    $active_menu = 'rent';
}
if (request()->segment(2) == 'sale') {
    $active_menu = 'sale';
}
if (request()->segment(2) == 'roommate') {
    $active_menu = 'roommate';
}

?>
<?php
$response  = request()->get('response');
$response  = json_decode($response);
$MOBILE_NO = $response->MOBILE_NO ?? '';
$referrer = request()->get('referrer') ?? null;

?>


<!--
   ============  mobile menu  ============
-->
<header class="d-block d-lg-none mobile-menu">
    <!-- container-fluid -->
    <div class="container-fluid">
        <div class="wrapper cf">
            <nav id="main-nav">
                <h4 class="site_logo">
                    <a href="{{url('/')}}"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>
                </h4>

                <ul class="first-nav">
                    @guest
                        <li class="cryptocurrency login_btn">
                            <a href="{{route('login')}}">Login or Create Account <i class="fa fa-long-arrow-right"></i></a>
                        </li>
                    @endguest
                    <li class="cryptocurrency">
                        <a href="{{ route('web.home') }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('listings.create') }}"><i class="fa fa-plus"></i>Add Property</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property', ['type' => 'sale']) }}"><i class="fa fa-building"></i>Properties
                            for Buy</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property', ['type' => 'rent']) }}"><i class="fa fa-hotel"></i>Properties
                            for Rent</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property', ['type' => 'roommate']) }}"><i class="fa fa-users"></i>Roommate</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property') }}?verified=1"><i class="fa fa-check-circle"></i>Verified
                            Properties</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property') }}?verified=0"><i class="fa fa-search"></i>Search
                            Properties</a>
                    </li>
                    {{-- <li class="cryptocurrency">
                        <a href="#"><i class="fa fa-plus"></i>Blogs</a>
                    </li> --}}
                    <li class="cryptocurrency">
                        <a href="{{ route('about-us') }}"><i class="fa fa-plus"></i>About Us</a>
                    </li>
                    {{-- <li class="cryptocurrency">
                        <a href="about-us.html"><i class="fa fa-plus"></i>Testimonials</a>
                    </li> --}}
                    <li class="cryptocurrency">
                        <a href="{{ route('site-map') }}"><i class="fa fa-share-alt"></i>Sitemap</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('contact-us') }}"><i class="fa fa-address-card"></i>Contact Us</a>
                    </li>
                </ul>

                @auth
                    <ul class="first-nav">
                        <li class="cryptocurrency">
                            <span><i class="fa fa-user"></i>Account</span>
                            @if(Auth::user()->USER_TYPE == 1)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">My
                                            Account</a></li>
                                    <li><a href="{{route('property-requirements')}}"
                                           class="@yield('property-requirements')">Property Requirements</a>
                                    </li>
                                    <li><a href="{{route('suggested-properties')}}"
                                           class="@yield('suggested-properties')">Suggested Properties</a>
                                    </li>
                                    <li><a href="{{route('contacted-properties')}}"
                                           class="@yield('contacted-properties')">Contacted Properties</a>
                                    </li>
                                    <li><a href="{{route('browsed-properties')}}"
                                           class="@yield('browsed-properties')">Browsed Properties</a></li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{route('payment-history')}}"
                                           class="@yield('payment-history')">Payment History</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 2)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">My
                                            Account</a></li>
                                    <li><a href="{{route('buy-leads')}}" class="@yield('buy-leads')">Suggested
                                            Leads</a></li>
                                    <li><a href="{{ route('owner-listings') }}"
                                           class="@yield('owner-listings')">My Properties</a></li>
                                    <li><a href="{{ route('owner-leads') }}" class="@yield('owner-leads')">Leads</a>
                                    </li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{route('payment-history')}}"
                                           class="@yield('payment-history')">Payment History</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 3)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a>
                                    </li>
                                    <li><a href="{{ route('developer-listings') }}"
                                           class="@yield('developer-listings')">Properties</a></li>
                                    <li><a href="{{ route('developer-leads') }}"
                                           class="@yield('developer-leads')">Leads</a></li>
                                    <li><a href="{{ route('developer-buy-leads') }}"
                                           class="@yield('developer-buy-leads')">Suggested Leads</a></li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{ route('developer-payments') }}"
                                           class="@yield('developer-payments')">Payments</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 4)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a>
                                    </li>
                                    <li><a href="{{ route('agency-listings') }}"
                                           class="@yield('agency-listings')">Properties</a></li>
                                    <li><a href="{{ route('agency-leads') }}"
                                           class="@yield('agency-leads')">Leads</a></li>
                                    <li><a href="{{ route('agency-buy-leads') }}"
                                           class="@yield('agency-buy-leads')">Suggested Leads</a></li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{ route('agency-payments') }}"
                                           class="@yield('agency-payments')">Payments</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 5)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a>
                                    </li>
                                    <li><a href="{{ route('agent-listings') }}"
                                           class="@yield('agent-listings')">Properties</a></li>
                                    <li><a href="{{ route('agent-leads') }}" class="@yield('agent-leads')">Leads</a>
                                    </li>
                                    <li><a href="{{ route('agent-buy-leads') }}" class="@yield('agent-buy-leads')">Suggested
                                            Leads</a></li>
                                    <li><a href="{{ route('agent-payments') }}"
                                           class="@yield('agent-payments')">Payments</a></li>
                                    <li><a href="{{ route('agent-earnings') }}"
                                           class="@yield('agent-earnings')">Earnings</a></li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                @endauth
                <h3 class="hotline_title">Hotline</h3>
                <h5 class="hotline_num"><a href="tel:{{ setting()->PHONE_1 ?? '' }}">{{ setting()->PHONE_1 ?? '' }}</a>
                </h5>
                <h4 class="contact_via_title">Contact with us via:</h4>
                <ul class="contact_via">
                    <li><a href="{{ setting()->FACEBOOK_URL ?? '' }}" target="_blank" class="facebook"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ setting()->TWITTER_URL ?? '' }}" target="_blank" class="twitter"><i
                                class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ setting()->PINTEREST_URL ?? '' }}" target="_blank" class="pinterest"><i
                                class="fa fa-pinterest"></i></a></li>
                    <li><a href="{{ setting()->INSTAGRAM_URL ?? '' }}" target="_blank" class="instagram"><i
                                class="fa fa-instagram"></i></a></li>
                    <li><a href="{{ setting()->YOUTUBE_URL ?? '' }}" target="_blank" class="youtube"><i
                                class="fa fa-youtube"></i></a></li>
                </ul>

            </nav>
            <a class="toggle" href="#">
                <span></span>
            </a>
        </div>
    </div><!-- container-fluid -->
</header>

<!--
   ============   menu  ============
 -->
<div id="header" class="home-menu">
    <!-- container-fluid -->
    <div class="container-fluid">
        <!-- nav -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ asset('assets/img/logo.png') }}" class="d-none d-md-block" alt="logo">
                <img src="{{ asset('assets/img/logo2.png') }}" class="d-block d-md-none" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-none d-lg-block" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="dropdown-nav d-none d-lg-block nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="dropdown_open fa fa-bars"></i> <i
                                class="dropdown_close d-none fa fa-times"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Coming Soon...</a></li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="filter-search.html"><i class="search_icon fa fa-search"></i></a>
                    </li> -->
                    <li class="search_bar">
                        <form class="example header_search" action="{{ route('web.property') }}" method="get">
                            <div class="search-box">
                                <input type="text" placeholder="Search.." value="{{ request()->query('search') }}"
                                       name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'home' ? 'active' : ''  }}"
                           href="{{ route('web.home') }}">Home</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'sale' ? 'active' : ''  }}"
                           href="{{ route('web.property', ['type' => 'sale']) }}">Sale</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'rent' ? 'active' : ''  }}"
                           href="{{ route('web.property', ['type' => 'rent']) }}">Rent</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'roommate' ? 'active' : ''  }}"
                           href="{{ route('web.property', ['type' => 'roommate']) }}">Roommate</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'verified_property' ? 'active' : ''  }}"
                           href="{{ route('web.property') }}?verified=1">Verified properties</a>
                    </li>
                    <li class="nav-menu nav-item dropdown">
                        @guest
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="{{ route('login', ['as' => 'seeker']) }}">As Seeker</a> -->
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">As Seeker</a>
                                <a class="dropdown-item" href="{{ route('login', ['as' => 'owner', 'referrer' => $referrer ]) }}">As Owner</a>
                            </div>
                        @else
                            <a class="nav-link" href="{{route('my-account') }}">My Account</a>
                        @endguest
                    </li>
                    <li class="dropdown-nav d-block d-lg-none nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTwo" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bars"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownTwo">
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- nav -->

        @if(Auth::user())
        @if(Auth::user()->USER_TYPE != 1)
        <!-- post add -->
        <div class="nav-btn">
            {{-- <a type="button" data-toggle="modal" data-target="#exampleModal">
                Post Your Ad
            </a> --}}
            @if(Auth::user())
            <a href="{{route('listings.create') }}">Post Your Ad</a>
            @else
            <a href="{{ route('login', ['as' => 'owner', 'referrer' => 'post_your_add' ]) }}">Post Your Ad</a>
            @endif
        </div>
        <!-- Modal -->
        @else
        <!-- post add -->
        <div class="nav-btn">
            {{-- <a type="button" data-toggle="modal" data-target="#exampleModal">
                Post Your Ad
            </a> --}}
            <a href="{{url('property-requirements') }}">Property Requirement</a>
        </div>
        <!-- Modal -->
        @endif
        @else
        <!-- post add -->
        <div class="nav-btn">
            {{-- <a type="button" data-toggle="modal" data-target="#exampleModal">
                Post Your Ad
            </a> --}}
            @if(Auth::user())
            <a href="{{route('listings.create') }}">Post Your Ad</a>
            @else
            <a href="{{ route('login', ['as' => 'owner', 'referrer' => 'post_your_add' ]) }}">Post Your Ad</a>
            @endif
        </div>
        <!-- Modal -->
        @endif
    <div class="modal fade" id="exampleModal" data-backdrop="static" data-target="#staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login/SignUp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="login-wrap text-center" id="login_wrap" style="display: none">
                  <div class="pt-3 pb-3">
                    <p>We've sent a 4-digit OTP in <span id="otp_sended_mobile"></span></p>
                    <span id="sending_phn"></span>
                  </div>
                  <form class="re_form " id="contact_us" name="reg_form" action="return false;" method="post">
                    <input type="hidden" id="user_phone" name="mobile_no">
                    <input type="hidden" id="user_name" name="name">
                    <input type="hidden" id="user_email" name="email">
                    <input type="hidden" id="user_country_code" name="country_code">
                    <div class="form-group">
                        <input class="form-control" id="otp_num" type="text" name="otp" placeholder="Please enter 4-digit one time pin" value="{{ old('otp') }}" >
                        <span id="otpErrorMsg" style="color: red"></span>
                    </div>
                    <button type="submit" class="btn btn-danger text-center" id="right_otp" style="position: relative; margin-left: -198px; padding: 6px 37px;" name="submit" value="varification_pin" >ENTER</button>

                    <div id="show_today">
                        <button id="time_count" class="btn btn-info text-center" style="position: relative; margin-top: -62px; margin-right: -110px; display:none" disabled> Please Wait <span id="Timer_w"></span> </button>
                        <button id="timer_next" class="btn btn-info text-center" style="position: relative; margin-top: -62px; margin-right: -110px;" disabled> Please Wait <span id="Timer"></span> </button>
                        <button id="Timer_out" type="submit" class="btn btn-info text-center" style="position: relative; margin-top: -62px; margin-right: -199px;" name="submit" value="request_pin">REQUEST PIN AGAIN <span ></span> </button>
                    </div>

                  </form>

                  {{-- @php
                      $todate = date('Y-m-d');
                      $check = DB::table('OTP_VARIFICATION')->where('MOBILE', Session::get('otp_phone'))->where('OTP_DATE', $todate)->count('MOBILE');
//daily d times er besi send kora jabe na. $check && count($check)
                    if ($check > 4) {

                    }
                  @endphp --}}

                  {{-- <form class="" action="#" id="resend_phone_form" method="post">
                    @csrf
                    <input type="hidden" name="user_phone" id="user_phone1">
                    <input type="hidden" name="email_otp" id="email_otp">
                    <input type="hidden" name="countryCode" id="countryCode">


                        <button type="submit" id="req_next_day" class="btn btn-danger text-center" style="position: relative; margin-top: -62px; margin-right: -110px; display: none" disabled>REQUEST NEXTDAY </button>
                  </form> --}}


                </div>
            {{-- @else --}}
            <div class="sign-wrap" id="sign_up">
                <span id="valid-msg" style="hide" style="display:block"></span>
                <span id="error-msg" class="hide text-center" style="display:block;color:red"></span>
                <h1>Your BDFlats.com Account</h1>
                <form class="registerForm re_form" id="phone_form" name="seeker_register_submit" action="return false;" method="post">
                    <div class="row" id="regForm">
                        <div class="col-12 form-group regi-mobile {!! $errors->has('mobile') ? 'error' : '' !!}">
                            <div class="controls">
                                <label for="phone" class="control-label">Phone No:</label>
                                {!! Form::tel('mobile', old('mobile'), [ 'class' => 'form-control', 'id' => 'phone_number', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Your number', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your number, It will be verify by OTP']) !!}
                                {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                <span class="text-danger" id="mobileErrorMsg"></span>

                            </div>
                        </div>
                        <div id="two_field" style="margin-left: 28px; display:none">
                            <div class="form-group row">
                                <label for="staticName" class="col-md-2 col-form-label">Name </label>
                                <div class="col-md-10">
                                  <input type="text" class="form-control" id="staticName" name="name" style="width: 254px" placeholder="Enter your name" required>
                                  <span class="text-danger" id="nameErrorMsg"></span>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="staticEmail" class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                  <input type="email" class="form-control" id="staticEmail" name="email" style="width: 255px" placeholder="Enter your email (optional)">
                                  <span class="text-danger" id="emailErrorMsg"></span>
                                </div>
                              </div>
                        </div>


                        <div class="col-12 form-group text-center pb-4">
                            <button type="submit" name="submit" id="send_form" class="btn btn-primary button">{{ __('SIGN UP / LOGIN') }}</button>
                        </div>
                        <div class="col-12 form-group text-center pb-4" id="error_print_div">
                        </div>
                    </div>
                </form>

                {{-- <div class="login-account text-center">
                    <h3>Have an Account on BDF.com?</h3>
                    <h5>Login in your account.</h5>
                    <a href="{{route('login')}}?as=seeker">Login Now</a>
                </div> --}}

            </div>
            {{-- @endif --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Send Otp</button> --}}
            </div>
        </div>
    </div>
    </div>
    </div><!-- container-fluid  -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

<script>
$('.re_form input').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});

//     var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
//   separateDialCode: true,
//   preferredCountries:["bd"],
//   hiddenInput: "full",
//   utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
// });
var input = document.querySelector("#phone_number"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");
//   input_button = document.querySelector("#send_form");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti = window.intlTelInput(input, {
    initialCountry: "bd",
    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});

var reset = function() {
// input_button.classList.remove("disable");
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};
// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
    //   input_button.classList.remove("disable");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    //   input_button.classList.add("disable");
    //   $('#send_form').hide();
    }
  }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

</script>

<script type="text/javascript">
let numberSavedInDatabase = false;

$('#phone_form').on('submit',function(e){
    e.preventDefault();
    var flag = 'true';
    mobile = $("#phone_number").val();
    name = $("#staticName").val();
    email = $("#staticEmail").val();
    var countryCode = iti.getSelectedCountryData().iso2;

    if(mobile == ''){flag='false'; $('#mobileErrorMsg').text('Mobile number is required').fadeOut(4000); }
    if(name == ''){flag='false'; $('#nameErrorMsg').text('Name is required').fadeOut(4000); }
    $('#staticEmail').attr('placeholder','Enter your email (optional)');
    if (countryCode !== 'bd') {
        if(email == ''){
            flag='false';
            $('#emailErrorMsg').text('Email is required').fadeOut(4000);
            $('#staticEmail').attr('placeholder','Enter your email');
         }
    }
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(email != ''){
        if(!regex.test(email)) {
            flag='false';
            $('#emailErrorMsg').text('Email is not valid');
            $('#emailErrorMsg').fadeOut(4000);
          }
    }

    if(flag == 'true'){
        $.ajax({
            url: "{{route('seeker_reg_ajax')}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                mobile:mobile,
                name:name,
                email:email,
                countryCode:countryCode,
            },
            success:function(response){
                console.log(response);
                if(response.success){
                        $('#login_wrap').show();
                        $('#sign_up').hide();
                        if (countryCode == 'bd') {
                            $('#otp_sended_mobile').text(response.phone);
                        }else{
                            $('#otp_sended_mobile').text(response.email);
                        }

                        $('#user_phone').val(response.phone)
                        $('#user_name').val(response.name)
                        $('#user_email').val(response.email)
                        $('#user_country_code').val(response.countryCode)

                        var timeLeft = 60;
                        var elem = document.getElementById('Timer');
                        var elem_time = document.getElementById('Timer_out');
                        var timerId = setInterval(countdown, 1000);

                        function countdown() {
                                if (timeLeft == -1) {
                                clearTimeout(timerId);
                                elem.style.display = 'none';
                                // doSomething();
                                elem_time.style.display = 'inline';
                                // ("#timer_on").hide();
                                } else {
                                elem.innerHTML = '(' + timeLeft + ')';
                                --timeLeft;
                                elem_time.style.display = 'none';
                                }
                            }
                }else{
                    $('#error-msg').text(response.message);

                    $('#login_wrap').hide();
                    $('#sign_up').show();
                }

            },
            error: function(response) {
                $('#mobileErrorMsg').text('Something wrong');
            },
        });
    }


    });

</script>

<script type="text/javascript">

    $('#contact_us').on('submit',function(e){
        e.preventDefault();
        let submitter_btn = $(e.originalEvent.submitter);
        let submit_type = submitter_btn.attr("value");
        var flag = 'true';

        let mobile  = $('#user_phone').val();
        let name    = $('#user_name').val();
        let email   = $('#user_email').val();
        let otp_num   = $('#otp_num').val();
        let countryCode = $('#user_country_code').val();

        if(submit_type == 'varification_pin'){
            if(otp_num.length != 4){
                flag = 'false';
                $('#otpErrorMsg').text('OTP is 4 character');
            }else{
                // alert(1);
                //loginWithOtp
                $.ajax({
                    url: "{{route('loginWithOtp')}}",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        mobile:mobile,
                        otp_num:otp_num,
                        name:name,
                        email:email,
                        countryCode:countryCode,
                    },
                    success:function(response){
                        if(response.status){
                            location.reload();
                        }else{
                            $('#otpErrorMsg').text(response.message);
                        }

                    },
                    error: function(response) {
                            $('#otpErrorMsg').text(response.responseJSON.errors.mobile);
                        },
                });
            }
        }
    });


    $(document).on('input', '#phone_number', function() {
            let phone_number = $(this).val();
            var countryCode = iti.getSelectedCountryData().iso2;
            if (countryCode == 'bd') {
                let phone_len = phone_number.length;
                $('#staticEmail').attr('placeholder','Enter your email (optional)');
                if(phone_len == 11){
                    $('#mobileErrorMsg').text('');
                    $.ajax({
                    type: 'GET',
                    url: "{{route('get-user-phone')}}",
                    data: {
                        'phone_number': phone_number
                    },
                    success: function (response) {
                            if(response.user_phone){
                                $('#two_field').hide();
                                $('#staticName').val(response.user_name);
                                numberSavedInDatabase = true;
                            }else{
                                $('#two_field').show();
                                $('#staticName').val('');
                                $('#staticEmail').val('');
                                numberSavedInDatabase = false;
                            }
                        }
                    });
                }else{
                    //Invalid number
                    let invalid = 'Invalid number';
                    if(phone_len > 0){
                        $('#mobileErrorMsg').text(invalid);
                    }
                }

            }else{
                $('#staticEmail').attr('placeholder','Enter your email');
                $('#two_field').show();
            }
    });


</script>

