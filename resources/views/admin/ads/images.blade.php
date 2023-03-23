@extends('admin.layouts.master')

@section('Web Ads','menu-open')
@section('ads_list','active')

@section('title') Ads | Images @endsection
@section('page-name') Ads | Images @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush

@push('script')
    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
    <script src="{{asset('/assets/css/image_upload/image-uploader.min.js')}}"></script>
    <script>
        $('#imageFile').imageUploader();

        $(document).ready(function () {
            let editBtn = $('.edit-btn');

            editBtn.click(function (e) {
                e.preventDefault();
                $('#orderID').val($(this).data('value'));
                $('#imageID').val($(this).data('id'));
                $('#editModal').modal();
            });
        });
    </script>
@endpush

@php
    $rows = $data['rows'];
@endphp

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Ad Image') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Ad Image') }}</li>
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
                            <h5 class="m-0">{{ __('Ad Image list') }}</h5>
                            <span class="float-right">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">All Users</a>
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">+ Create Role</a>
                            </span>
                        </div>

                        <div class="card-content">
                            <div class="card-body pt-0">
                                <div class="row  mb-2">
                                    <div class="col-12">
                                        {!! Form::open([ 'route' => ['admin.ads-image.store', $id], 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                                        <div class="row form-group {!! $errors->has('images') ? 'error' : '' !!}">
                                            <div class="col-sm-4 offset-sm-4">
                                                <div class="controls">
                                                    <div id="imageFile" style="padding-top: .5rem;"></div>
                                                </div>
                                                {!! $errors->first('images', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                        <div class="row form-group {!! $errors->has('order_id') ? 'error' : '' !!}">
                                            <div class="col-sm-4 offset-sm-4">
                                                <div class="controls">
                                                    {{ Form::label('order_id', 'Order ID <span>*</span>', ['class' => 'label-title'], false) }}
                                                    {!! Form::number('order_id', old('order_id'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Order ID']) !!}
                                                </div>
                                                {!! $errors->first('order_id', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                            <div class="col-sm-4 offset-sm-4">
                                                <div class="controls">
                                                    {{ Form::label('url', 'URL <span>*</span>', ['class' => 'label-title'], false) }}
                                                    {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => 'URL']) !!}
                                                </div>
                                                {!! $errors->first('url', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                            <div class="col-sm-4 offset-sm-4 mt-2">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-12">
                                        <div class="table-responsive ">
                                            <table
                                                class="table table-striped table-bordered table-sm text-center" {{--id="process_data_table"--}}>
                                                <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Photo</th>
                                                    <th>Order ID</th>
                                                    <th>URL</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($rows) && count($rows) > 0 )
                                                    @foreach( $rows as $key => $image )
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>
                                                                <img src="{{ asset($image->image_path) }}" alt=""
                                                                     style="max-height: 100px;max-width: 500px">
                                                            </td>
                                                            <td>{{ $image->order_id }}</td>
                                                            <td>{{ $image->url }}</td>
                                                            <td>
                                                                @if (Auth::user()->can('admin.ads-image.update'))
                                                                    <a class="btn btn-xs btn-success mb-05 mr-05"
                                                                       href=""
                                                                       data-value="{{ $image->order_id }}"
                                                                       data-id="{{ $image->id }}"
                                                                       title="Edit">
                                                                        Edit
                                                                    </a>
                                                                @endif
                                                                @if (Auth::user()->can('admin.ads-image.delete'))
                                                                    <a class="btn btn-xs btn-danger mb-05 mr-05"
                                                                       onclick="return confirm('Are you sure?')"
                                                                       href="{{ route('admin.ads-image.delete', $image->id) }}"
                                                                       title="Images">
                                                                       Delete
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Images!</td>
                                                    </tr>
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
</div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="Edit Image Order"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Image Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open([ 'route' => ['admin.ads-image.update', $id], 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                {!! Form::hidden('id', null, ['id' => 'imageID']) !!}
                <div class="modal-body">
                    <div class="from-group">
                        {{ Form::label('orderID', 'Order ID', ['class' => 'label-title'], false) }}
                        <div class="controls">
                            {!! Form::number('order_id', null, ['id' => 'orderID', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required']) !!}
                            {!! $errors->first('order_id', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                    <div class="from-group">
                        {{ Form::label('url', 'URL', ['class' => 'label-title'], false) }}
                        <div class="controls">
                            {!! Form::text('url', null, ['id' => 'url', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required']) !!}
                            {!! $errors->first('url', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
