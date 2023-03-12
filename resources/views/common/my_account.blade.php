@extends('layouts.app')
@section('my-account','active')
@push('custom_css')

@endpush

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-md-4 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 ">
                    <div class="account-details">
                        <div class="account-user">
                            <div class="user-bx">
                                <img src="{{ fileExit(Auth::user()->PROFILE_PIC_URL) }}" alt="image">
                            </div>
                            <div class="user-profile">
                                <h3>{{ Auth::user()->NAME }}</h3>
                                <h5>User Id: {{ Auth::user()->CODE }}</h5>
                                <a href="{{ route('profile.edit') }}"><i class="fa fa-edit"></i>Edit Profile</a>
                            </div>
                            <div class="user-logout">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @if(Auth::user()->USER_TYPE == 1)
                            @php
                            $s_pro = \DB::table('PRD_SUGGESTED_PROPERTY')->where('STATUS',0)->where('F_USER_NO',Auth::id())->count();
                            $c_pro = \DB::table('ACC_LISTING_LEAD_PAYMENTS')->where('F_USER_NO',Auth::id())->count();
                            @endphp
                            <div class="user-wrapper">
                                <div class="user-nav">
                                    <div class="row text-center">
                                        <div class="col-4 mb-2">
                                            <div class="user-box">
                                                <a href="#">
                                                    <span>{{ $s_pro ?? 0 }}</span><br/>
                                                    Suggested Properties
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <div class="user-box box2">
                                                <a href="#">
                                                    <span>{{ $c_pro ?? 0 }}</span><br/>
                                                    Contacted Properties
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="user-box box3">
                                                <a href="{{route('payment-history')}}">
                                                    <span>{{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</span><br/>
                                                    Balance
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(isset($data['properties']) && count($data['properties']))
                                <div class="property-heading">
                                    <h3>You May Like</h3>
                                </div>
                                <div class="mt-2">
                                    @foreach($data['properties'] as $property)
                                        @php($property = $property->listing ?? [])
                                        <div class="property-product mb-4">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-4">
                                                    <div class="property-bx">
                                                        <a href="{{ route('web.property.details', $property->URL_SLUG ?? '-') }}"><img
                                                                src="{{ defaultThumb($property->getDefaultThumb->THUMB_PATH ?? '') }}"
                                                                class="w-100" alt="image"></a>
                                                    </div>
                                                </div>
                                                <div class="col-8 position-static">
                                                    <h3>
                                                        TK {{ number_format($property->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                                    <h5 class="mt-0"><a
                                                            href="{{ route('web.property.details', $property->URL_SLUG ?? '-') }}">{{ $property->TITLE ?? '' }}</a>
                                                    </h5>
                                                    <h6>{{ $property->getListingVariant && $property->getListingVariant->BEDROOM ? $property->getListingVariant->BEDROOM . ' Bed, ' : '' }}{{ $property->getListingVariant && $property->getListingVariant->BATHROOM ? $property->getListingVariant->BATHROOM . ' Bath' : '' }}</h6>
                                                    <a href="#" class="location"><i
                                                            class="fa fa-map-marker"></i>{{ $property->AREA_NAME }}
                                                        , {{ $property->CITY_NAME }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif(isset($data['suggestedProperty']) && count($data['suggestedProperty']))
                                <div class="property-heading">
                                    <h3>Suggested Properties</h3>
                                </div>
                                <div class="mt-2">
                                    @foreach($data['suggestedProperty'] as $property)
                                        <div class="property-product mb-4">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-4">
                                                    <div class="property-bx">
                                                        <a href="{{ route('web.property.details', $property->URL_SLUG) }}"><img
                                                                src="{{ defaultThumb($property->THUMB_PATH ?? '') }}"
                                                                class="w-100" alt="image"></a>
                                                    </div>
                                                </div>
                                                <div class="col-8 position-static">
                                                    <h3>
                                                        TK {{ number_format($property->TOTAL_PRICE ?? 0, 2) }}
                                                        @if($property->IS_VERIFIED == 1)
                                                            <span class="float-right">Verified <i class="fa fa-check-square"></i></span>
                                                        @endif
                                                    </h3>
                                                    <h5 class="mt-0"><a
                                                            href="{{ route('web.property.details', $property->URL_SLUG) }}">{{ $property->TITLE ?? '' }}</a>
                                                    </h5>
                                                    <h6>{{ $property->BEDROOM . ' Bed '  }}{{$property->BATHROOM. ' Bath' }}</h6>
                                                    <a href="#" class="location"><i
                                                            class="fa fa-map-marker"></i>{{ $property->AREA_NAME }}
                                                        , {{ $property->CITY_NAME }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                        @if(Auth::user()->USER_TYPE == 3)
                            <div class="user-wrapper">
                                <div class="user-nav">
                                    <div class="row text-center">
                                        <div class="col-4 mb-2">
                                            <div class="user-box">
                                                <a href="{{route('developer-listings')}}">
                                                    <span>{{ Auth::user()->TOTAL_LISTING }}</span><br/> My Properties
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <div class="user-box box2">
                                                <a href="{{route('developer-leads')}}">
                                                    <span>{{ Auth::user()->TOTAL_LEAD }}</span><br/>
                                                    Leads
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="user-box box3">
                                                <a href="javascript:void(0)">
                                                    <span>{{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</span><br/>
                                                    Balance
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        @if(Auth::user()->USER_TYPE == 4)
                        <div class="user-wrapper">
                            <div class="user-nav">
                                <div class="row text-center">
                                    <div class="col-4 mb-2">
                                        <div class="user-box">
                                            <a href="{{route('agency-listings')}}">
                                                <span>{{ Auth::user()->TOTAL_LISTING }}</span><br/> My Properties
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="user-box box2">
                                            <a href="{{route('agency-leads')}}">
                                                <span>{{ Auth::user()->TOTAL_LEAD }}</span><br/>
                                                Leads
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="user-box box3">
                                            <a href="javascript:void(0)">
                                                <span>{{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</span><br/>
                                                Balance
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                        @if(Auth::user()->USER_TYPE != 1 && isset($data['properties']) && count($data['properties']))
                            <div class="property-wrapper">
                                <div class="new-property">
                                    <div class="property-heading">
                                        <h3>New Property <span class="float-right"><a href="{{route('developer-listings')}}">See All</a></span></h3>
                                    </div>

                                    @foreach($data['properties'] as $property)
                                        <div class="row">
                                            <div class="col-12 mb-1">
                                                <!-- product -->
                                                <div class="sale-wrapper">
                                                    <div class="sale-product">
                                                        <div class="row no-gutters position-relative">
                                                            <div class="col-3">
                                                                <div class="category-bx">
                                                                    <a href="{{ route('web.property.details', $property->URL_SLUG) }}"><img
                                                                            src="{{ defaultThumb($property->getDefaultThumb->THUMB_PATH ?? '') }}"
                                                                            class="img-fluid" alt="image"></a>
                                                                </div>
                                                                <div class="featured">
                                                                    <div class="feature-text">
                                                                        <span>{{ $property->listingType ? $property->listingType->SHORT_NAME : '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-9 position-static pl-3">
                                                                <div class="category-price">
                                                                    <h3>
                                                                        TK {{ number_format($property->getDefaultVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                                                </div>
                                                                <div class="category-title">
                                                                    <h5 class="mt-0">
                                                                        <a href="{{ route('web.property.details', $property->URL_SLUG) }}">{{ $property->TITLE }}</a>
                                                                    </h5>
                                                                </div>
                                                                <div class="category-address">
                                                                    <a href="#"><i class="fa fa-map-marker"></i>
                                                                        {{ $property->AREA_NAME ? $property->AREA_NAME . ', ' : '' }}
                                                                        {{ $property->CITY_NAME }}
                                                                    </a>
                                                                </div>
                                                                <div class="owner-info">
                                                                    <ul>
                                                                        @if(Auth::user()->USER_TYPE == 2)
                                                                            <li><i class="fa fa-edit"></i><a
                                                                                    href="{{ route('listings.edit', $property->id) }}">Edit</a>
                                                                            </li>
                                                                        @elseif(Auth::user()->USER_TYPE == 3)
                                                                            <li><i class="fa fa-edit"></i><a
                                                                                    href="{{ route('developer.listings.edit', $property->id) }}">Edit</a>
                                                                            </li>
                                                                        @elseif(Auth::user()->USER_TYPE == 4)
                                                                            <li><i class="fa fa-edit"></i><a
                                                                                    href="{{ route('agency.listings.edit', $property->id) }}">Edit</a>
                                                                            </li>
                                                                        @elseif(Auth::user()->USER_TYPE == 5)
                                                                            <li><i class="fa fa-edit"></i><a
                                                                                    href="{{ route('agent.listings.edit', $property->id) }}">Edit</a>
                                                                            </li>
                                                                        @endif
                                                                        @if(Auth::user()->USER_TYPE == 2)
                                                                            <li><i class="fa fa-times"></i><a
                                                                                    href="{{ route('listings.delete', $property->id) }}">Delete</a>
                                                                            </li>
                                                                        @elseif(Auth::user()->USER_TYPE == 3)
                                                                            <li><i class="fa fa-times"></i><a
                                                                                    href="{{ route('developer.listings.delete', $property->id) }}">Delete</a>
                                                                            </li>
                                                                        @elseif(Auth::user()->USER_TYPE == 4)
                                                                            <li><i class="fa fa-times"></i><a
                                                                                    href="{{ route('agency.listings.delete', $property->id) }}">Delete</a>
                                                                            </li>
                                                                        @elseif(Auth::user()->USER_TYPE == 5)
                                                                            <li><i class="fa fa-times"></i><a
                                                                                    href="{{ route('agent.listings.delete', $property->id) }}">Delete</a>
                                                                            </li>
                                                                        @endif
                                                                        <li class="float-right"><i
                                                                                class="fa fa-check"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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

@endpush
