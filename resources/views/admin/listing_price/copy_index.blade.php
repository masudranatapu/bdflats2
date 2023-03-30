@extends('admin.layout.master')

{{--@section('Earnings','open')--}}
@section('listing_price','active')

@section('title') Listing Price @endsection
@section('page-name') Listing Price @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Listing Price</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php
    $roles = userRolePermissionArray();
    $data = $data ?? [];
@endphp


@section('content')
    <div class="card card-success min-height">
        <div class="card-header">
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">

                {!! Form::open([ 'route' => 'admin.listing_price.update', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                @csrf
                <div class="form-body">
                    <h2 class="mb-2">General Listing Charge</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Sale:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('gl_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('gl_sale_price', $data->GENERAL_SALES_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('gl_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('gl_sale_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('gl_sale_duration', $data->GENERAL_SALES_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('gl_sale_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Rent:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('gl_rent_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('gl_rent_price', $data->GENERAL_RENT_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('gl_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('gl_rent_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('gl_rent_duration', $data->GENERAL_RENT_PRICE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('gl_rent_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Roommate:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('gl_roommate_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('gl_roommate_price', $data->GENERAL_ROOMMATE_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('gl_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('gl_roommate_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('gl_roommate_duration', $data->GENERAL_ROOMMATE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('gl_roommate_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-2 mt-2">Feature Listing Charge</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Sale:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('fl_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('fl_sale_price', $data->FEATURE_SALES_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('fl_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('fl_sale_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('fl_sale_duration', $data->FEATURE_SALES_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('fl_sale_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Rent:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('fl_rent_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('fl_rent_price', $data->FEATURE_RENT_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('fl_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('fl_rent_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('fl_rent_duration', $data->FEATURE_RENT_PRICE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('fl_rent_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Roommate:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('fl_roommate_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('fl_roommate_price', $data->FEATURE_ROOMMATE_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('fl_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('fl_roommate_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('fl_roommate_duration', $data->FEATURE_ROOMMATE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('fl_roommate_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-2 mt-2">General Listing With Daily Auto Update Charge</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Sale:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ag_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ag_sale_price', $data->AUTO_GENERAL_SALES_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ag_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ag_sale_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ag_sale_duration', $data->AUTO_GENERAL_SALES_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ag_sale_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Rent:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ag_rent_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ag_rent_price', $data->AUTO_GENERAL_RENT_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ag_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ag_rent_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ag_rent_duration', $data->AUTO_GENERAL_RENT_PRICE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ag_rent_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Roommate:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ag_roommate_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ag_roommate_price', $data->AUTO_GENERAL_ROOMMATE_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ag_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ag_roommate_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ag_roommate_duration', $data->AUTO_GENERAL_ROOMMATE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ag_roommate_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <h2 class="mb-2 mt-2">Featured Listing With Daily Auto Update Charge</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Sale:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('af_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('af_sale_price', $data->AUTO_FEATURE_SALES_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('af_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('af_sale_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('af_sale_duration', $data->AUTO_FEATURE_SALES_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('af_sale_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Rent:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('af_rent_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('af_rent_price', $data->AUTO_FEATURE_RENT_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('af_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('af_rent_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('af_rent_duration', $data->AUTO_FEATURE_RENT_PRICE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('af_rent_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Roommate:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('af_roommate_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('af_roommate_price', $data->AUTO_FEATURE_ROOMMATE_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('af_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('af_roommate_duration') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('af_roommate_duration', $data->AUTO_FEATURE_ROOMMATE_DURATION,[ 'class' => 'form-control mb-1', 'placeholder' => 'Duration (Days)', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('af_roommate_duration', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <h2 class="mb-2 mt-2">Agent Properties Contact View</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Sale:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('apv_sale_price', $data->AGENT_PROP_VIEW_SALES_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('apv_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Rent:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('apv_rent_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('apv_rent_price', $data->AGENT_PROP_VIEW_RENT_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('apv_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Roommate:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('apv_roommate_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('apv_roommate_price', $data->AGENT_PROP_VIEW_ROOMMATE_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('apv_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-2 mt-2">Agent Commission</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Sale:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ac_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ac_sale_price', $data->AGENT_COMM_SALES_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ac_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Rent:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ac_rent_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ac_rent_price', $data->AGENT_COMM_RENT_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ac_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Roommate:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('ac_roommate_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('ac_roommate_price', $data->AGENT_COMM_ROOMMATE_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('ac_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <h2 class="mb-2 mt-2">Lead View</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Sale:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('lv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('lv_sale_price', $data->LEAD_VIEW_SALES_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('lv_sale_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Rent:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('lv_rent_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('lv_rent_price', $data->LEAD_VIEW_RENT_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('lv_rent_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Listing For Roommate:</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group {!! $errors->has('lv_roommate_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('lv_roommate_price', $data->LEAD_VIEW_ROOMMATE_PRICE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Price', 'tabindex' => 1 ]) !!}
                                    {!! $errors->first('lv_roommate_price', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions mt-10 mb-3 text-center">
                <a href="{{ route('admin.agents.list')}}">
                    <button type="button" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </button>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
