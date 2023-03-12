@extends('layouts.app')

@push('custom_css')
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}"> --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <style>
        .iti {display: block !important;}
    </style>
@endpush


<?php
$response  = request()->get('response');
$response  = json_decode($response);
$MOBILE_NO = $response->MOBILE_NO ?? '';

?>

@section('content')
    <div class="signup-sec">
        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                  @if (Session::has('success'))
                  <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b>{{ Session::get('success') }}</b>
                  </div>
                  @endif
                  @if (Session::has('danger'))
                  <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b>{{ Session::get('danger') }}</b>
                  </div>
                  @endif

                    @if($response)
                        <div class="login-wrap text-center">
                          <div class="pt-3 pb-3">
                            <p>We've sent a 4-digit one time PIN in your phone</p>
                            <strong>{{ $MOBILE_NO }}</strong>
                          </div>
                          <form class="" action="{{ route('verify-otp') }}" method="post">
                            @csrf
                            <input type="hidden" id="user_phone" name="MOBILE_NO" value="{{ $MOBILE_NO }}">
                            <div class="form-group">
                            <input class="form-control" type="text" name="otp" placeholder="Please enter 4-digit one time pin" value="{{ old('otp') }}">
                            </div>
                            <!-- <div class="btn-group" role="group" aria-label="OTP Submit"> -->
                            <button type="submit" class="btn btn-danger text-center" style="position: relative; margin-left: -198px; padding: 6px 37px;">ENTER</button>
                            <!-- <button type="submit" class="btn btn-info">REQUEST PIN AGAIN</button> -->
                           <!-- </div> -->
                          </form>
                          @php
                              $todate = date('Y-m-d');
                              $check = DB::table('otp_varification')->where('MOBILE', Session::get('otp_phone'))->where('OTP_DATE', $todate)->count('MOBILE');
                            //daily d times er besi send kora jabe na. $check && count($check)
                            // dd(Session::get('otp_phone'));
                          @endphp

                          <form class="" action="{{ route('send_otp') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_phone" value="{{ $MOBILE_NO }}">
                            @if($check < 5)
                                    <button href="#" class="btn btn-info text-center" style="position: relative; margin-top: -62px; margin-right: -110px;" disabled> Please Wait<span id="Timer_sek"></span> </button>
                                    <button id="Timer_out_sek" type="submit" class="btn btn-info text-center" style="position: relative; margin-top: -62px; margin-right: -199px;">REQUEST PIN AGAIN <span ></span> </button>

                            @else
                                <button type="submit" class="btn btn-danger text-center" style="position: relative; margin-top: -62px; margin-right: -110px;" disabled>REQUEST NEXTDAY </button>
                            @endif
                          </form>


                        </div>
                    @else
                    <div class="sign-wrap">
                        <h1>Your BDFlats.com Account</h1>
                        {!! Form::open([ 'route' => 'seeker_register_submit', 'id' => 'phone_form', 'method' => 'post', 'class' => 'registerForm', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            <div class="row" id="regForm">
                                <!-- <div class="col-12 form-group regi-name {!! $errors->has('name') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="name" class="control-label">Full Name:</label>
                                        {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'regi-name', 'autocomplete' => 'off', 'tabindex' => 1, 'placeholder' => 'Your name']) !!}
                                        {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div> -->
                                <div class="col-12 form-group regi-mobile {!! $errors->has('mobile') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Phone No:</label>
                                        {!! Form::tel('mobile', old('mobile'), [ 'class' => 'form-control', 'id' => 'phone', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Your number', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your number, It will be verify by OTP']) !!}
                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                        <span class="text-danger" id="mobileErrorMsg"></span>
                                    </div>
                                </div>

                                 <!-- <div class="col-12 form-group regi-email {!! $errors->has('email') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="email" class="control-label">Email Address:</label>
                                        {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'id' => 'email',  'placeholder' => 'Email address (optional)', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                        {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                        <span class="text-danger" id="emailErrorMsg"></span>
                                    </div>
                                </div>

                                <div class="col-12 form-group regi-password {!! $errors->has('password') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="password" class="control-label">Password:</label>
                                        {!! Form::password('password', [ 'class' => 'form-control', 'id' => 'password', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}
                                        {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>  -->

                                <div class="col-12 form-group text-center pb-4">
                                    <button type="submit" class="btn btn-primary">{{ __('SIGN UP / LOGIN') }}</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        {{-- <form action="" method="post">
                            <div class="row" id="verification_code">
                                <div class="col-12 justify-content-center form-group text-left {!! $errors->has('phone') ? 'error' : '' !!}" >
                                    <div class="controls">

                                        {!! Form::tel('otp', old('otp'), [ 'id' => 'otp', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'OTP Code', 'autocomplete' => 'off', 'title' => 'OTP Verification']) !!}
                                        {!! $errors->first('otp', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="row justify-content-center text-center">

                                    <div class="col-6 form-group text-right pb-4">
                                        <button type="submit" class="btn btn-primary">{{ __('Verified') }}</button>
                                    </div>
                                    <div class="col-6 form-group text-right pb-4">
                                        <button type="button" class="btn btn-primary">{{ __('Resend') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form> --}}

                        {{-- <div class="login-account text-center">
                            <h3>Have an Account on BDF.com?</h3>
                            <h5>Login in your account.</h5>
                            <a href="{{route('login')}}?as=seeker">Login Now</a>
                        </div> --}}

                    </div>
                    @endif



                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection

@push('custom_js')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <script>
    $(document).ready(function() {

    $('.registerForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
                name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required'
                    },
                    stringLength: {
                        min: 2,
                        max: 30,
                        message: 'The username must be more than 2 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'The mobile is required'
                    },
                    stringLength: {
                        min: 9,
                        max: 12,
                        message: 'The username must be more than 9 and less than 12 digit long'
                    },
                }
            }
        }
    });

});
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "bd";
            callback(countryCode);
            });
        },
        utilsScript: "../../build/js/utils.js?1638200991544" // just for formatting/placeholders etc
        });
    </script>
    <script>
        $(document).ready(function () {
            const verification_code = $('#verification_code');
            verification_code.hide();
            // verification_code.removeClass("d-flex");
            // $('#verification_code').hide();

            // $(document).on('submit', '#phone_form', function (e) {
            //     e.preventDefault();
            //    getOTP();
            // });

            const phoneInputField = document.querySelector("#phone");
            const phoneInput = window.intlTelInput(phoneInputField, {
                initialCountry: "auto",
                geoIpLookup: getIp,
                utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });

            function getIp(callback) {
                fetch('https://ipinfo.io/json', {headers: {'Accept': 'application/json'}})
                    .then((resp) => resp.json())
                    .catch(() => {
                        return {
                            country: 'bd',
                        };
                    })
                    .then((resp) => callback(resp.country));
            }

            function getOTP() {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('seeker_register_submit') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: $('#regi-name').val(),
                        // email: $('#email').val(),
                        mobile: $('#phone').val(),
                        // password: $('#password').val(),
                    },
                    success: function (res) {
                        console.log(res);
                        if (res.status === false) {
                            toastr.error(res.message);
                        } else {
                            // verification_code.addClass('d-flex');
                            verification_code.show();
                            $('#regForm').hide();
                            toastr.success(res.message);
                        }
                    },
                    error: function (err) {
                        console.log(err);
                        $('#emailErrorMsg').text(err.responseJSON.errors.email);
                        $('#mobileErrorMsg').text(err.responseJSON.errors.mobile);
                    }
                })
            }
        });
    </script>
     <script type="text/javascript">
        var timeLeft = 60;
        var elem = document.getElementById('Timer_sek');
        var elem_time = document.getElementById('Timer_out_sek');

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
      </script>
 @endpush
