@extends('admin.layouts.master')

@section('settings_menu', 'menu-open')
@section('area_list', 'active')

@section('title') {{ __('Area | Update') }} @endsection
@section('page-name') {{ __('Area | Update') }} @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Area') }}</li>
@endsection

@php

    $status = [
        1 => 'Active',
        0 => 'Inactive',
    ];
@endphp
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Area') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Area') }}</li>
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
                                <h5 class="m-0">
                                    {{ __('Area Edit') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.area.list') }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-backward"></i>
                                            {{ __('Back') }}
                                        </a>
                                    </span>
                                </h5>
                            </div>

                            <div class="card-body card-dashboard">
                                {!! Form::open([
                                    'route' => ['admin.area.update', $data['area']->id],
                                    'method' => 'post',
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'novalidate',
                                ]) !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('city', 'City *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::select('city', $data['cities'] ?? [], old('city', $data['area']->f_city_no), [
                                                    'id' => 'city',
                                                    'class' => 'form-control select2',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'City',
                                                ]) !!}
                                                {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('parent_area', 'Parent Area', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::select('parent_area', [], old('parent_area'), [
                                                    'id' => 'area',
                                                    'class' => 'select2 form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'Select parent area',
                                                ]) !!}
                                                {!! $errors->first('parent_area', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('area_name', 'Area Name *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::text('area_name', old('area_name', $data['area']->area_name), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'Area Name',
                                                ]) !!}
                                                {!! $errors->first('area_name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('latitude', 'Latitude *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::text('latitude', old('latitude', $data['area']->lat), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Latitude',
                                                ]) !!}
                                                {!! $errors->first('latitude', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('longitude', 'Longitude *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::text('longitude', old('longitude', $data['area']->lon), [
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Longitude',
                                                ]) !!}
                                                {!! $errors->first('longitude', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('order', 'Order *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::number('order', old('order', $data['area']->order_id), [
                                                    'class' => 'form-control',
                                                    'data-validation-required-message' => 'This field is required',
                                                    'placeholder' => 'Order',
                                                ]) !!}
                                                {!! $errors->first('order', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.area.list') }}">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="fa fa-times"></i> {{ __('Cancel') }}
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> {{ __('Save') }}
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
    <!-- BEGIN: Data Table-->
    <script src="{{ asset('/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
    <!-- END: Data Table-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <!--script only for brand page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js') }}"></script>
    <script>
        $(document).ready(function() {
            let city = $('#city');
            let area = $('#area');

            city.change(function() {
                updateArea();
            });

            function updateArea() {
                $.ajax('{{ route('admin.area.get') }}?city=' + city.val())
                    .done(function(res) {
                        area.html('');
                        area.append(new Option('Select area', 0));
                        for (const a in res.data) {
                            let option = new Option(res.data[a], a, parseInt(a) === parseInt(
                                {{ $data['area']->F_PARENT_AREA_NO }}), parseInt(a) === parseInt(
                                {{ $data['area']->F_PARENT_AREA_NO }}));
                            area.append(option);
                        }
                    })
            }
            updateArea();
        })
    </script>
@endpush
