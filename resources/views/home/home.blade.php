@extends('layouts.app')
@push('custom_css')
    <style type="text/css">
        .owl-carousel .owl-item img {
            width: 100%
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
    </style>
@endpush
@php
    $panel_path = env('PANEL_PATH');
@endphp
@section('content')
    <!--
   ============  mobile banner  ============
 -->
    <div class="banner-sec d-block d-md-none">
        <!-- container -->
        <div class="container text-center">
            <div class="banner-article">
                <h2>Welcome to bdflats</h2>
                <h5>No.1 Property Maarketplace</h5>
            </div>
        </div>
        <!-- container -->
    </div>

    <!--
       ============  mobile search box  ============
     -->
    <div class="d-block d-md-none" style="position: relative;z-index: 2;margin-top: -21px">
        <!-- container -->
        <div class="container">
            <form method="get" action="{{ route('web.property') }}" class="d-flex">
                <input type="text" name="search" class="form-control border-0" value="{{ request()->query('search') }}"
                       placeholder="Search cities, localities, property name & ID">
                <button type="submit" class="bg-transparent border-0"><i class="fa fa-search float-right fa-2x" style="position: absolute;right: 30px;top: 5px;color: #d83831"></i></button>
            </form>
        </div><!-- container -->
    </div>

    <!--
        ============  slider  ============
     -->
    <div class="slider d-none d-md-block">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            @if(isset($data['sliders']) && count($data['sliders']))
                <ol class="carousel-indicators">
                    @foreach($data['sliders'] as $key => $slider)
                        <li data-target="#carouselExampleFade" data-slide-to="{{ $key }}"
                            class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($data['sliders'] as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset($slider->banner) }}" class="d-block w-100"
                                 alt="{{ $slider->title }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>


    <!--
        ============  category  ============
     -->
    <div class="category-sec">
        <!-- container -->
        <div class="container">
            <!-- heading -->
            <div class="category-heading text-center">
                <h1 class="d-none d-md-block">Verified Property Marketplace for Buy, Sale and Rent</h1>
                <h2 class="d-block d-md-none">Explore with Property Type</h2>
                <p class="d-none d-md-block">Sed ut perspiciatis unde omnis uste natus error sit volupteatem <br/>Accusantium
                    doloremque laudantium</p>
            </div>
            <!-- heading -->

            <!-- row -->
            <div class="row">
                <div class="d-none d-md-block col-md-2 text-center">
                    @if($data['leftAd'] && isset($data['leftAd']->images[0]))
                        <div class="advertisement">
                            <a href="{{ $data['leftAd']->images[0]->URL ?? 'javascript:void(0)' }}" target="_blank"><img
                                    src="{{ $panel_path . ($data['leftAd']->images ? $data['leftAd']->images[0]->image_path : '') }}"
                                    alt="Images"
                                    class="img-fluid"></a>
                        </div>
                    @endif
                </div>

                <!-- product-list -->
                <div class="col-md-8">
                    <!-- categorys -->
                    <div class="section category-ad text-center">
                        <ul class="category-list">
                            @if(isset($data['categories']) && count($data['categories']))
                                <div class="row">
                                    @foreach($data['categories'] as $category)
                                        <div class="col-6 col-sm-3">
                                            <!-- category-item -->
                                            <li class="category-item">
                                                <a href="{{ route('web.property', ['type' => 'all', 'cat' => $category->url_slug]) }}">
                                                    <div class="category-icon"><img
                                                            src="{{ $panel_path . $category->ICON_PATH }}"
                                                            alt="" class="img-fluid"></div>
                                                    <span class="category-title">{{ $category->PROPERTY_TYPE }}</span>
                                                    <span
                                                        class="category-quantity">({{ $category->total_listing }})</span>
                                                </a>
                                            </li>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </ul>
                    </div><!-- category-ad -->
                </div>

                <div class="d-none d-md-block col-md-2 text-center">
                    @if($data['rightAd'] && isset($data['rightAd']->images[0]))
                        <div class="advertisement">
                            <a href="{{ $data['rightAd']->images[0]->URL ?? 'javascript:void(0)' }}"
                               target="_blank"><img
                                    src="{{ $panel_path . ($data['rightAd']->images ? $data['rightAd']->images[0]->image_path : '') }}"
                                    alt="Images"
                                    class="img-fluid"></a>
                        </div>
                    @endif
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!--
        ============ Bottom ads ============
    -->
    @if(isset($data['bottomAd']) && isset($data['bottomAd']->images[0]))
        <div class="ads-sec mb-4 mt-3">
            <!-- container -->
            <div class="container text-center">
                <div class="ads">
                    <a href="{{ $data['bottomAd']->images[0]->URL ?? 'javascript:void(0)' }}" target="_blank"><img
                            src="{{ $panel_path . ($data['bottomAd']->images ? $data['bottomAd']->images[0]->image_path : '') }}"
                            class="img-fluid" alt="image"></a>
                </div>
            </div><!-- container -->
        </div>
    @endif


    <!--
       ============  featured properties   ============
    -->
    @if(isset($data['featuredProperties']) && count($data['featuredProperties']))
        <div class="featured-sec">
            <!-- container -->
            <div class="container">
                <div class="sec-heading">
                    <h3>Featured Properties</h3>
                </div>

                <div class="featured_btn d-block d-sm-none">
                    <a href="#">See All</a>
                </div>

                <!--  featured product  -->
                <div class="owl-carousel owl-theme">
                @foreach($data['featuredProperties'] as $property)
                    <!-- featured -->
                        <div class="item">
                            <div class="featured-wrap">
                                <div class="featured-bx">
                                    <a href="{{ route('web.property.details', $property->url_slug) }}">
                                        <img src="{{ asset($property->getDefaultThumb->thumb_path ?? '') }}"
                                             class="img-fluid" alt="{{ $property->title }}">
                                    </a>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-price">
                                        <h3>TK {{ number_format($property->getListingVariant->total_price) }}</h3>
                                    </div>
                                    <div class="featured-info">
                                        <h2>
                                            <a href="{{ route('web.property.details', $property->url_slug) }}">{{ Str::limit($property->title, 40) }}</a>
                                        </h2>
                                        <span>{{ $property->getListingVariant->bedroom ? $property->getListingVariant->bedroom . ' Bed,' : '' }} {{ $property->getListingVariant->bathroom ? $property->getListingVariant->bathroom . ' Bath' : '' }}</span>
                                    </div>
                                    <div class="featured-footer">
                                        <div class="address">
                                            <a href="#"><i
                                                    class="fa fa-map-marker"></i>@if($property->subarea_name) {{$property->subarea_name}}
                                                , @endif{{ $property->area_name }}, {{ $property->city_name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!--  featured product  -->
            </div><!-- container -->
        </div>
    @endif


    <!--
       ============ ads ============
     -->
    <div class="ads-sec mb-2">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row text-center">
                @if(isset($data['bottomFeatureAdLeft']) && isset($data['bottomFeatureAdLeft']->images[0]))
                    <div class="col-md-4 mb-4">
                        <div class="ads">
                            <a href="{{ $data['bottomFeatureAdLeft']->images[0]->URL ?? 'javascript:void(0)' }}"
                               target="_blank"><img
                                    src="{{ $panel_path . ($data['bottomFeatureAdLeft']->images[0]->image_path ?? '') }}"
                                    class="img-fluid"
                                    alt="image"></a>
                        </div>
                    </div>
                @endif
                @if(isset($data['bottomFeatureAdCenter']) && isset($data['bottomFeatureAdCenter']->images[0]))
                    <div class="col-md-4 mb-4">
                        <div class="ads">
                            <a href="{{ $data['bottomFeatureAdCenter']->images[0]->URL ?? 'javascript:void(0)' }}"
                               target="_blank"><img
                                    src="{{ $panel_path . ($data['bottomFeatureAdCenter']->images[0]->image_path ?? '') }}"
                                    class="img-fluid"
                                    alt="image"></a>
                        </div>
                    </div>
                @endif
                @if(isset($data['bottomFeatureAdRight']) && isset($data['bottomFeatureAdRight']->images[0]))
                    <div class="col-md-4 mb-4">
                        <div class="ads">
                            <a href="{{ $data['bottomFeatureAdRight']->images[0]->URL ?? 'javascript:void(0)' }}"
                               target="_blank"><img
                                    src="{{ $panel_path . ($data['bottomFeatureAdRight']->images[0]->image_path ?? '') }}"
                                    class="img-fluid"
                                    alt="image"></a>
                        </div>
                    </div>
                @endif
            </div><!-- row -->
        </div><!-- container -->
    </div>


    <!--
       ============  verified properties   ============
    -->
    @if(isset($data['verifiedProperties']) && count($data['verifiedProperties']))
        <div class="verified-sec">
            <!-- container -->
            <div class="container">
                <div class="sec-heading text-center">
                    <h3>Verified Properties</h3>
                </div>
                <!-- row -->
                <div class="row">
                    <!-- verified product -->
                    @foreach($data['verifiedProperties'] as $property)

                        <div class="col-md-6">
                            <div class="verified-product">
                                <div class="verified-wrap">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-4 col-md-5">
                                            <div class="verified-bx">
                                                <a href="{{ route('web.property.details', $property->url_slug) }}">
                                                    <img src="{{ asset($property->getDefaultThumb->thumb_path ?? '') }}"
                                                         class="img-fluid" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-7 position-static">
                                            <div class="verified-price">
                                                <h3>TK {{ number_format($property->getListingVariant->total_price, 2) }}</h3>
                                            </div>
                                            <div class="verified-title">
                                                <h5 class="mt-0"><a
                                                        href="{{ route('web.property.details', $property->url_slug) }}">{{ Str::limit($property->title, 40) }}</a>
                                                </h5>
                                                <h6>{{ $property->getListingVariant->bedroom ? $property->getListingVariant->bedroom . ' Bed,' : '' }} {{ $property->getListingVariant->bathroom ? $property->getListingVariant->bathroom . ' Bath' : '' }}</h6>
                                            </div>
                                            <div class="verified-address">
                                                <a href="#"><i
                                                        class="fa fa-map-marker"></i>@if($property->subarea_name) {{$property->subarea_name}}
                                                    , @endif{{ $property->area_name }}, {{ $property->city_name }}</a>
                                            </div>
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
    <!--
        ============ ads ============
    -->
    @if(isset($data['verifiedBottomAd']) && isset($data['verifiedBottomAd']->images[0]))
        <div class="ads-sec mb-2 mt-2">
            <!-- container -->
            <div class="container text-center">
                <div class="ads">
                    <a href="{{ $data['verifiedBottomAd']->images[0]->URL ?? 'javascript:void(0)' }}"
                       target="_blank"><img
                            src="{{ $panel_path . ($data['verifiedBottomAd']->images ? $data['verifiedBottomAd']->images[0]->image_path : '') }}"
                            class="img-fluid" alt="image"></a>
                </div>
            </div><!-- container -->
        </div>
    @endif


    <!--
        ============ category-product  ============
    -->
    <div class="category-pro-sec">
        <!--  container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  For sale -->
                <div class="col-lg-4">
                    <div class="sale-heading">
                        <h3>For Sale</h3>
                    </div>
                    <div class="sale-wrapper">
                        <div class="owl-carousel">
                            <!-- sale product -->
                            @if(isset($data['sellProperties']) && count($data['sellProperties']))
                                @foreach($data['sellProperties'] as $key => $property)
                                    @if($key % 3 == 0)
                                        <div class="item">
                                            @endif
                                            <div class="sale-product">
                                                <div class="row no-gutters position-relative">
                                                    <div class="col-5">
                                                        <div class="category-bx">
                                                            <a href="{{ route('web.property.details', $property->url_slug) }}"><img
                                                                    src="{{asset($property->getDefaultThumb->thumb_path ?? '')}}"
                                                                    class="img-fluid" alt="image"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 position-static pl-3">
                                                        <div class="category-price">
                                                            <h3>
                                                                TK {{ number_format($property->getListingVariant->total_price ?? 0, 2) }}</h3>
                                                        </div>
                                                        <div class="category-title">
                                                            <h5 class="mt-0"><a
                                                                    href="{{ route('web.property.details', $property->url_slug) }}">{{ Str::limit($property->title, 35, '...') }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="category-address">
                                                            <a href="#"><i
                                                                    class="fa fa-map-marker"></i>@if($property->subarea_name) {{$property->subarea_name}}
                                                                , @endif{{ $property->area_name }}
                                                                , {{ $property->city_name }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($key % 3 == 2 || $key == count($data['sellProperties']) - 1)
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!--  For Rent -->
                <div class="col-lg-4">
                    <div class="sale-heading">
                        <h3>For Rent</h3>
                    </div>
                    <div class="sale-wrapper">
                        <div class="owl-carousel">
                            @if(isset($data['rentProperties']) && count($data['rentProperties']))
                                @foreach($data['rentProperties'] as $key => $property)
                                    @if($key % 3 == 0)
                                        <div class="item">
                                            @endif
                                            <div class="sale-product">
                                                <div class="row no-gutters position-relative">
                                                    <div class="col-5">
                                                        <div class="category-bx">
                                                            <a href="{{ route('web.property.details', $property->url_slug) }}"><img
                                                                    src="{{asset($property->getDefaultThumb->thumb_path ?? '')}}"
                                                                    class="img-fluid" alt="image"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 position-static pl-3">
                                                        <div class="category-price">
                                                            <h3>
                                                                TK {{ number_format($property->getListingVariant->total_price ?? 0, 2) }}</h3>
                                                        </div>
                                                        <div class="category-title">
                                                            <h5 class="mt-0"><a
                                                                    href="{{ route('web.property.details', $property->url_slug) }}">{{ Str::limit($property->title,35) }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="category-address">
                                                            <a href="#"><i
                                                                    class="fa fa-map-marker"></i>@if($property->subarea_name) {{$property->subarea_name}}
                                                                , @endif{{ $property->area_name }}
                                                                , {{ $property->city_name }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($key % 3 == 2 || $key == count($data['rentProperties']) - 1)
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!--  For Roommate -->
                <div class="col-lg-4">
                    <div class="sale-heading">
                        <h3>Roommate</h3>
                    </div>
                    <div class="sale-wrapper">
                        <div class="owl-carousel">
                            <!-- sale product -->
                            @if(isset($data['roommateProperties']) && count($data['roommateProperties']))
                                @foreach($data['roommateProperties'] as $key => $property)
                                    @if($key % 3 == 0)
                                        <div class="item">
                                            @endif
                                            <div class="sale-product">
                                                <div class="row no-gutters position-relative">
                                                    <div class="col-5">
                                                        <div class="category-bx">
                                                            <a href="{{ route('web.property.details', $property->url_slug) }}"><img
                                                                    src="{{asset($property->getDefaultThumb->thumb_path ?? '')}}"
                                                                    class="img-fluid" alt="image"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-7 position-static pl-3">
                                                        <div class="category-price">
                                                            <h3>
                                                                TK {{ number_format($property->getListingVariant->total_price ?? 0, 2) }}</h3>
                                                        </div>
                                                        <div class="category-title">
                                                            <h5 class="mt-0"><a
                                                                    href="{{ route('web.property.details', $property->url_slug) }}">{{ Str::limit($property->title, 35) }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="category-address">
                                                            <a href="#"><i
                                                                    class="fa fa-map-marker"></i>@if($property->subarea_name) {{$property->subarea_name}}
                                                                , @endif{{ $property->area_name }}
                                                                , {{ $property->city_name }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($key % 3 == 2 || $key == count($data['roommateProperties']) - 1)
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div><!--  container -->
    </div>

    <!--
       ============  Popular Cities  ============
    -->
    @if(isset($data['popularCities']) && count($data['popularCities']))
        <div class="popular-cities">
            <!-- container -->
            <div class="container">
                <div class="sec-heading text-center mb-3">
                    <h3>Popular Cities</h3>
                </div>
                <!-- row -->
                <div class="row">
                    <!-- Dhaka Division -->
                    @foreach($data['popularCities'] as $city)
                        <div class="col-6 col-md-4 col-lg-3 text-center">
                            <a href="{{ route('web.property', ['type' => 'all', 'cat' => 'all', 'city' => $city->city_name ]) }}">
                                <div class="location-article text-center">
                                    <h3>{{ $city->total_listing }}</h3>
                                    <h4><i class="fa fa-map-marker"></i>{{ $city->city_name }}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div><!-- row -->
            </div><!-- container -->
        </div>
    @endif

    <!--
       ============  featured Developers   ============
    -->
    @if(isset($data['featuredDevelopers']) && count($data['featuredDevelopers']))
        <div class="featured-developers">
            <!-- container -->
            <div class="container">
                <div class="sec-heading text-center mb-3">
                    <h3>Featured Developers</h3>
                </div>
                <!-- row -->
                <div class="row text-center">
                    @foreach($data['featuredDevelopers'] as $agency)
                        <div class="col-3 col-md-2 col-xl-1">
                            <div class="agencies">
                                <a href="{{ $agency->info->site_url ?? '' }}" target="_blank"><img
                                        src="{{ $agency->info->logo ? $panel_path . $agency->info->logo : asset('assets/img/default_img.png') }}"
                                        class="img-fluid"
                                        alt="{{ $agency->name }}"></a>
                            </div>
                        </div>
                    @endforeach
                </div><!-- row -->
            </div><!-- container -->
        </div>
    @endif

    <!--
        ============  featured Agencies   ============
    -->
    @if(isset($data['featuredAgencies']) && count($data['featuredAgencies']))
        <div class="featured-agencies">
            <!-- container -->
            <div class="container">
                <div class="sec-heading text-center mb-3">
                    <h3>Featured Agencies</h3>
                </div>
                <!-- row -->
                <div class="row text-center">
                    @foreach($data['featuredAgencies'] as $agency)
                        <div class="col-3 col-md-2 col-xl-1">
                            <div class="agencies">
                                <a href="{{ $agency->info->SITE_URL ?? '' }}" target="_blank"><img
                                        src="{{$agency->info->LOGO ? $panel_path . $agency->info->LOGO : asset('assets/img/default_img.png') }}"
                                        class="img-fluid"
                                        alt="{{ $agency->name }}"></a>
                            </div>
                        </div>
                    @endforeach
                </div><!-- row -->
            </div><!-- container -->
        </div>
    @endif

    <!--
        ============  popular locations   ============
    -->
    <div class="locations-sec">
        <!-- container -->
        <div class="container">
            <div class="sec-heading text-center mb-4">
                <h3>Popular Location</h3>
            </div>

            @if(isset($data['sellPageCategories']) && count($data['sellPageCategories']) && isset($data['hasSellPageCategories']) && $data['hasSellPageCategories'])
                <div class="location-heading mb-3">
                    <h2>Popular Locations to Buy Properties</h2>
                </div>
                <!-- row -->
                <div class="row mb-1">
                    @foreach($data['sellPageCategories'] as $category)
                        @if(!count($category->pages))
                            @continue
                        @endif
                        <div class="col-md-4">
                            <div class="locations-wrap">
                                <h3>{{ $category->name }}</h3>
                                <ul>
                                    @foreach($category->pages as $page)
                                        <li><a href="{{ $page->url_slug }}">{{ $page->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div><!-- row -->
            @endif

            @if(isset($data['rentPageCategories']) && count($data['rentPageCategories']) && isset($data['hasRentPageCategories']) && $data['hasRentPageCategories'])
                <div class="location-heading mb-3">
                    <h2>Popular Locations for Rent</h2>
                </div>
                <!-- row -->
                <div class="row mb-2">
                    @foreach($data['rentPageCategories'] as $category)
                        @if(!count($category->pages))
                            @continue
                        @endif
                        <div class="col-md-4">
                            <div class="locations-wrap">
                                <h3>{{ $category->name }}</h3>
                                <ul>
                                    @foreach($category->pages as $page)
                                        <li><a href="{{ $page->url_slug }}">{{ $page->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div><!-- row -->
            @endif

            @if(isset($data['roommatePageCategories']) && count($data['roommatePageCategories']) && isset($data['hasRoommatePageCategories']) && $data['hasRoommatePageCategories'])
                <div class="location-heading mb-3">
                    <h2>Searching for Roommate</h2>
                </div>
                <!-- row -->
                <div class="row mb-2">
                    @foreach($data['roommatePageCategories'] as $category)
                        @if(!count($category->pages))
                            @continue
                        @endif
                        <div class="col-md-4">
                            <div class="locations-wrap">
                                <h3>{{ $category->name }}</h3>
                                <ul>
                                    @foreach($category->pages as $page)
                                        <li><a href="{{ $page->url_slug }}">{{ $page->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div><!-- row -->
            @endif
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
