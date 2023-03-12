@extends('layouts.app')
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
@endpush

@section('content')
    <div class="login-sec">
        <div class="container">

            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">

                    <div class="login-wrap text-center">
                        <h1>Sign In & Access Your Account</h1>

                        {!! Form::open([ 'route' => 'login.post', 'method' => 'post', 'class' => 'form-horizontal mt-5 login_frm', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}

                        <input type="hidden" value="{{ request()->get('referrer') }}" name="referrer" />
                        <div class="row">
                            <div
                                class="col-12 form-group text-left login-email {!! $errors->has('email') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                    {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div
                                class="col-12 form-group text-left login-password {!! $errors->has('password') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::password('password', [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}
                                    {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <div class="col-12 form-group text-center">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <div class="forget-pass">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="create-account">
                            <h3>New to BDF.com?</h3>
                            <h5>Create your FREE Account</h5>
                            <a href="{{route('register')}}?as={{ request()->get('as') }}&referrer={{ request()->get('referrer') }}">Create Account</a>
                        </div>

                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

@endsection

@push('custom_js')
<script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
<script>
          $('.login_frm').jqBootstrapValidation({})
</script>


@endpush
