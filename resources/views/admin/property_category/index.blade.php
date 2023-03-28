@extends('admin.layouts.master')

@section('settings_menu','menu-open')
@section('propertycategory','active')

@section('title') Property Category @endsection
@section('page-name') Property Category @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="breadcrumb-item active">Property Category</li>
@endsection

@php

@endphp

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush


@section('content')


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Property Category') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Property Category') }}</li>
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
                                {{ __('Property Category') }}
                                <a href="{{ route('admin.propertycategory.create') }}"
                                    class="btn btn-success btn-sm float-right">Add New</a>
                            </h5>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                  <thead>
                                    <tr>
                                      <th class="text-center" style="width: 50px;">SL.</th>
                                      <th class="" style="min-width: 100px;">Property Type</th>
                                      <th class="" style="min-width: 100px;">Meta Title</th>
                                      <th class="" style="min-width: 100px;">Meta Description</th>
                                      <th class="" style="min-width: 100px;">Body Description</th>
                                      <th class="" style="min-width: 100px;">URL</th>
                                      <th class="text-center" style="min-width: 100px;">Image</th>
                                      <th class="text-center" style="min-width: 100px;">Icon</th>
                                      <th class="text-center" style="">Order</th>
                                      <th class="text-center" style="width: 200px;">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($rows as $row)
                                    <tr>
                                      <td class="text-center" style="width: 50px;">{{ $loop->index + 1 }}</td>
                                      <td class="" style="">{{ $row->property_type }}</td>
                                        <td>{{ $row->meta_title }}</td>
                                        <td>{{ $row->meta_desc }}</td>
                                        <td>{{ $row->body_desc }}</td>
                                        <td>{{ $row->url_slug }}</td>
                                        <td class="text-center">
                                            <a href="{{ asset($row->img_path) }}" target="_blank">
                                                <img src="{{ asset($row->img_path) }}" alt="" style="max-width: 150px;max-height: 120px">
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ asset($row->icon_path) }}" target="_blank">
                                                <img src="{{ asset($row->icon_path) }}" alt="" style="max-width: 150px;max-height: 120px">
                                            </a>
                                        </td>
                                      <td class="text-center" style="">{{ $row->order_id }}</td>
                                        <td class="text-center" style="width: 200px;">

                                          <a href="{{ route('admin.propertycategory.edit', [$row->id]) }}" title="EDIT" class="btn btn-xs btn-info  mb-1">Edit</a>
                                          <a href="{{ route('admin.propertycategory.delete', [$row->id]) }}" title="DELETE" class="btn btn-xs btn-danger  mb-1">Delete</a>

                                        </td>
                                      </tr>
                                      @endforeach
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

@endsection


@push('custom_js')

<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>


@endpush('custom_js')
