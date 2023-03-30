@extends('admin.layout.master')

@section('Product Management','open')
@section('area_list','active')

@section('title') Area @endsection
@section('page-name') Area @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Area</li>
@endsection

@php
    $roles = userRolePermissionArray()
@endphp
@push('custom_css')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')
    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@section('content')
    <div class="content-body min-height">
        <section id="pagination">
            <div class="row">
                <div class="col-8">
                    <div class="card card-sm card-success">
                        <div class="card-header pl-2">
                            <div class="form-group">
                                @if(hasAccessAbility('add_area', $roles))
                                    <a class="text-white btn btn-sm btn-primary"
                                       href="{{ route('admin.area.new')}}" title="Create new condition"><i
                                            class="ft-plus text-white"></i> Add New</a>
                                @endif

                            </div>
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
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered alt-pagination"
                                        id="indextable">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">SL.</th>
                                            <th class="" style="min-width: 100px;">Area Name</th>
                                            <th class="" style="min-width: 100px;">Sub Area Name</th>
                                            <th class="" style="min-width: 100px;">City Name</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th class="" style="">Order</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($data['areas']) && count($data['areas']))
                                            @foreach($data['areas'] as $key => $area)
                                                <tr>
                                                    <td class="text-center"
                                                        style="width: 50px;">{{ $key + 1 }}</td>
                                                    <td class="" style="">{{ $area['AREA_NAME'] }}</td>
                                                    <td class="" style="">{{ $area['SUB_AREA_NAME'] }}</td>
                                                    <td class="" style="">{{ $area['CITY_NAME'] }}</td>
                                                    <td>{{ $area['LAT'] ?? 'N/A' }}</td>
                                                    <td>{{ $area['LON'] ?? 'N/A' }}</td>
                                                    <td class="" style="">{{ $area['ORDER_ID'] }}</td>
                                                    <td class="text-center" style="width: 200px;">
                                                        @if(hasAccessAbility('edit_property_condition', $roles))
                                                            <a href="{{ route('admin.area.edit', $area['PK_NO'] ) }}" title="EDIT" class="btn btn-xs btn-info  mb-1"><i class="la la-edit"></i></a>
                                                        @endif
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
        </section>
    </div>
@endsection


@push('custom_js')

    <!--script only for brand page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script>


@endpush('custom_js')
