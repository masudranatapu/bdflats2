@extends('layouts.app')
@section('agent-buy-leads','active')
@push('custom_css')

@endpush

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
                                    <h3><a href="{{ route('developer-listings') }}"><i class="fa fa-long-arrow-left"></i>My Properties</a> <a
                                            href="{{ route('developer.listings.create') }}" style="float: right;">Add new</a></h3>
                                </div>

                                <!-- product -->
                                <table class="table table-striped text-center" style="font-family: 'Montserrat-Medium';font-size: 14px">
                                    <thead>
                                    <tr>
                                        <th>PID</th>
                                        <th>Name</th>
                                        <th>Property Type</th>
                                        <th>Looking For</th>
                                        <th>Location</th>
                                        <th>Matched</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($data['listing']->count()>0)
                                        @foreach($data['listing'] as $item)
                                            @php
                                                $area= [];
                                                foreach(json_decode($item->getRequirements->F_AREAS) as $i){
                                                    $area[] = \App\Models\Area::where('id',$i)->first()->AREA_NAME;
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{$item->getRequirements->getUser->CODE}}</td>
                                                <td>{{$item->getRequirements->getUser->NAME}}</td>
                                                <td>{{$item->getRequirements->PROPERTY_TYPE}}</td>
                                                <td>{{$item->getRequirements->PROPERTY_FOR}}</td>
                                                <td>{{implode(', ',$area)}}</td>
                                                <td>
                                                    @if($item->LEAD_TYPE == 0)
                                                        <span class="text-success">100% Matched</span>
                                                    @else
                                                        <span class="text-danger">Force Lead</span>
                                                    @endif
                                                </td>
                                                <td width="25%">
                                                    <a href="{{route('agent-lead-details',$item->id)}}" class="text-info">Details</a> |
                                                    <a href="#" class="text-info">Buy Now</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-danger text-center font-weight-bold">No Data Found!</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {{$data['listing']->links()}}
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
