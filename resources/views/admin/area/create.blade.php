@extends('admin.layout.master')

@section('Product Management','open')
@section('area_list','active')

@section('title') City / Division @endsection
@section('page-name') City / Division @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">City / Division</li>
@endsection

@php
    $roles = userRolePermissionArray();
$status = [
    1 => 'Active',
    0 => 'Inactive'
];
@endphp
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')
    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
@endpush

@section('content')
    <div class="content-body min-height">
        <section id="pagination">
            <div class="row">
                <div class="col-6">
                    <div class="card card-sm card-success">
                        <div class="card-header pl-2">
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
                            <div class="card-body card-dashboard">
                                {!! Form::open([ 'route' => 'admin.area.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('city', 'City *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::select('city', $data['cities'] ?? [], old('city'), ['id' => 'city', 'class' => 'form-control select2', 'data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('parent_area', 'Parent Area', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::select('parent_area', [], old('parent_area'), ['id' => 'area', 'class' => 'select2 form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Select parent area']) !!}
                                                {!! $errors->first('parent_area', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('area_name', 'Area Name *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::text('area_name', old('area_name'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Area Name']) !!}
                                                {!! $errors->first('area_name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('latitude', 'Latitude *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::text('latitude', old('latitude'), ['class' => 'form-control', 'placeholder' => 'Latitude']) !!}
                                                {!! $errors->first('latitude', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('longitude', 'Longitude *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::text('longitude', old('longitude'), ['class' => 'form-control', 'placeholder' => 'Longitude']) !!}
                                                {!! $errors->first('longitude', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('order', 'Order *', ['class' => 'label-title']) !!}
                                            <div class="controls">
                                                {!! Form::number('order', old('order'), ['class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Order']) !!}
                                                {!! $errors->first('order', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.area.list')}}">
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
        </section>
    </div>
@endsection


@push('custom_js')

    <!--script only for brand page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script>
    <script>
        $(document).ready(function () {
            let city = $('#city');
            let area = $('#area');

            city.change(function () {
                updateArea();
            });

            function updateArea() {
                $.ajax('{{ route('admin.area.get') }}?city=' + city.val())
                    .done(function (res) {
                        area.html('');
                        area.append(new Option('Select area', 0));
                        for (const a in res.data) {
                            let option = new Option(res.data[a], a);
                            area.append(option);
                        }
                    })
            }
            updateArea();
        })
    </script>

@endpush
