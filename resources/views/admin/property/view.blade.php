@extends('admin.layouts.master')

@section('Property Management','open')
@section('property_list','active')

@section('title') @lang('product.product_view') @endsection
@section('page-name') Property | View @endsection

<!--push from page-->
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" href="{{ asset('app-assets/lightgallery/dist/css/lightgallery.min.css') }}">
    <style>
        td table {width: auto !important;}
        a.ui-state-default{background-color:red!important}
        .ctm{min-width: 140px; display: inline-block;}
    </style>
@endpush('style')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active">Property | View</li>
@endsection

<?php


    $data               = $data ?? [];
    $product            = $product ?? [];
    $property_types     = $data['property_type'] ?? [];
    $cities             = $data['city'] ?? [];
    $area               = $data['area'] ?? [];
    $property_conditions = $data['property_condition'] ?? [];
    $listing_variants   = $data['listing_variants'] ?? [];
    $floor_lists        = $data['floor_list'] ?? [];
    $property_facing    = $data['property_facing'] ?? [];
    $property_additional_info = $data['property_additional_info'] ?? [];
    $listing_features   = $data['listing_feature'] ?? [];
    $nearby             = $data['near_by'] ?? [];
    $property_listing_types = $data['property_listing_type'] ?? [];
    $property_listing_images = $data['property_listing_images'] ?? [];
    $features           = json_decode($property_additional_info->F_FEATURE_NOS) ?? [];
    $near               = json_decode($property_additional_info->F_NEARBY_NOS) ?? [];
    $bed_room           = Config::get('static_array.bed_room') ?? [];
    $bath_room          = Config::get('static_array.bath_room') ?? [];
    $user_type          = Config::get('static_array.user_type') ?? [];
    $property_status    = Config::get('static_array.property_status') ?? [];
    $payment_status     = Config::get('static_array.payment_status') ?? [];

?>

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-content container">
                        <div class="card-header">
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-title mb-2">
                                        <h3 class="font-weight-bold">Basic Information</h3>
                                    </div>
                                    <div class="saleform-header mb-2">
                                        <p><span class="ctm">Property ID </span>: {{$product->code}}</p>
                                        <p><span class="ctm">Create Date </span>: {{date('M d, Y', strtotime($product->created_at))}}</p>
                                        <p><span class="ctm">Modified On </span>: {{date('M d, Y', strtotime($product->modified_at))}}</p>
                                        <p><span class="ctm">Owner Name </span>: {{ $product->getUser->name }}</p>
                                        <p><span class="ctm">Owner Type </span>: {{ $user_type[$product->user_type] ?? '' }}</p>
                                        <p><span class="ctm">Payment Status </span>: {{ $payment_status[$product->payment_status] ?? '' }}</p>
                                        <p><span class="ctm">Expire Date </span>: @if($product->expaired_at) {{ date('d-m-Y',strtotime($product->expaired_at)) }} @else
                                                Not set yet @endif </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p><span
                                            class="font-weight-bold">Advertisement Type: </span>{{ ucwords($product->property_for ?? '') }}
                                    </p>
                                    <p><span
                                            class="font-weight-bold">Property Type: </span>{{ $property_types[$product->f_property_type_no] ?? '' }}
                                    </p>
                                    <p><span class="font-weight-bold">City: </span>{{ $cities[$product->f_city_no] ?? '' }}
                                    </p>
                                    <p><span class="font-weight-bold">Area: </span>{{ $area[$product->f_area_no] ?? '' }}</p>
                                    <p><span class="font-weight-bold">Address: </span>{{ $product->address ?? '' }}</p>
                                    <p><span
                                            class="font-weight-bold">Condition: </span>{{ $property_conditions[$product->f_property_condition] ?? '' }}
                                    </p>
                                    <p><span class="font-weight-bold">Title: </span>{{ $product->title }}</p>
                                </div>
                                <div class="col-6 mt-2">
                                    <p class="font-weight-bold">Property Size & Price</p>
                                    <ul class="list-group list-group-flush">
                                        @foreach($data['listing_variants'] as $key => $item)
                                            <li class="list-group-item" style="margin-bottom: unset">
                                                {{ $item->property_size }} Sqft
                                                {{ $item->bedroom ? ', ' . ($bed_room[$item->bedroom] ?? '') : '' }}
                                                {{ $item->bathroom ? ', ' . ($bath_room[$item->bathroom] ?? '') : '' }}
                                                {{ ', ' . number_format($item->total_price, 2) . 'TK' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-12 mt-2">
                                    <p><span class="font-weight-bold">Property Price Is: </span>{{ $product->price_type == 2 ? 'Negotiable' : 'Fixed' }}</p>
                                    <p><span class="font-weight-bold">Total Number of Floor: </span>{{ $product->total_floors }}</p>
                                    @if($product->FLOORS_AVAIABLE)
                                    <p><span class="font-weight-bold">Floor(s) Available: </span>{{ implode('th Floor, ', json_decode($product->floors_avaiable)) }} th Floor</p>
                                    @endif
                                    <p><span class="font-weight-bold">Facing: </span>{{ $property_additional_info->facing }}</p>
                                    <p><span class="font-weight-bold">Handover Date: </span>{{ date('d-m-Y', strtotime($property_additional_info->handover_date)) }}</p>
                                    <p><span class="font-weight-bold">Description: </span></p>
                                    {!! $property_additional_info->description !!}
                                </div>
                                <div class="col-12 mt-2">
                                    <p class="font-weight-bold">Features</p>
                                    <ul>
                                        @foreach($listing_features as $key => $listing_feature)
                                            @if(in_array($key,$features))
                                                <li>{{ $listing_feature }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-12 mt-2">
                                    <p class="font-weight-bold">Facilities within 1km</p>
                                    <ul>
                                        @foreach($nearby as $key => $item)
                                            @if(in_array($key,$near))
                                                <li>{{ $item }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-12">
                                    <p><span
                                            class="font-weight-bold">Location on Map: </span>{{ $property_additional_info->location_map ? '' : 'N/A' }}
                                    </p>
                                    @if($property_additional_info->location_map)
                                        <div class="map">
                                            <iframe
                                                src="{{$property_additional_info->location_map}}"
                                                style="border:0; width:100%; height: 250px;" allowfullscreen=""
                                                loading="lazy"></iframe>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <p class="font-weight-bold">Images</p>
                                    <div class="row">
                                        @foreach($property_listing_images as $key => $item)
                                            <div class="col-3 mb-1">
                                                <img style="width: 100%"
                                                     src="{{asset('/')}}{{$item->image_path}}"
                                                     alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p><span class="font-weight-bold">Video: </span>{{ $property_additional_info->video_code ?? 'N/A' }}</p>
                                </div>

                                <div class="col-md-12">
                                    <h3 class="font-weight-bold">Property Owner Details</h3>
                                    <p><span class="font-weight-bold">Contact Person: </span>{{ $product->contact_person1 }}</p>
                                    <p><span class="font-weight-bold">Mobile: </span>{{ $product->mobile1 }}</p>
                                    <p><span class="font-weight-bold">Second Contact Person: </span>{{ $product->contact_person2 }}</p>
                                    <p><span class="font-weight-bold">Mobile: </span>{{ $product->mobile2 }}</p>
                                </div>

                                <div class="col-md-12">
                                    <h3 class="font-weight-bold">SEO</h3>
                                    <p><span class="font-weight-bold">Meta Title: </span>{{ $product->listingSEO->meta_title ?? 'N/A' }}</p>
                                    <p><span class="font-weight-bold">Meta Description: </span>{{ $product->listingSEO->meta_description ?? 'N/A' }}</p>
                                    <p><span class="font-weight-bold">URL Slug: </span>{{ $product->listingSEO->meta_url ?? 'N/A' }}</p>
                                    <p><span class="font-weight-bold">Image: </span></p>
                                    <img src="{{ asset($product->listingSEO->og_image_path ?? '') }}" alt="" style="max-height: 150px;max-width: 200px">
                                </div>

                                <div class="col-md-12">
                                    <p><span class="font-weight-bold">Listing Type</span>: {{ $property_listing_types[$product->f_listing_type]->name }}</p>
                                    <p><span class="font-weight-bold">Publishing Status</span>: {{ $property_status[$product->status] }}</p>
                                    <p><span class="font-weight-bold">Payment Status</span>: {{ $product->payment_status ? 'Paid' : 'Due' }}</p>
                                    <p><span class="font-weight-bold">Verified by BDF</span>: {{ $product->is_verified ? 'Yes' : 'No' }}</p>
                                    <p><span class="font-weight-bold">Need Payment to View Contact</span>: {{ $product->ci_payment ? 'Yes' : 'No' }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Recent Transactions -->

@endsection
<!--push from page-->
@push('sript')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

    <!--for image upload-->
    <script type="text/javascript" src="{{ asset('app-assets/file_upload/image-uploader.min.js')}}"></script>

    <!--script only for product page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/product.js')}}"></script>

    <!--for tooltip-->
    <script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>

    <!--for image gallery-->
    <script src="{{ asset('app-assets/lightgallery/dist/js/lightgallery.min.js')}}"></script>

@endpush('script')
