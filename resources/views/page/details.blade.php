@extends('layouts.app')
@push('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/css/4.5.3.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fastselect.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <style>
        .reply:hover {
            color: #fff;
        }

        .img-fluid, .img-thumbnail {
            max-width: 100%;
        }
    </style>
@endpush
@php
    $panel_path = env('PANEL_PATH');
    $listing = $data['listing'] ?? [];
    $features = $data['features'] ?? [];
@endphp
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="page-name">
                <ul>
                    <li><a href="{{ route('web.home') }}">Home <i class="fa fa-angle-double-right"></i></a></li>
                    <li><a href="{{ route('web.home') }}">Electronices &amp; Gedget <i
                                class="fa fa-angle-double-right"></i></a></li>
                    <li>Mobile Phone</li>
                </ul>
            </div>
        </div><!-- container -->
    </div>
    <div class="single-product-sec">
        <!-- container -->
        <div class="container">
            <div class="singleproduct">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-7">
                        @if(isset($listing->images) && count($listing->images))
                            <div class="single-product-slider">
                                <div id="carouselExampleIndicators" class="carousel slide pointer-event"
                                     data-ride="carousel">

                                    <ol class="carousel-indicators">
                                        @foreach($listing->images as $key => $image)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                                class="{{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($image->THUMB_PATH) }}" alt="image"
                                                     class="img-fluid">
                                            </li>
                                        @endforeach
                                    </ol>

                                    <div class="carousel-inner">
                                        @foreach($listing->images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <a href="{{ asset($image->IMAGE_PATH) }}" class="popup">
                                                    <img style="max-height: 415px"
                                                         src="{{ asset($image->IMAGE_PATH) }}" class="d-block w-100"
                                                         alt="image"></a>
                                            </div>
                                        @endforeach
                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                       data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                       data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>

                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-5">
                        <div class="single-product-details">
                            <div class="single-product">
                                <div class="single-price">
                                    <h4>Tk {{ number_format($listing->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h4>
                                </div>
                                <div class="single-title">
                                    <h1>{{ $listing->TITLE }}</h1>
                                    <p><span>Offered by: <a
                                                href="{{ route('web.owner', $listing->owner->id) }}">{{ $listing->owner->NAME ?? '' }}</a></span>
                                    </p>
                                    <p><span>Ad ID: <a href="#">{{ $listing->CODE ?? ''  }}</a></span>
                                    </p>
                                    <p>
                                        <i class="fa fa-map-marker"></i>@if($listing->SUBAREA_NAME) {{ $listing->SUBAREA_NAME }}
                                        , @endif {{ $listing->AREA_NAME ?? '' }}
                                        , {{ $listing->CITY_NAME }}</p>
                                    <p><i class="fa fa-suitcase"></i> ({{ ucwords($listing->PROPERTY_FOR ?? '') }})</p>
                                </div>

                                <div class="short-info">
                                    <h3>Short Info</h3>
                                    <p>Condition:<a href="#">{{ $listing->PROPERTY_CONDITION ?? '' }}</a></p>
                                    <p>Size (Sqft):<a href="#">{{ $listing->getListingVariant->PROPERTY_SIZE ?? '' }}</a></p>
                                    <p>Bedroom:<a href="#">{{ $listing->getListingVariant->BEDROOM ?? '' }}</a></p>
                                    <p>Bathroom:<a href="#">{{ $listing->getListingVariant->BATHROOM ?? '' }}</a></p>
                                    <p>Facing:<a href="#">{{ $listing->additionalInfo->FACING ?? '' }}</a></p>
                                    <p>Features:
                                        @foreach($features as $key => $feature)
                                            <a href="javascript:void(0)">{{ $feature->TITLE }}@if($key < count($features) - 1)
                                                    , @endif</a>
                                        @endforeach
                                    </p>
                                    @if(isset($listing->variants) && count($listing->variants))
                                        <p>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                               class="text-danger"
                                               data-target="#extra_variants">More</a>
                                        </p>
                                    @endif
                                </div>
                                <div class="contect-with">
                                    <h3>Contact With</h3>
                                    @if($listing->CI_PAYMENT == 1)
                                        @if(Auth::check())
                                            @if(Auth::user()->USER_TYPE == 1)
                                                @if($listing->CI_PRICE > 0 )
                                                    @if($listing->PURCHASE_DATE)
                                                        <span class="mb-2 mr-3">
                                                            <i class="fa fa-phone"></i>
                                                                <a class="Show_num"
                                                                href="tel:{{ $listing->MOBILE1 }}">{{ $listing->MOBILE1 }}</a>
                                                        </span>
                                                        @if($listing->MOBILE2)
                                                            <span class="mb-2 mr-3">
                                                                <i class="fa fa-phone"></i>
                                                                    <a class="Show_num"
                                                                    href="tel:{{ $listing->MOBILE2 }}">{{ $listing->MOBILE2 }}</a>
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span class="mb-2 mr-3" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-phone"></i><span class="hide_text">Show Number</span></span>

                                                    @endif
                                                @else
                                                    <span class="mb-2 mr-3">
                                                        <i class="fa fa-phone"></i>
                                                            <a class="Show_num" href="tel:{{ $listing->MOBILE1 }}">{{ $listing->MOBILE1 }}</a>
                                                    </span>
                                                    @if($listing->MOBILE2)
                                                        <span class="mb-2 mr-3">
                                                            <i class="fa fa-phone"></i>
                                                                <a class="Show_num" href="tel:{{ $listing->MOBILE2 }}">{{ $listing->MOBILE2 }}</a>
                                                        </span>
                                                    @endif
                                                @endif

                                            @else
                                                <span class="mb-2 mr-3" onclick="alert('Only seeker can see the number!')"><i class="fa fa-phone"></i><span class="hide_text">Show Number</span></span>
                                            @endif
                                        @else
                                            <span class="mb-2 mr-3" @if(!Auth::check()) data-toggle="modal"
                                                  data-target="#exampleModal" @endif ><i class="fa fa-phone"></i><span
                                                    class="hide_text">Show Number</span></span>
                                        @endif
                                    @else
                                        <span class="mb-2 mr-3">
                                            <i class="fa fa-phone"></i>
                                                <a class="Show_num"
                                                   href="tel:{{ $listing->MOBILE1 }}">{{ $listing->MOBILE1 }}</a>
                                        </span>
                                        @if($listing->MOBILE2)
                                            <span class="mb-2 mr-3">
                                                <i class="fa fa-phone"></i>
                                                    <a class="Show_num"
                                                       href="tel:{{ $listing->MOBILE2 }}">{{ $listing->MOBILE2 }}</a>
                                            </span>
                                        @endif
                                    @endif

                                    {{-- <a href="#" class="reply"><i class="fa fa-envelope"></i>Reply by email</a> --}}
                                </div>
                                <div class="share-product">
                                    <h3>Share this ad</h3>
                                    <ul>
                                        <li><a target="_blank"
                                               href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"
                                               class="fb"><i
                                                    class="fa fa-facebook-square"></i></a></li>
                                        <li><a target="_blank"
                                               href="https://twitter.com/intent/tweet?url={{url()->current()}}"
                                               class="tw"><i
                                                    class="fa fa-twitter-square"></i></a></li>
                                        <li><a target="_blank"
                                               href="https://plus.google.com/share?url={{url()->current()}}"
                                               class="ggle"><i
                                                    class="fa fa-google-plus-square"></i></a></li>
                                        <li><a target="_blank"
                                               href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}"
                                               class="lin"><i
                                                    class="fa fa-linkedin-square"></i></a></li>
                                        <li><a target="_blank"
                                               href="https://www.pinterest.com/pin/create/bookmarklet/?media=http%3A%2F%2Fgdurl.com%2Fa653&url={{url()->current()}}"
                                               class="pin"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a target="_blank"
                                               href="http://www.tumblr.com/share/link?name={!! $listing->additionalInfo->DESCRIPTION ?? '' !!} {{url()->current()}}&url={{url()->current()}}"
                                               class="tum"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div>
        </div><!-- container -->
    </div>

    <div class="product-des">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="des-product">
                        <h3>Description</h3>
                        {!! $listing->additionalInfo->DESCRIPTION ?? '' !!}
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    @if(isset($data['rightAd']) && isset($data['rightAd']->images[0]))
                        <div class="product-ads">
                            <a href="{{ $data['rightAd']->images[0]->URL ?? 'javascript:void(0)' }}"
                               target="_blank"><img
                                    src="{{ $panel_path . $data['rightAd']->images[0]->IMAGE_PATH }}" class="w-100"
                                    alt="image"></a>
                        </div>
                    @endif
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

    <div class="recommended-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 mb-5">
                    <div class="recommended-product">

                        @if(isset($data['similarListings']) && count($data['similarListings']))
                            <div class="recommended-title">
                                <h2>Similar Properties for you</h2>
                            </div>
                            <div class="row">
                                @foreach($data['similarListings'] as $property)
                                    <div class="col-lg-12 mb-3">
                                        <!-- product -->
                                        <div class="sale-wrapper" style="height: 100%;">
                                            <div class="sale-product" style="height: 100%;">
                                                <div class="row no-gutters position-relative">
                                                    <div class="col-3">
                                                        <div class="category-bx">
                                                            <a href="{{ route('web.property.details', $property->url_slug) }}"><img
                                                                    src="{{ defaultThumb($property->getDefaultThumb->THUMB_PATH ?? '') }}"
                                                                    class="img-fluid" alt="image"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 position-static">
                                                        <div class="category-price">
                                                            <h3>
                                                                TK {{ number_format($property->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                                        </div>
                                                        <div class="category-title">
                                                            <h5 class="mt-0"><a
                                                                    href="{{ route('web.property.details', $property->url_slug) }}">{{ $property->TITLE }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="category-address">
                                                            <a href="#"><i
                                                                    class="fa fa-map-marker"></i>@if($property->SUBAREA_NAME) {{$property->SUBAREA_NAME}}
                                                                , @endif{{ $property->AREA_NAME }}
                                                                , {{ $property->CITY_NAME }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <!-- <div class="col-md-4 text-center mb-5">
                    <div class="recommended-cta">

                        <div class="secure-cat">
                            <img src="{{ asset('assets/img/icon/13.png') }}" alt="image">
                            <h3>Secure Trading</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>

                        <div class="support-cat">
                            <img src="{{ asset('assets/img/icon/14.png') }}" alt="image">
                            <h3>24/7 Support</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>

                        <div class="trading-cat">
                            <img src="{{ asset('assets/img/icon/15.png') }}" alt="image">
                            <h3>Easy Trading</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>

                        <div class="need-help">
                            <h3>Need Help?</h3>
                            <p>Give a call on 08048100000</p>
                        </div>

                    </div>
                </div> -->
            </div><!-- row -->
        </div>
        <!-- container -->
    </div>

    @include('layouts.post-ad')

    <!-- Modal -->
    <div class="modal fade" id="loginRegModal" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" style="position:absolute;right:18px;top:5px;font-size:40px;z-index: 1;"
                        class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="login-wrap text-center" id="loginModal">
                        <h1>Sign In & Access Your Account</h1>
                        {!! Form::open(['method' => 'post', 'id'=>'login_user', 'class' => 'form-horizontal mt-5', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                        @csrf
                        <div class="row">
                            <div
                                class="col-12 form-group text-left login-email {!! $errors->has('email') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::email('email', old('email'), ['id'=>'emailInput', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}

                                    <span class="invalid-feedback" role="alert" id="emailError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 form-group text-left login-password {!! $errors->has('password') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::password('password', ['id'=>'emailInput', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}

                                    <span class="invalid-feedback" role="alert" id="passwordError">
                                        <strong></strong>
                                    </span>
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
                            <a href="#" id="regModalBtn">Create Account</a>
                        </div>
                    </div>


                    <div class="sign-wrap d-none" id="regModal">
                        <h1>Create Your BDFlats.com Account</h1>
                        {!! Form::open(['id'=>'reg_user', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                        <div class="account-info">
                            <h5>I am:</h5>
                            <input type="radio" name="usertype" value="1" id="seeker" checked> <label for="seeker">Seeker</label>
                            <input type="radio" name="usertype" value="2" id="owner"> <label for="owner">Owner</label>
                            <input type="radio" name="usertype" value="3" id="builder"> <label
                                for="builder">Builder</label>
                            <input type="radio" name="usertype" value="4" id="agency"> <label
                                for="agency">Agency</label>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group regi-name {!! $errors->has('name') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Name','minlength' => '2', 'data-validation-minlength-message' => 'Minimum 2 characters', 'maxlength' => '50',  'data-validation-maxlength-message' => 'Maximum 50 characters', 'autocomplete' => 'off', 'tabindex' => 1, 'title' => 'Your name', 'id' => 'nameInput']) !!}

                                    <span class="invalid-feedback" role="alert" id="nameError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 form-group d-none regi-contact_name {!! $errors->has('contact_name') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('contact_name', old('contact_name'), [ 'class' => 'form-control','placeholder' => 'Contact person name', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Contact person name' ]) !!}

                                    <span class="invalid-feedback" role="alert" id="contact_nameError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 form-group d-none regi-designation {!! $errors->has('designation') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('designation', old('designation'), [ 'class' => 'form-control', 'placeholder' => 'Designation', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Designation' ]) !!}

                                    <span class="invalid-feedback" role="alert" id="designationError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 form-group d-none regi-office_address {!! $errors->has('office_address') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('office_address', old('office_address'), [ 'class' => 'form-control', 'placeholder' => 'Office address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Office address' ]) !!}
                                    {!! $errors->first('office_address', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group regi-email {!! $errors->has('email') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::email('email', old('email'), ['id'=>'emailInput', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}

                                    <span class="invalid-feedback" role="alert" id="emailError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 form-group regi-mobile {!! $errors->has('mobile') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('mobile', old('mobile'), ['id'=>'mobileInput', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Your number', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your number, It will be verify by OTP']) !!}

                                    <span class="invalid-feedback" role="alert" id="mobileError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 form-group regi-password {!! $errors->has('password') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::password('password', ['id'=>'passwordInput', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}
                                    <span class="invalid-feedback" role="alert" id="passwordError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 form-group text-center pb-4">
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        <div class="login-account text-center">
                            <h3>Have an Account on BDF.com?</h3>
                            <h5>Login in your account.</h5>
                            <a href="javascript:void(0)" id="loginModalBtn">Login Now</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-wrap text-center">
                        @auth
                            {!! Form::open([ 'route' => ['lead.pay',$listing->id], 'method' => 'post', 'id'=>'login_user', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            <div class="row">
                                @if(Auth::user()->UNUSED_TOPUP < $listing->CI_PRICE )
                                    <div class="col-12">
                                        <p style="font-size: 20px;color: #FF3521;display: inline-block;margin-bottom: 25px !important;">
                                            Sorry ! you do not have sufficiant
                                            balance to buy this lead.</p>
                                        <p>Your current balance</p>
                                        <strong
                                            style="font-size: 28px;color: #3986FA;display: inline-block;margin-bottom: 25px !important;">BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</strong>
                                    </div>
                                    <div class="col-12 form-group text-center">
                                        <a href="{{route('recharge-balance') . '?attempt=1'}}"
                                           class="btn btn-success">{{ __('Recharge Now') }}</a>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <p style="font-size: 20px;font-weight: bold;margin-bottom: 12px !important;">
                                            This property has been verified by bdflats.com</p>
                                        <p style="color: #6ABD50;font-weight: bold; margin-bottom: 25px !important;">If
                                            you want ot view the contact details including mobile
                                            number & address</p>
                                        <p>Please Pay:</p>
                                        <strong
                                            style="font-size: 28px;color: #FF3521;display: inline-block;margin-bottom: 25px !important;">BDT {{ number_format($listing->CI_PRICE,2) }}</strong>
                                        <p>Your current balance</p>
                                        <strong
                                            style="font-size: 28px;color: #6ABD50;display: inline-block;margin-bottom: 25px !important;">BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</strong>
                                    </div>

                                    <div class="col-12 form-group text-center">
                                        <button style="width: 120px" type="submit"
                                                class="btn btn-success">{{ __('Pay Now') }}</button>
                                    </div>

                                @endif
                            </div>
                            {!! Form::close() !!}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($listing->variants) && count($listing->variants))
        <div class="modal fade" id="extra_variants" tabindex="-1" aria-labelledby="extra_variantsLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="extra_variantsLabel">More Variants</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="nav modalcategory flex-column nav-pills" id="v-pills-tab" role="tablist"
                                     aria-orientation="vertical">
                                    <table class="table text-center table-striped"
                                           style="font-family: 'Montserrat-Medium';font-size: 14px">
                                        <thead>
                                        <tr>
                                            <th>BED</th>
                                            <th>BATH</th>
                                            <th>PRICE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listing->variants as $variant)
                                            <td>{{ $variant->BEDROOM }}</td>
                                            <td>{{ $variant->BATHROOM }}</td>
                                            <td>{{ number_format($variant->TOTAL_PRICE, 2) }}</td>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('custom_js')
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/fastselect.standalone.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/hc-offcanvas-nav.js?ver=6.1.1') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script type="text/javascript">
        $('#login_user').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            $(".invalid-feedback").children("strong").text("");
            $("#registerForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('login') }}",
                data: formData,
                success: function (data) {
                    window.location.reload();
                },
                error: (response) => {
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    } else {
                        window.location.reload();
                    }
                }
            })
        });

        $('#reg_user').submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            $(".invalid-feedback").children("strong").text("");
            $("#registerForm input").removeClass("is-invalid");
            $.ajax({
                method: "POST",
                headers: {
                    Accept: "application/json"
                },
                url: "{{ route('register') }}",
                data: formData,
                {{--success: () => window.location.assign("{{ route('home') }}"),--}}
                error: (response) => {
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            $("#" + key + "Input").addClass("is-invalid");
                            $("#" + key + "Error").children("strong").text(errors[key][0]);
                        });
                    } else {
                        window.location.reload();
                    }
                }
            })
        });
    </script>

    <script>
        $('#regModalBtn').on('click', function () {
            $('#loginModal').removeClass('d-block');
            $('#loginModal').addClass('d-none');
            $('#regModal').removeClass('d-none');
            $('#regModal').addClass('d-block');
        });

        $('#loginModalBtn').on('click', function () {
            $('#loginModal').removeClass('d-none');
            $('#loginModal').addClass('d-block');
            $('#regModal').removeClass('d-block');
            $('#regModal').addClass('d-none');
        });

        $(document).on('click', '.modalcategory .nav-link', function () {
            $('.modalcategory').hide();
            $('.modalsubcategory').show();
            $('.backcategory').show();
        });
        $(document).on('click', '.backcategory', function () {
            $('.modalsubcategory').hide();
            $('.modalcategory').show();
        });

        // multiple select area
        $(document).ready(function () {
            $('.multipleSelect').fastselect();
        })

        // image Magnific Popup
        $('.popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        (function ($) {
            //  sidebar menu
            var Nav = new hcOffcanvasNav('#main-nav', {
                disableAt: false,
                customToggle: '.toggle',
                levelSpacing: 40,
                levelTitles: false,
                levelTitleAsBack: true,
                labelClose: false
            });

        })(jQuery);
    </script>
@endpush
