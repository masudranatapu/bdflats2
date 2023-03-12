@extends('admin.layout.master')

@section('Customer Management','open')
@section('reseller_list','active')

@section('title') Reseller | List @endsection
@section('page-name') Reseller | List @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('invoice.breadcrumb_title')    </a>
    </li>
    <li class="breadcrumb-item active">@lang('reseller.breadcrumb_sub_title')
    </li>
@endsection
@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if(hasAccessAbility('new_reseller', $roles))
                            <a class="text-white btn btn-round btn-sm btn-primary" href="{{route('admin.reseller.create')}}"><i class="ft-plus text-white"></i>@lang('reseller.create_btn')</a>
                            @endif
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
                                <div class="table-responsive p-1">
                                    <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 80px;">SL.</th>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>Email</th>
                                            <th>Discount</th>
                                            <th>Agent</th>
                                            <th>Balance Buffer</th>
                                            <th>Balance Actual</th>
                                            <th>Due</th>
                                            <th class="text-center" style="width: 120px;">@lang('tablehead.tbl_head_action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $row)
                                            <tr>
                                                <td  class="text-center"  style="width: 80px;">{{$loop->index + 1}}</td>
                                                <td><span class="text-upper">{{ $row->NAME }}</span></td>
                                                <td>{{ $row->MOBILE_NO }}</td>
                                                <td>{{ $row->EMAIL }}</td>
                                                <td>{{ $row->DISCOUNT_PERCENTAGE }}</td>
                                                <td><span class="text-upper"></span>{{ $row->agent->NAME }}</td>
                                                <td>{{ $row->CUM_BALANCE_BUFFER }}</td>
                                                <td>{{ $row->CUM_BALANCE_ACTUAL }}</td>
                                                <td>{{ 0 }}</td>
                                                <td class="text-center" style="width: 120px;">
                                                    @if(hasAccessAbility('edit_reseller', $roles))
                                                    <a href="{{ route('admin.reseller.edit', [$row->PK_NO]) }}" title="View & Edit Reseller" class="btn btn-xs btn-primary"><i class="la la-edit" ></i>
                                                    </a>
                                                    @endif

                                                    @if(hasAccessAbility('delete_reseller ', $roles))
                                                    <a href="{{ route('admin.reseller.delete', [$row->PK_NO]) }}" onclick="return confirm('Are you sure you want to delete?')" title="Delete Reseller" class="btn btn-xs btn-danger"><i class="la la-trash"></i></a>
                                                    @endif

                                                    @if(hasAccessAbility('new_payment', $roles))
                                                        <a href="{{ route('admin.payment.create', [ $row->PK_NO, 'reseller' ]) }}" class="btn btn-xs btn-danger" title="ADD NEW PAYMENT"><i class="la la-money"></i></a>
                                                    @endif
                                                    <a href="{{ route('admin.booking.create', [ $row->PK_NO, 'reseller' ]) }}" class="btn btn-xs btn-success" title="ADD BOOKING"><i class="la la-plus"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach()
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
