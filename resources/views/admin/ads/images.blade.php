@extends('admin.layout.master')

@section('web_ads','open')
@section('ads','active')

@section('title') Ads | Images @endsection
@section('page-name') Ads | Images @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Ads</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush

@push('custom_js')
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
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header pb-0">
                        @if(hasAccessAbility('view_ads_images', $roles))
                            <a href="{{ route('web.ads') }}" class="btn btn-primary btn-sm">Back</a>
                        @endif
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-0">
                            <div class="row  mb-2">
                                <div class="col-12">
                                    {!! Form::open([ 'route' => ['web.ads.image.store', $data['id']], 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
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
                                            @if(isset($data['images']) && count($data['images']) > 0 )
                                                @foreach( $data['images'] as $key => $image )
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            <img src="{{ asset($image->IMAGE_PATH) }}" alt=""
                                                                 style="max-height: 100px;max-width: 500px">
                                                        </td>
                                                        <td>{{ $image->ORDER_ID }}</td>
                                                        <td>{{ $image->URL }}</td>
                                                        <td>
                                                            @if(hasAccessAbility('edit_ads_image', $roles))
                                                                <a class="btn edit-btn btn-sm btn-warning text-white"
                                                                   href=""
                                                                   data-value="{{ $image->ORDER_ID }}"
                                                                   data-id="{{ $image->PK_NO }}"
                                                                   title="Edit">
                                                                    <i class="la la-pencil"></i>
                                                                </a>
                                                            @endif
                                                            @if(hasAccessAbility('delete_ads_image', $roles))
                                                                <a class="btn btn-sm btn-danger text-white"
                                                                   onclick="return confirm('Are you sure?')"
                                                                   href="{{ route('web.ads.image.delete', $image->PK_NO) }}"
                                                                   title="Images">
                                                                    <i class="la la-trash"></i>
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
                {!! Form::open([ 'route' => ['web.ads.image.update', $data['id']], 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
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
