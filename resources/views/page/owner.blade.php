@extends('layouts.app')
@push('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fastselect.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
@endpush
@php
    $panel_path = env('PANEL_PATH');
    $owner = $data['owner'] ?? [];
@endphp
@section('content')
    <div class="member-shop-sec mt-3 mb-2">
        <!-- container -->
        <div class="container">
            <div class="shop-banner">
                <div class="shop-bx">
                    <img src="{{ $owner->info->BANNER ? $panel_path . $owner->info->BANNER : asset('assets/img/default_banner.jpg') }}" class="w-100" alt="banner">
                </div>
                <div class="company-profile d-flex justify-content-between">
                    <div class="company-logo">
                        <img src="{{ $owner->info->LOGO ? $panel_path . $owner->info->LOGO : asset('assets/img/default_img.png') }}" alt="logo">
                    </div>
                    <div class="company-name">
                        <h4>{{ $owner->NAME }}</h4>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row mt-3">
                <div class="col-md-7">
                    <div class="company-details">
                        <h1>{{ $owner->NAME }}</h1>
                        <p>{{ $owner->info->ABOUT_COMPANY ?? '' }}</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="company-info">
                        <ul>
                            <li>
                                <i class="fa fa-check"></i>
                                {{ $data['open'] ? 'Open now' : 'Closed' }} <br>
                                @if($data['open'])
                                    Open today: {{ \Carbon\Carbon::createFromFormat('H:i', $owner->info->SHOP_OPEN_TIME ?? '12:00')->format('g:i a') }} - {{ \Carbon\Carbon::createFromFormat('H:i', $owner->info->SHOP_CLOSE_TIME ?? '23:00')->format('g:i a') }}
                                @else
                                    &nbsp;
                                @endif
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                Address <br>
                                {{ $owner->ADDRESS ?? ' ' }}
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                Call us <br>
                                {{ $owner->MOBILE_NO }}
                            </li>
                            <li class="">
                                <i class="fa fa-envelope"></i>
                                Email Us <br>
                                {{ $owner->EMAIL }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

    @if(isset($owner->listings) && count($owner->listings))
        <div class="shop-sec mb-5">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- product -->
                    @foreach($owner->listings as $listing)
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                            <div class="featured-wrap" style="height: 100%">
                                <div class="featured-bx">
                                    <a href="{{ route('web.property.details', $listing->URL_SLUG) }}"><img
                                            src="{{ asset($listing->getDefaultThumb->THUMB_PATH ?? '') }}"
                                            class="img-fluid" alt="image"></a>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-price">
                                        <h3>
                                            TK {{ number_format($listing->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                    </div>
                                    <div class="featured-info">
                                        <h2>
                                            <a href="{{ route('web.property.details', $listing->URL_SLUG) }}">{{ Str::limit($listing->TITLE, 40) }}</a>
                                        </h2>
                                        <span>{{ $listing->getListingVariant && $listing->getListingVariant->BEDROOM ? $listing->getListingVariant->BEDROOM . ' Bed, ' : '' }}{{ $listing->getListingVariant && $listing->getListingVariant->BATHROOM ? $listing->getListingVariant->BATHROOM . ' Bath' : '' }}</span>
                                    </div>
                                    <div class="featured-footer">
                                        <div class="address">
                                            <a href="#"><i class="fa fa-map-marker"></i>{{ $listing->AREA_NAME . ', ' }}{{ $listing->CITY_NAME }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!-- row -->
            </div><!-- container -->
        </div>
    @endif

@endsection

@push('custom_js')
@endpush
