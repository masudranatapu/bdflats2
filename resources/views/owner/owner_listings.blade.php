@extends('layouts.app')
@section('owner-listings','active')
@push('custom_css')

@endpush
<?php
$listings = $data['listing'] ?? [];
?>

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="account-details">
                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="{{ route('owner-listings') }}"><i class="fa fa-long-arrow-left"></i>My
                                            Properties</a> <a
                                            href="{{ route('listings.create') }}" style="float: right;">Add new</a></h3>
                                </div>

                                <!-- product -->
                                @if($listings->count()>0)
                                    @foreach($listings as $listing)
                                        <div class="property-product mb-2">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-3">
                                                    <div class="property-bx">
                                                        <a href="@if($listing->STATUS == 10 ) {{ route('web.property.details',$listing->URL_SLUG) }} @else javascript:void(0) @endif"><img src="{{ asset($listing->getDefaultThumb->THUMB_PATH ?? '') }}" class="w-100" alt="{{$listing->TITLE}}"></a>
                                                    </div>
                                                    @if($listing->F_LISTING_TYPE == 2 || $listing->F_LISTING_TYPE == 4)
                                                        <div class="featured">
                                                            <div class="feature-text">
                                                                <span>Featured</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-9 position-static">
                                                    <h5 class="mt-0"><a href="@if($listing->STATUS == 10 ) {{ route('web.property.details',$listing->URL_SLUG) }} @else javascript:void(0) @endif" title="{{$listing->TITLE}}">{{$listing->TITLE}}</a></h5>
                                                    <a href="javascript:void(0)" class="location">
                                                        <i class="fa fa-map-marker"></i>{{ $listing->SUBAREA_NAME ? $listing->SUBAREA_NAME.', ' : '' }} {{$listing->AREA_NAME}}, {{$listing->CITY_NAME}}</a>
                                                        <p>For <span style="text-transform: capitalize">{{$listing->PROPERTY_FOR}}</span></p>
                                                    <div class="owner-info">
                                                        <ul>
                                                            <li><i class="fa fa-edit"></i><a href="{{route('listings.edit',$listing->id)}}">Edit</a></li>
                                                            <li><i class="fa fa-times"></i><a href="{{route('listings.delete',$listing->id)}}" onclick="return confirm('Are You Sure To Delete This?')">Delete</a></li>
                                                            @if($listing->PAYMENT_STATUS == 0 )
                                                            <li>
                                                                <i class="fa fa-money"></i>
                                                                <a href="{{route('listings.pay',$listing->id)}}">Pay Now</a>
                                                            </li>
                                                            @endif
                                                            @if($listing->STATUS == 10 )
                                                                <li class="float-right"><i class="fa fa-check"></i></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                            <h6 class="font-weight-bold text-danger text-center">No Data Found!</h6>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{$listings->links()}}
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
