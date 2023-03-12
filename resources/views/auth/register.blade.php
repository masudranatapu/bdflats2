@extends('layouts.app')

@push('custom_css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">

    <style>
        .iti--allow-dropdown{display: block !important;}
    </style>
@endpush


@section('content')
    <div class="signup-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="sign-wrap">
                        @if(request()->get('mode') == 'verify')
                        <div class="verify_section">
                            {!! Form::open([ 'route' => 'register.otp_verify', 'method' => 'post', 'files' => false, 'autocomplete' => 'off', 'id' => 'otp_frm']) !!}
                            <div class="login-wrap text-center" style="">
                                <div class="pt-3 pb-3">
                                  <p>We've sent a 4-digit OTP in <span id="otp_sended_mobile">{{  request()->get('code') == 'bd' ? request()->get('mobile') : request()->get('emial') }}</span></p>
                                </div>
                                  <input type="hidden" name="mobile" value="{{ request()->get('mobile') }}">
                                  <input type="hidden" name="email" value="{{ request()->get('email') }}">
                                  <input type="hidden" name="country_code" value="{{ request()->get('code') }}">
                                  <div class="col-12 form-group {!! $errors->has('otp_num') ? 'error' : '' !!}">
                                    <div class="controls otp_num_block">
                                        {!! Form::number('otp_num', old('otp_num'), [ 'class' => 'form-control',  'placeholder' => 'Please enter 4-digit one time pin','minlength' => '4', 'data-validation-minlength-message' => 'Minimum 4 characters', 'maxlength' => '4',  'data-validation-maxlength-message' => 'Maximum 4 characters', 'autocomplete' => 'off', 'tabindex' => 1,  'id' => 'otp_num1']) !!}
                                        {!! $errors->first('otp_num', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>

                                  <button type="submit" class="btn btn-danger text-center" id="right_otp"  name="submit" value="varification_pin" style="display: inline-block" value="opt_submit">ENTER</button>
                                  <button type="submit" class="btn btn-info text-center" name="submit" value="otp_again" style="display: inline-block" >REQUEST PIN AGAIN <span></span>
                                  </button>

                              </div>
                              {!! Form::close() !!}
                        </div>
                        @else
                        <div class="regi_section">
                        <h1>Create Your BDFlats.com Account</h1>
                        {!! Form::open([ 'route' => 'register.post', 'method' => 'post', 'class' => '', 'files' => true , 'novalidate', 'autocomplete' => 'off', 'id' => 'register_frm']) !!}
                        <input type="hidden" name="as" value="{{ request()->get('as') }}"/>
                        <input type="hidden" name="referrer" value="{{ request()->get('referrer') }}"/>
                            <div class="account-info">
                                <h5>I am:</h5>
                                {{-- <input type="radio" name="usertype" value="1" id="seeker" checked> <label for="seeker">Seeker</label> --}}
                                <input type="radio" name="usertype" value="2" id="owner" checked> <label for="owner">Individual</label>
                                <input type="radio" name="usertype" value="3" id="builder"> <label for="builder">Company</label>
                                <input type="radio" name="usertype" value="4" id="agency"> <label for="agency">Agency</label>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group regi-name {!! $errors->has('name') ? 'error' : '' !!}">
                                    <div class="controls name_block">
                                        <label for="phone" class="control-label">Name:</label>
                                        {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Name','minlength' => '2', 'data-validation-minlength-message' => 'Minimum 2 characters', 'maxlength' => '50',  'data-validation-maxlength-message' => 'Maximum 50 characters', 'autocomplete' => 'off', 'tabindex' => 1, 'title' => 'Your name', 'id' => 'regi-name']) !!}
                                        {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group d-none regi-contact_name {!! $errors->has('contact_name') ? 'error' : '' !!}">
                                    <div class="controls contact_name_block">
                                        <label for="contact_name" class="control-label">Contact name:</label>
                                        {!! Form::text('contact_name', old('contact_name'), [ 'class' => 'form-control','placeholder' => 'Contact person name', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Contact person name' ]) !!}
                                        {!! $errors->first('contact_name', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group d-none regi-designation {!! $errors->has('designation') ? 'error' : '' !!}">
                                    <div class="controls designation_block">
                                        <label for="designation" class="control-label">Designation:</label>
                                        {!! Form::text('designation', old('designation'), [ 'class' => 'form-control', 'placeholder' => 'Designation', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Designation' ]) !!}
                                        {!! $errors->first('designation', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group d-none regi-office_address {!! $errors->has('office_address') ? 'error' : '' !!}">
                                    <div class="controls office_address_block">
                                        <label for="office_address" class="control-label">Office Address:</label>
                                        {!! Form::text('office_address', old('office_address'), [ 'class' => 'form-control', 'placeholder' => 'Office address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Office address' ]) !!}
                                        {!! $errors->first('office_address', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group regi-email {!! $errors->has('email') ? 'error' : '' !!}">
                                    <div class="controls email_block">
                                        <label for="email" class="control-label">Email:</label>
                                        {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                        {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group regi-mobile {!! $errors->has('mobile') ? 'error' : '' !!}">
                                    <div class="controls mobile_block">
                                        <label for="mobile" class="control-label">Mobile No:</label>
                                        {!! Form::text('mobile', old('mobile'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Your number', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your number, It will be verify by OTP', 'id' => 'mobile_id']) !!}
                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group regi-password {!! $errors->has('password') ? 'error' : '' !!}">
                                    <div class="controls password_block">
                                        <label for="password" class="control-label">Password:</label>
                                        {!! Form::password('password', [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}
                                        {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group text-center pb-4">
                                    <button type="submit" class="btn btn-primary" id="send_button">{{ __('Register') }}</button>
                                </div>
                            </div>
                        {!! Form::close() !!}

                        <div class="login-account text-center">
                            <h3>Have an Account on BDF.com?</h3>
                            <h5>Login in your account.</h5>
                            <a href="{{route('login')}}">Login Now</a>
                        </div>

                    </div>
                    @endif

                </div>

                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection

@push('custom_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

<script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>



<script>
    var input = document.querySelector("#mobile_id");
    var iti = window.intlTelInput(input, {
        initialCountry: "bd",
      // any initialisation options go here
    });
  </script>

    <script>


    $("input[name='usertype']").click(function () {
        var usertype = $(this).val();
        if(usertype == 1){
            $('#regi-name').attr('placeholder','Name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').addClass('d-none');
        }
        if(usertype == 2){
            $('#regi-name').attr('placeholder','Name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').addClass('d-none');
        }
        if(usertype == 3){
            $('#regi-name').attr('placeholder','Company name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').removeClass('d-none');
        }
        if(usertype == 4){
            $('#regi-name').attr('placeholder','Agency name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').removeClass('d-none');
        }
    });

    </script>

<script>
    $(document).on('click', '#right_otp',function(e){
        var otp_num =  $('#otp_num1').val();

        if(otp_num == ''){
            $('.otp_num_block .help-block').text('4 digit opt is required1');
            return false;
        }
        if(otp_num.length != 4){
            $('.otp_num_block .help-block').text('4 digit opt is required');
            return false;
        }


    })
    $(document).ready(function(){

        $('#register_frm input, #register_frm textarea').jqBootstrapValidation({
         preventSubmit: true,
         submitSuccess: function($form, event){
          event.preventDefault();
          var base_url = $('#base_url').val();
          $this = $('#send_button');
          $this.prop('disabled', true);
          var form = $("#register_frm");
          var form_data = form.serializeArray();
          var action = form.attr("action");
          var countryCode = iti.getSelectedCountryData().iso2;
          form_data.push({name: 'countryCode', value: countryCode});



          $.ajax({
           url:action,
           method:"POST",
           data:form_data,
           success:function(response){
            $this.prop('disabled', false);
            if(response.status == 'success'){
                window.location.href = base_url+'/register?mode=verify&mobile='+response.data.MOBILE_NO+'&code='+response.data.COUNTRY_CODE+'&email='+response.data.EMAIL;


            }
            // $('#register_frm').trigger('reset');
           },
           error:function(reject){
            if( reject.status === 422 ) {
                var errors = $.parseJSON(reject.responseText);
                $.each(errors, function (key, val) {
                    $("." + key + "_block .help-block").text(val[0]);
                });
            }

           },
           complete:function(){
            $this.prop('disabled', false);
           }
          });

         },

        });

    });
    </script>

@endpush
