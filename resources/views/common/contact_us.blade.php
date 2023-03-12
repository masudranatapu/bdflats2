@extends('layouts.app')
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
@endpush
@section('content')
    <!--
    ============   page-header    ============
 -->
    <div class="page-heading">
        <!-- container -->
        <div class="container">
            <div class="page-name">
                <ul>
                    <li><a href="{{url('/')}}">Home <i class="fa fa-angle-double-right"></i></a></li>
                    <li>Contact</li>
                </ul>
                <h1>Contact Us</h1>
            </div>
        </div><!-- container -->
    </div>


    <!--
        ============   contact   ============
    -->
    <div class="contact-sec mb-5">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-4 mb-5">
                    @php
                        $webSetting = setting();
                    @endphp
                    <div class="contact-info">
                        <h3>bdflats info</h3>
                        <ul>
                            <li><strong>Address:</strong>{{ $webSetting->HQ_ADDRESS ?? '' }}</li>
                            <li><strong>Phone:</strong><a href="tel:{{ $webSetting->PHONE_1 ?? '' }}">{{ $webSetting->PHONE_1 ?? '' }}</a></li>
                            <li><strong>Email:</strong><a href="mailto:{{ $webSetting->EMAIL_1 ?? '' }}">{{ $webSetting->EMAIL_1 ?? '' }}</a></li>
                        </ul>
                        <div class="contact-social">
                            <ul>
                                @if($webSetting->FACEBOOK_URL)
                                <li><a target="_blank" href="{{ $webSetting->FACEBOOK_URL }}"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if($webSetting->TWITTER_URL)
                                <li><a target="_blank" href="{{ $webSetting->TWITTER_URL }}"><i class="fa fa-twitter"></i></a></li>
                                @endif
                                @if($webSetting->PINTEREST_URL)
                                <li><a target="_blank" href="{{ $webSetting->PINTEREST_URL }}"><i class="fa fa-pinterest"></i></a></li>
                                @endif
                                @if($webSetting->INSTAGRAM_URL)
                                <li><a target="_blank" href="{{ $webSetting->INSTAGRAM_URL }}"><i class="fa fa-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h3>Send Us Your Feedback</h3>
                        {!! Form::open([ 'route' => 'contact-us', 'method' => 'post', 'novalidate', 'autocomplete' => 'off', 'id' => 'contactForm']) !!}
                        <div class="form-row">
                            <div class="col-sm-6 form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Name']) !!}
                                    {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-sm-6 form-group {!! $errors->has('email') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email']) !!}
                                    {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group {!! $errors->has('subject') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('subject', old('subject'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Subject']) !!}
                                    {!! $errors->first('subject', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group {!! $errors->has('message') ? 'error' : '' !!}">
                                <div class="controls">
                                {!! Form::textarea('message', old('message'), [ 'id'=>'message','class' => 'msg-area form-control','data-validation-required-message' => 'This field is required', 'placeholder' => 'Message']) !!}
                                {!! $errors->first('message', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <div class="col-12 form-group {!! $errors->has('message') ? 'error' : '' !!}">
                                <div class="controls">
                                    <input type="hidden" name="randtotal" id="randtotal">
                                    <p>
                                        <span id="random1"></span>
                                        <span>&nbsp;+&nbsp;</span>
                                        <span id="random2"></span> = ?
                                        {!! Form::hidden('num1', '', ['id' => 'num1']) !!}
                                        {!! Form::hidden('num2', '', ['id' => 'num2']) !!}
                                        {!! Form::number('capt', old('capt'), ['id'=>'usernumber' ,'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'result...'],'oninput','checkInputValCapt(this);') !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-12">
                                {!! Form::submit('Submit Your Message', ['id'=>'submit']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>



@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        $(document).on('submit', '#contactForm', function (e) {
            // e.preventDefault();
            if (check()) {
                return true;
            }
            return false;
        });

        //Function for a Numbers(Replacing anything old) and emptying the input value
        let randomNum1, randomNum2, flag, timesWrong = 0;
        function differentProblem() {
            randomNum1 = Math.floor((Math.random() * 10) + 1);
            randomNum2 = Math.floor((Math.random() * 10) + 1);
            $("#random1").empty().append(randomNum1);
            $("#random2").empty().append(randomNum2);
            $("#num1").val(randomNum1);
            $("#num2").val(randomNum2);
            $("#usernumber").val("");
        }

        function timesWrongPlural() {
            return timesWrong > 1 ? 's' : '';
        }

        //Check to see if the user field is equal to the math total
        function check() {
            let humanNumber = parseInt($('#usernumber').val());
            let randomTotal = randomNum1 + randomNum2;
            if (randomTotal === humanNumber) {
                return true;
            } else if ($('#usernumber').val() === "") {
                flag = false;
                $(this).focus();
                $('#usernumber').addClass('err-input');
                // alert("Please enter an answer.");
                return false;
            } else {
                flag = false;
                timesWrong++;
                if (timesWrong >= 5) {
                    alert("You're too stupid and shouldn't be doing this. I'm taking it away.");
                    return false;
                } else {
                    alert("Number is wrong. Wrong " + timesWrong + " time" + timesWrongPlural() + ".");
                    differentProblem();
                    return false;
                }
            }


            if (true === flag) {
                e.preventDefault();
            }
        }

        function checkInputPass(e) {
            if ($(e).val().length < 8) {
                $(e).addClass('err-input');
            } else {
                $(e).removeClass('err-input');
            }
        }

        function checkInputVal(e) {
            if ('' === $(e).val()) {
                $(e).addClass('err-input');
            } else {
                $(e).removeClass('err-input');
            }
        }

        function checkInputValCapt(e) {
            let humanNumber = parseInt($(e).val());
            let randomTotal = randomNum1 + randomNum2;
            $("#randtotal").val(randomTotal);
            if (randomTotal === humanNumber) {
                $(e).removeClass('err-input');
            } else {
                $(e).addClass('err-input');
            }
        }


        //Running a first time to get numbers set
        $(document).ready(function () {
            differentProblem();
        });


    </script>
@endpush
