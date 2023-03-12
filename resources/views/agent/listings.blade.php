@extends('layouts.app')
@section('agent-listings','active')
@push('custom_css')

@endpush
<?php
$listings = $data['listings'] ?? [];
?>

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="account-details">
                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="{{ route('agent-listings') }}"><i class="fa fa-long-arrow-left"></i>My Properties</a> <a
                                            href="{{ route('agent.listings.create') }}" style="float: right;">Add new</a></h3>
                                </div>

                                <!-- product -->
                                <table class="table table-striped table-responsive" style="font-family: 'Montserrat-Medium';font-size: 14px">
                                    <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>PID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        {{-- <th>Ad For</th> --}}
                                        {{-- <th>Ad Type</th> --}}
                                        <th>Last Update</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($listings->count()>0)
                                        @foreach($listings as $key => $listing)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{$listing->CODE}}</td>
                                                <td>{{$listing->TITLE}}</td>
                                                <td>{{$listing->AREA_NAME}}, {{$listing->CITY_NAME}}</td>
                                                {{-- <td>{{$listing->PROPERTY_FOR}}</td> --}}
                                                {{-- <td title="{{ $listing->LISTING_TYPE }}">{{$listing->SHORT_NAME}}</td> --}}
                                                <td>{{date('M m, Y', strtotime($listing->MODIFIED_AT))}}</td>
                                                <td>Pending</td>
                                                <td width="20%">
                                                    <a href="{{ route('agent.listings.edit', $listing->id) }}" class="text-info">Edit</a> |
                                                    <a href="{{ route('agent.listings.delete', $listing->id) }}" onclick="return confirm('Are you sure?')" class="text-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">
                                                <h6 class="font-weight-bold text-danger text-center">No Data Found!</h6>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{ $listings->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
