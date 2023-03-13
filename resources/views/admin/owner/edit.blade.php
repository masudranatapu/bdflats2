@extends('admin.layouts.master')

@section('Property Owner', 'open')
@section('owner_list', 'active')

@section('title')
    Owner | Update
@endsection
@section('page-name')
    Update Owner
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>
    </li>
    <li class="breadcrumb-item active">
        Update Owner
    </li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('/custom/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/image_upload/image-uploader.min.css') }}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        a.ui-state-default {
            background-color: red !important
        }

        #scrollable-dropdown-menu2 .tt-menu {
            max-height: 260px;
            overflow-y: auto;
            width: 100%;
            border: 1px solid #333;
            border-radius: 5px
        }

        .twitter-typeahead {
            display: block !important
        }

        .tt-hint {
            color: #999 !important
        }
    </style>
@endpush

@section('content')
    @php
        $user_type = Config::get('static_array.user_type');
        $user_status = Config::get('static_array.user_status');
        $owner = $data['owner'] ?? [];
        $tabIndex = 0;
        $days = [
            0 => 'Sun',
            1 => 'Mon',
            2 => 'Tue',
            3 => 'Wed',
            4 => 'Thu',
            5 => 'Fri',
            6 => 'Sat',
        ];
    @endphp
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Owner edit') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Owner edit') }}</li>
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
                                <h5 class="m-0">{{ __('Owner edit ') }}</h5>
                            </div>
                            <div class="card-body">
                                {!! Form::open([
                                    'route' => ['admin.owner.update', $owner->id],
                                    'method' => 'post',
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'novalidate',
                                ]) !!}
                                @if ($owner->user_type == 2)
                                    @include('admin.owner._owner_edit');
                                @elseif($owner->user_type == 3 || $owner->user_type == 4)
                                    @include('admin.owner._developer_edit')
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.owner.list') }}">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('app-assets/pages/country.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <script src="{{ asset('/assets/css/image_upload/image-uploader.min.js') }}"></script>
    <script src="{{ asset('/assets/js/forms/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $('#imageFile').imageUploader();
        $('#bannerFile').imageUploader();
        $('#logoFile').imageUploader();

        $('.time').datetimepicker({
            format: 'hh:mm'
        });
    </script>
@endpush
