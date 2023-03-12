@extends('layouts.app')
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fastselect.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <style>
        .reply:hover {
            color: #fff
        }

        .fix_box {
            max-height: 200px;
            overflow-y: scroll
        }

        .verified-title h5 {
            max-height: 40px;
            overflow: hidden
        }

        .verified-title h6 {
            padding-top: 10px
        }

        @media (max-width: 576px) {
            .verified-title h5 {
                max-height: 30px
            }
        }

        .fix_box::-webkit-scrollbar {
            width: 6px
        }

        .fix_box::-webkit-scrollbar-track {
            background: #f1f1f1
        }

        .fix_box::-webkit-scrollbar-thumb {
            background: #888
        }

        .fix_box::-webkit-scrollbar-thumb:hover {
            background: #555
        }
    </style>
@endpush
@php
    $panel_path = env('PANEL_PATH');
    $listing = $data['listing'] ?? [];
    $features = $data['features'] ?? [];

    $type   = request()->segment(2) ?? '';
    $cat    = request()->segment(3) ?? '';
    $dhaka  = request()->segment(4) ?? '';

@endphp
@section('content')
    <div class="page-heading d-none d-md-block">
        <!-- container -->
        <div class="container">
            <div class="page-name">
                <ul>
                    <li><a href="{{ route('web.home') }}">Home <i class="fa fa-angle-double-right"></i></a></li>
                    <li>Electronics &amp; Gedget</li>
                </ul>

            </div>
        </div><!-- container -->
    </div>

    <div class="banner-form-sec d-none d-md-block">
        <!-- container -->
        <div class="container">
            <div class="banner-form">
                <form action="{{ route('web.property', ['type' => $type, 'cat' => $cat, 'city' => $dhaka]) }}"
                      method="get">
                    <div class="form-wrap">
                        <div class="form-group">
                            <select class="form-control" id="selectCity">
                                <option value="all">Select Location</option>
                                @foreach($data['cities'] as $city)
                                    <option
                                        value="{{ $city }}" {{ $city == request()->route('city') ? 'selected' : '' }}>{{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-wrap">
                        <div class="form-group">
                            <select class="form-control" id="selectCategory">
                                <option value="all">Select Category</option>
                                @if(isset($data['categories']) && count($data['categories']))
                                    @foreach($data['categories'] as $category)
                                        <option
                                            value="{{ $category->PROPERTY_TYPE }}" {{ $category->PROPERTY_TYPE == request()->route('cat') ? 'selected' : '' }}>{{
                                            $category->PROPERTY_TYPE }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="search-form">
                        <input type="text" placeholder="Type Your key word" name="search" id="search"
                               value="{{ request()->get('search') }}">
                        <button type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div><!-- container -->
    </div>

    <div class="category-nav mb-4 d-block d-md-none">
        <div class="nav-header">
            <h3>
                <a href="{{ route('web.property') }}"><i class="fa fa-long-arrow-left"></i>FILTER</a>
            </h3>
        </div>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-4 text-center">
                    <div class="category-nav-list">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#filterModal"><i
                                class="fa fa-filter"></i>Filters</a>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="category-nav-list sortby d-block d-md-none">
                        <p>
                            <select class="form-control" id="mobile_sort">
                                <option>Default</option>
                                <option value="asc" {{ request()->query('sort_by') == 'asc' ? 'selected' : '' }}>Price: low to high</option>
                                <option value="desc" {{ request()->query('sort_by') == 'desc' ? 'selected' : '' }}>Price: high to low</option>
                            </select>
                        </p>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="category-nav-list">
                        <a href="#" id="mobile_verified" data-verified="{{ request()->query('verified') ?? 0 }}"><i class="fa fa-check-square {{ request()->query('verified') == 1 ? 'text-success' : '' }}"></i>Verified</a>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <div class="categories-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-5 d-none d-md-block">
                    <div class="categorie-wrapper">
                        <div class="categorie-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingFilter">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseFilter"
                                                    aria-expanded="false" aria-controls="collapseFilter">Filter By
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFilter" class="collapse show" aria-labelledby="headingFilter"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="categories-condition">
                                                <form method="get" action="" id="conditionForm">
                                                    <div class="form-group">
                                                        <label for="verified_property">
                                                            <input class="condition" type="checkbox"
                                                                   {{ request()->query('verified') == '1' ? 'checked' : '' }} name="verified"
                                                                   value="1" id="verified_property">
                                                            Verified Property
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingAdType">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseAdType"
                                                    aria-expanded="false" aria-controls="collapseAdType">Ad Type
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseAdType" class="collapse show" aria-labelledby="headingAdType"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="categories-condition">
                                                <form method="get" action="" id="conditionForm">
                                                    <div class="form-group">
                                                        <select class="form-control" id="propertyType">
                                                            <option value="">All</option>
                                                            <option
                                                                value="sale" {{ request()->route('type') == 'sale' ? 'selected' : '' }}>
                                                                Sale
                                                            </option>
                                                            <option
                                                                value="rent" {{ request()->route('type') == 'rent' ? 'selected' : '' }}>
                                                                Rent
                                                            </option>
                                                            <option
                                                                value="roommate" {{ request()->route('type') == 'roommate' ? 'selected' : '' }}>
                                                                Roommate
                                                            </option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- all categories -->
                                @if(isset($data['categories']) && count($data['categories']))
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-left" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">All Categories
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                                <div class="categories-list">
                                                    <ul>
                                                        @foreach($data['categories'] as $category)
                                                            <li class="{{ $category->URL_SLUG == $cat ? 'active' : '' }}">
                                                                <a href="?cat={{ $category->URL_SLUG }}"
                                                                   data-value="{{ $category->URL_SLUG }}"
                                                                   class="category"><img
                                                                        src="{{ $panel_path . $category->ICON_PATH }}"
                                                                        alt=""
                                                                        class="img-fluid"> {{ $category->PROPERTY_TYPE }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="card">
                                    <div class="card-header" id="headingLoaction">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseLocation"
                                                    aria-expanded="false" aria-controls="collapseLocation">Location
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseLocation" class="collapse show" aria-labelledby="headingLoaction"
                                         data-parent="#accordionExample">
                                        <div class="card-body fix_box">
                                            <div class="categories-condition">
                                                <form method="get" action="" id="conditionForm">
                                                    <div class="form-group">
                                                        <a href="#" class="text-dark">All Bangladesh</a>
                                                        @if(isset($data['areas']))
                                                            <a href="?city={{ request()->route('city') }}"
                                                               class="ml-2 font-weight-bold text-dark"
                                                               style="display: block;">{{ request()->route('city') }}</a>
                                                            <ul class="ml-4">
                                                                @foreach($data['areas'] as $area)
                                                                    <li>
                                                                        <a href="?area={{ $area->URL_SLUG }}" class="area-filter text-dark" data-area="{{ $area->id }}">{{ $area->AREA_NAME }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- condition -->
                                @if(isset($data['conditions']) && count($data['conditions']))
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-left collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">Condition
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="categories-condition">
                                                    <form method="get" action="" id="conditionForm">
                                                        @foreach($data['conditions'] as $condition)
                                                            <label for="{{ strtolower($condition->PROD_CONDITION) }}">
                                                                <input class="condition" type="checkbox"
                                                                       name="condition"
                                                                       {{ request()->query->has('condition') ? (in_array($condition->id, explode(',', request()->query('condition'))) ? 'checked' : '') : '' }}
                                                                       value="{{ $condition->id }}"
                                                                       id="{{ strtolower($condition->PROD_CONDITION) }}">
                                                                {{ $condition->PROD_CONDITION }}
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        @endforeach
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif

                            <!-- price -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">Price
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body price-body">
                                            <div class="categories-price">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="range-form ml-1">
                                                                <input type="number" name="p_min"
                                                                       value="{{ request()->query('min_price') }}"
                                                                       class="form-control"
                                                                       placeholder="Min">
                                                            </div>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <div class="range-to">
                                                                <span>To</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="range-form mr-1">
                                                                <input type="number" name="p_max"
                                                                       value="{{ request()->query('max_price') }}"
                                                                       class="form-control"
                                                                       placeholder="Max">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <button class="filter_btn" id="priceFilter">Filter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- posted by -->
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">Posted By
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                                         data-parent="#accordionExample" style="">
                                        <div class="card-body">
                                            <div class="categories-posted">
                                                <form action="#">
                                                    <label for="induvidual">
                                                        <input type="checkbox" name="posted" value="2"
                                                               {{ posted_by(2) ? 'checked ' : '' }}
                                                               id="induvidual"> Owner
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="dealer">
                                                        <input type="checkbox" name="posted"
                                                               {{ posted_by(3) ? 'checked ' : '' }}
                                                               value="3" id="dealer">Builder
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="reseller">
                                                        <input type="checkbox" name="posted" value="4"
                                                               {{ posted_by(4) ? 'checked ' : '' }}
                                                               id="reseller"> Agency
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="Manufacturer">
                                                        <input type="checkbox" name="posted" value="5"
                                                               {{ posted_by(5) ? 'checked ' : '' }}
                                                               id="Manufacturer"> Agent
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-7">
                    <div class="categorie-product">
                        <div class="categorie-header d-flex justify-content-between">
                            <div class="categorie-title">
                                @if(isset($data['listings']) && count($data['listings']))
                                    <h2>Properties found</h2>
                                @else
                                    <h2>Properties not found</h2>
                                @endif
                            </div>
                            <div class="sortby d-none d-md-block">
                                <p>Sort By
                                    <select class="form-control" id="sortBy" name="sortBy">
                                        <option value="">Default</option>
                                        <option
                                            value="asc" {{ request()->query('sort_by') == 'asc' ? 'selected' : '' }}>
                                            Price: low to high
                                        </option>
                                        <option
                                            value="desc" {{ request()->query('sort_by') == 'desc' ? 'selected' : '' }}>
                                            Price: high to low
                                        </option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <!-- product -->
                        @if(isset($data['listings']) && count($data['listings']))
                            @foreach($data['listings'] as $listing)
                                <div class="verified-product {{ $listing->IS_TOP ? 'top_product' : '' }} mb-3">
                                    <div class="verified-wrap">
                                        <div class="row no-gutters position-relative">
                                            <div class="col-4 col-md-3">
                                                <div class="verified-bx">
                                                    <a href="{{ route('web.property.details', $listing->URL_SLUG) }}"><img
                                                            src="{{ asset($listing->getDefaultThumb->THUMB_PATH ?? '') }}"
                                                            class="img-fluid" alt="image"></a>
                                                </div>
                                                @if($listing->F_LISTING_TYPE == 2 || $listing->F_LISTING_TYPE == 4)
                                                    <div class="featured">
                                                        <div class="feature-text">
                                                            <span>Featured</span>
                                                        </div>
                                                    </div>
                                                @elseif($listing->IS_VERIFIED)
                                                    <div class="featured">
                                                        <div class="verified-text feature-text">
                                                            <span>Verified</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-8 col-md-9 position-static">
                                                <div class="verified-price">
                                                    <h3>
                                                        TK {{ number_format($listing->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                                </div>
                                                <div class="verified-title">
                                                    <h5 class="mt-0"><a
                                                            href="{{ route('web.property.details', $listing->URL_SLUG) }}">{{ $listing->TITLE }}</a>
                                                    </h5>
                                                    <h6>{{ $listing->getListingVariant && $listing->getListingVariant->BEDROOM ? $listing->getListingVariant->BEDROOM . ' Bed, ' : '' }}{{ $listing->getListingVariant && $listing->getListingVariant->BATHROOM ? $listing->getListingVariant->BATHROOM . ' Bath' : '' }}</h6>
                                                </div>
                                                <div class="verified-address">
                                                    <a href="#"><i
                                                            class="fa fa-map-marker"></i>@if($listing->SUBAREA_NAME) {{$listing->SUBAREA_NAME}}
                                                        , @endif{{ $listing->AREA_NAME . ', ' }}{{ $listing->CITY_NAME }}
                                                    </a>
                                                </div>
                                                @if($listing->IS_TOP)
                                                    <div class="top_pro">
                                                        <span>Top</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    <!-- ads -->
                        @if(isset($data['bottomAd']) && isset($data['bottomAd']->images[0]))
                            <div class="advertisement mb-3">
                                <a href="{{ $data['bottomAd']->images[0]->URL ?? 'javascript:void(0)' }}">
                                    <img
                                        src="{{ $panel_path . ($data['bottomAd']->images ? $data['bottomAd']->images[0]->IMAGE_PATH : '') }}"
                                        alt="" class="img-fluid">
                                </a>
                            </div>
                    @endif

                    <!-- pagination -->
                        <div class="pagination-wrap mt-4">
                            {{ $data['listings']->links('layouts.pagination') }}
                        </div>

                    </div>
                </div>

                @if(isset($data['rightAd']) && isset($data['rightAd']->images[0]))
                    <div class="d-none d-lg-block col-lg-2 mt-4">
                        <div class="advertisement">
                            <a href="{{ $data['rightAd']->images[0]->URL ?? 'javascript:void(0)' }}">
                                <img
                                    src="{{ $panel_path . ($data['rightAd']->images ? $data['rightAd']->images[0]->IMAGE_PATH : '') }}"
                                    alt="Images" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <!-- row -->
        </div><!-- container -->
    </div>



@endsection

@push('custom_js')
    <script>
        $(document).ready(function () {
            let makeWait;
            let data = {
                condition: '',
                p_min: '',
                p_max: '',
                type: '{{ request()->route('type') ?? '' }}',
                city: '{{ request()->route('city') ?? '' }}',
                category: '{{ request()->route('cat') ?? '' }}',
                posted_by: '',
                sort_by: '',
                verified: '',
                area: 0
            };

            let condition = $('.condition');
            let priceMin = $('input[name=p_min]');
            let priceMax = $('input[name=p_max]');
            let category = $('.category');
            let sortBy = $('#sortBy');
            let verified = $('#verified_property');
            let postedBy = $('input[name=posted]');
            let propertyType = $('#propertyType');
            let selectCategory = $('#selectCategory');
            let selectCity = $('#selectCity');
            let area = $('.area-filter');

            area.click(function (e) {
                e.preventDefault();
                data.area = $(this).data('area');
                filter();
            });

            selectCategory.change(function () {
                {{--window.location = '{{ route('web.property') }}' + (propertyType.val() === '' ? '/all' : '/' + propertyType.val()) + '/'--}}
                    {{--    + selectCategory.val();--}}
                    data.category = selectCategory.val();
                filter();
            });

            selectCity.change(function () {
                data.city = selectCity.val();
                filter();
            });

            propertyType.change(function () {
                {{--window.location = '{{ route('web.property') }}' + (propertyType.val() === '' ? '/all' : '/' + propertyType.val());--}}
                    data.type = propertyType.val();
                filter();
            });

            $('#priceFilter').click(function (e) {
                e.preventDefault();
                filter();
            });

            category.click(function (e) {
                e.preventDefault();
                data.category = $(this).data('value');
                filter();
            });

            sortBy.change(function () {
                filter();
            });

            verified.change(function () {
                filter();
            });

            condition.click(function () {
                filter();
            });

            postedBy.click(function () {
                // console.log($(this).val())
                filter();
            });

            function filter() {
                clearTimeout(makeWait);
                makeWait = setTimeout(function () {
                    let s = '';
                    $('input[name=condition]:checkbox:checked').each(function (i) {
                        s += $(this).val() + ',';
                    });
                    data.condition = s.substring(0, s.length - 1);

                    let r = '';
                    $('input[name=posted]:checkbox:checked').each(function (i) {
                        r += $(this).val() + ',';
                    });
                    data.posted_by = r.substring(0, r.length - 1);

                    data.sort_by = sortBy.val();
                    data.verified = verified.is(':checked') ? 1 : 0;
                    data.type = propertyType.val();

                    data.p_min = priceMin.val();
                    data.p_max = priceMax.val();

                    window.location = getUrl();
                }, 500);
            }

            function getUrl() {
                let url = '{{ route('web.property') }}';
                if (data.city !== '') {
                    url += (data.type !== '' ? '/' + data.type : '/all');
                    url += (data.category !== '' ? '/' + data.category : '/all');
                    url += '/' + data.city;
                } else if (data.category !== '') {
                    url += (data.type !== '' ? '/' + data.type : '/all');
                    url += '/' + data.category;
                } else if (data.type !== '') {
                    url += '/' + data.type;
                }

                let useAnd = false;
                if (data.area > 0) {
                    url += '?area=' + data.area;
                }

                if (data.condition !== '') {
                    url += (useAnd ? '&' : '?') + 'condition=' + data.condition;
                    useAnd = true;
                }

                if (data.p_min !== '') {
                    url += (useAnd ? '&' : '?') + 'min_price=' + data.p_min;
                    useAnd = true;
                }

                if (data.p_max !== '') {
                    url += (useAnd ? '&' : '?') + 'max_price=' + data.p_max;
                    useAnd = true;
                }

                if (data.verified !== '') {
                    url += (useAnd ? '&' : '?') + 'verified=' + data.verified;
                    useAnd = true;
                }

                if (data.posted_by !== '') {
                    url += (useAnd ? '&' : '?') + 'posted_by=' + data.posted_by;
                    useAnd = true;
                }

                if (data.sort_by !== '') {
                    url += (useAnd ? '&' : '?') + 'sort_by=' + data.sort_by;
                }

                return url;
            }
        })
    </script>
@endpush
