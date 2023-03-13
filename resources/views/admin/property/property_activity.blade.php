@extends('admin.layouts.master')

@section('Property Management', 'menu-open')
@section('property_list', 'active')

@section('title') @lang('product.product_view') @endsection
@section('page-name') Property Activities @endsection

<!--push from page-->
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css') }}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/lightgallery/dist/css/lightgallery.min.css') }}">
@endpush('custom_css')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Property Activities</li>
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Property Activities') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Property Activities') }}</li>
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
                                <h5 class="m-0">{{ __('Property Activities') }}</h5>
                                {{-- <span class="float-right">
                                    <a href="{{ route('admin.property.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </span> --}}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Property Name : {{ $data['property']->title ?? '' }}</h3>
                                        <h3>Property Owner : {{ $data['property']->listingOwner->name ?? '' }}</h3>
                                        <br>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xl-4 col-lg-6 col-12">
                                        <div class="card bg-info rounded">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-center">
                                                            <h6 class="text-white">Total View</h6>
                                                            <h1 class="info text-white font-weight-bold">100010</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-12">
                                        <div class="card bg-success rounded">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-center">
                                                            <h6 class="text-white">Lead Generated</h6>
                                                            <h1 class="info text-white font-weight-bold">39</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body bg-warning rounded">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-center">
                                                            <h6 class="text-white">Earning</h6>
                                                            <h1 class="info text-white font-weight-bold">1250</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        <h2>Lead & Earning Overview</h2>
                                        <div class="table-responsive ">
                                            <table class="table table-striped table-bordered table-sm text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Lead ID</th>
                                                        <th>Lead Type</th>
                                                        <th>Seeker Name</th>
                                                        <th>Seeker Mobile</th>
                                                        <th>Date</th>
                                                        <th>Earning</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span>10000001</span>
                                                        </td>
                                                        <td>
                                                            <span>View Mobile No</span>
                                                        </td>
                                                        <td>
                                                            <span>Ada Loveace</span>
                                                        </td>
                                                        <td>
                                                            <span>0123456789</span>
                                                        </td>
                                                        <td>
                                                            <span>Dec 10, 2020</span>
                                                        </td>
                                                        <td>
                                                            <span>25</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <span>10000002</span>
                                                        </td>
                                                        <td>
                                                            <span>Send Message</span>
                                                        </td>
                                                        <td>
                                                            <span>Grace Hopper</span>
                                                        </td>
                                                        <td>
                                                            <span>0123456789</span>
                                                        </td>
                                                        <td>
                                                            <span>Dec 10, 2020</span>
                                                        </td>
                                                        <td>
                                                            <span>25</span>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Impression</h2>
                                        <div class="table-responsive ">
                                            <table class="table table-striped table-bordered table-sm text-center">
                                                <thead>
                                                    <tr>
                                                        <th width="10%"></th>
                                                        <th width="45%">Date</th>
                                                        <th width="45%">View</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($data['property']->getListingView) && count($data['property']->getListingView) > 0)
                                                        @foreach ($data['property']->getListingView as $k => $row)
                                                            <tr>
                                                                <td width="10%">{{ $k + 1 }}</td>
                                                                <td width="45%">
                                                                    <span>{{ date('M d, Y', strtotime($row->DATE)) }}</span>
                                                                </td>
                                                                <td width="45%">
                                                                    <span>{{ $row->COUNTER }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
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
@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>

    <!--for image upload-->
    <script type="text/javascript" src="{{ asset('app-assets/file_upload/image-uploader.min.js') }}"></script>

    <!--script only for product page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/product.js') }}"></script>

    <!--for tooltip-->
    <script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js') }}"></script>

    <!--for image gallery-->
    <script src="{{ asset('app-assets/lightgallery/dist/js/lightgallery.min.js') }}"></script>
@endpush('custom_js')
