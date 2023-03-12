@extends('admin.layouts.master')

@section('Property Owner','menu-open')
@section('owner_list','active')

@section('page-name') Owner | View @endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" href="{{ asset('app-assets/lightgallery/dist/css/lightgallery.min.css') }}">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active"> Owner view</li>
@endsection

<?php

$user_type = Config::get('static_array.user_type');
$user_status = Config::get('static_array.user_status');
$owner = $data['owner'] ?? [];
$days = [
    0 => 'Sun',
    1 => 'Mon',
    2 => 'Tue',
    3 => 'Wed',
    4 => 'Thu',
    5 => 'Fri',
    6 => 'Sat'
];
?>

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Owner View') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Owner View') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">{{ __('Owner View ') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">All Users</a>
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">+ Create
                                    Role</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p><span class="font-weight-bold">User ID: </span>{{ $owner->code }}</p>
                                    @if($owner->user_type == 2)
                                        <p><span class="font-weight-bold">User Type: </span>{{ $user_type[$owner->user_type] }}
                                        </p>
                                        <p>
                                            <span class="font-weight-bold">User Status: </span>
                                            {{ $user_status[$owner->status] ?? 'N/A' }}
                                        </p>
                                        <p>
                                            <span class="font-weight-bold">Can Login: </span>
                                            {{ $owner->can_login == 1 ? 'Yes' : 'No' }}
                                        </p>
                                        <p><span class="font-weight-bold">Listing Limit: </span>{{ $owner->listing_limit }}
                                        </p>
                                        <p><span class="font-weight-bold">Total Listing: </span>{{ $owner->total_listing }}
                                        </p>
                                        <p><span class="font-weight-bold">Name: </span>{{ $owner->NAME }}</p>
                                        <p>
                                            <span class="font-weight-bold">Email: </span>
                                            {{ $owner->email }}
                                            ({{ $owner->is_email_verified == 1 ? 'Verified' : 'Not Verified' }})</p>
                                        <p>
                                            <span class="font-weight-bold">Mobile: </span>
                                            {{ $owner->mobile_no }}
                                            ({{ $owner->is_mobile_verified == 1 ? 'Verified' : 'Not Verified' }})
                                        </p>
                                        <p><span class="font-weight-bold">Payment Auto Renew: </span>{{ $owner->payment_auto_renew == 1 ? 'Yes' : 'No' }}
                                        </p>
                                        <p><span class="font-weight-bold">Open Time: </span>{{ $owner->info->shop_open_time ?? 'N/A' }}
                                        </p>
                                        <p><span class="font-weight-bold">Close Time: </span>{{ $owner->info->shop_close_time ?? 'N/A' }}
                                        </p>
                                        <p><span class="font-weight-bold">Working Days: </span>
                                        @if($owner->info && $owner->info->working_days)
                                            <ul>
                                                @foreach(json_decode($owner->info->working_days) as $day)
                                                    <li>{{ $days[$day] ?? '' }}</li>
                                                @endforeach
                                            </ul>
                                            @endif
                                            </p>
                                            <p><span class="font-weight-bold">Feature Type: </span>{{ $owner->is_feature == 1 ? 'Feature' : 'General' }}
                                            </p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p><span class="font-weight-bold">User Image:</span></p>
                                                    <img src="{{ asset($owner->profile_pic_url ?? '') }}" alt=""
                                                         style="width: 100%">
                                                </div>
                                            </div>
                                            <p><span class="font-weight-bold">Address: </span>{{ $owner->address }}
                                            </p>
                                            <p><span class="font-weight-bold">Actual Topup: </span>{{ number_format($owner->actual_topup, 2) }}
                                            </p>
                                            <p><span class="font-weight-bold">Pending Topup: </span>{{ number_format($owner->pending_topup, 2) }}
                                            </p>
                                            <p><span class="font-weight-bold">Unused Topup: </span>{{ number_format($owner->unused_topup, 2) }}
                                            </p>
                                        @else
                                            <p><span class="font-weight-bold">User Type: </span>{{ $user_type[$owner->user_type] }}
                                            </p>
                                            <p>
                                                <span class="font-weight-bold">User Status: </span>
                                                {{ $user_status[$owner->status] ?? 'N/A' }}
                                            </p>
                                            <p>
                                                <span class="font-weight-bold">Can Login: </span>
                                                {{ $owner->can_login == 1 ? 'Yes' : 'No' }}
                                            </p>
                                            <p><span class="font-weight-bold">Listing Limit: </span>{{ $owner->listing_limit }}
                                            </p>
                                            <p><span class="font-weight-bold">Total Listing: </span>{{ $owner->total_listing }}
                                            </p>
                                            <p><span class="font-weight-bold">Company Name: </span>{{ $owner->name }}
                                            </p>
                                            <p><span class="font-weight-bold">Contact Person Name: </span>{{ $owner->contact_per_name }}
                                            </p>
                                            <p><span class="font-weight-bold">Designation: </span>{{ $owner->designation }}
                                            </p>
                                            <p><span class="font-weight-bold">Office Address: </span>{{ $owner->address }}
                                            </p>
                                            <p>
                                                <span class="font-weight-bold">Email: </span>
                                                {{ $owner->email }}
                                                ({{ $owner->is_email_verified == 1 ? 'Verified' : 'Not Verified' }}
                                                )</p>
                                            <p>
                                                <span class="font-weight-bold">Mobile: </span>
                                                {{ $owner->mobile_no }}
                                                ({{ $owner->is_mobile_verified == 1 ? 'Verified' : 'Not Verified' }}
                                                )
                                            </p>
                                            <p><span class="font-weight-bold">About Company: </span>{{ $owner->info->about_company ?? 'N/A' }}
                                            </p>
                                            <p><span class="font-weight-bold">Contact Person Name: </span>{{ $owner->contact_per_name ?? 'N/A' }}
                                            </p><p><span class="font-weight-bold">Payment Auto Renew: </span>{{ $owner->payment_auto_renew == 1 ? 'Yes' : 'No' }}
                                            </p>
                                            <p><span class="font-weight-bold">Open Time: </span>{{ $owner->info->shop_open_time ?? 'N/A' }}
                                            </p>
                                            <p><span class="font-weight-bold">Close Time: </span>{{ $owner->info->shop_close_time ?? 'N/A' }}
                                            </p>

                                            <p><span class="font-weight-bold">Working Days: </span>
                                            @if( $owner->info && !empty($owner->info->working_days))
                                                <ul>
                                                    @foreach(json_decode($owner->info->working_days) as $day)
                                                        <li>{{ $days[$day] ?? '' }}</li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                                </p>
                                                <p><span         class="font-weight-bold">Feature Type: </span>{{ $owner->is_feature == 1 ? 'Feature' : 'General' }}
                                                </p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p><span class="font-weight-bold">Logo:</span></p>
                                                    <img src="{{ asset($owner->info->logo ?? '') }}" alt=""
                                                         style="width: 100%">
                                                </div>
                                                <div class="col-md-3">
                                                    <p><span class="font-weight-bold">Banner:</span></p>
                                                    <img src="{{ asset($owner->info->banner ?? '') }}" alt=""
                                                         style="width: 100%">
                                                </div>
                                            </div>
                                            <p><span class="font-weight-bold">Actual Topup: </span>{{ number_format($owner->actual_topup, 2) }}
                                            </p>
                                            <p><span class="font-weight-bold">Pending Topup: </span>{{ number_format($owner->pending_topup, 2) }}
                                            </p>
                                            <p><span class="font-weight-bold">Unused Topup: </span>{{ number_format($owner->unused_topup, 2) }}
                                            </p>
                                            <h3 class="mt-2">SEO</h3>
                                            <p><span class="font-weight-bold">Meta Title: </span>{{ $owner->info->meta_title ?? 'N/A' }}
                                            </p>
                                            <p><span class="font-weight-bold">Site URL: </span>{{ $owner->info->site_url ?? 'N/A' }}
                                            </p>
                                            <p><span class="font-weight-bold">Meta Description: </span>{{ $owner->info->meta_description ?? 'N/A' }}
                                            </p>
                                        @endif
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('admin.owner.list') }}" class="btn btn-info">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
<!--push from page-->
@push('script')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

    <!--for image upload-->
    <script type="text/javascript" src="{{ asset('app-assets/file_upload/image-uploader.min.js')}}"></script>

    <!--script only for product page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/product.js')}}"></script>

    <!--for tooltip-->
    <script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>

    <script type="text/javascript">

        //for image gallery
        $(".lightgallery").lightGallery();

        //product photo delete
        $(document).on('click', '.photo-delete', function (e) {
            var id = $(this).attr('data-id');
            if (!confirm('Are you sure you want to delete the photo')) {
                return false;
            }
            if ('' != id) {
                var pageurl = `{{ URL::to('prod_img_delete')}}/` + id;
                $.ajax({
                    type: 'get',
                    url: pageurl,
                    async: true,
                    beforeSend: function () {
                        $("body").css("cursor", "progress");
                        //blockUI();
                    },
                    success: function (data) {
                        // console.log(data.status);
                        if (data.status == true) {
                            $('#photo_div_' + id).hide();
                        } else {
                            alert('something wrong please you should reload the page');
                        }

                    },
                    complete: function (data) {
                        $("body").css("cursor", "default");
                        //$.unblockUI();
                    }
                });
            }


        })

    </script>

    <script>
        $(function () {
            $('.prod_def_photo_upload').imageUploader();

        });

    </script>



@endpush('script')
