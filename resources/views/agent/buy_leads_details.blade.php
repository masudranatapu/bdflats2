@extends('layouts.app')
@section('agent-buy-leads','active')
@push('custom_css')
    <style>
        .buy_leads_div p{
            font-family: 'Montserrat-Medium';
            font-size: 14px;
            text-transform: capitalize;
        }

        .buy_leads_div h3{
            font-family: 'Montserrat-Medium';
        }
    </style>
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
                                    <h3><a href="{{ route('agent-buy-leads') }}"><i class="fa fa-long-arrow-left"></i>Buy Leads</a> <a href="{{ route('agent-leads') }}"
                                                                                                                                 class="link"
                                                                                                                                 style="float: right">Leads</a></h3>
                                </div>
                                @php
                                    $area= [];
                                    foreach(json_decode($data['listing_details']->getRequirements->F_AREAS) as $i){
                                        $area[] = \App\Models\Area::where('id',$i)->first()->AREA_NAME;
                                    }
                                @endphp

                                <div class="row no-gutters position-relative buy_leads_div">
                                    <div class="col-12 mb-3">
                                        <h3 class="mb-1">Basic Info</h3>
                                        <p>Create Date: &emsp;<strong>{{date('d M, Y',strtotime($data['listing_details']->CREATED_AT))}}</strong></p>
                                        <p>Lead Type: &emsp;<strong>Matching</strong></p>
                                        <p>Lead Id: &emsp;<strong>100002</strong></p>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <h3 class="mb-1">Requirement Details</h3>
                                        <p>Looking property for: <strong>{{$data['listing_details']->getRequirements->PROPERTY_FOR}}</strong></p>
                                        <p>Property Type: &emsp;<strong>{{$data['listing_details']->getRequirements->PROPERTY_TYPE}}</strong></p>
                                        <p>Preferred Location: &emsp;<strong>{{implode(', ',$area)}}</strong></p>
                                        <p>Property Size: &emsp;<strong>{{$data['listing_details']->getRequirements->MIN_SIZE}} - {{$data['listing_details']->getRequirements->MAX_SIZE}} sft</strong></p>
                                        <p>Condition: &emsp;<strong>
                                                @php
                                                    $c =[];
                                                @endphp
                                                @foreach (json_decode($data['listing_details']->getRequirements->PROPERTY_CONDITION) as $cond) @php  $c[] = $cond @endphp @endforeach {{implode(', ',$c)}}
                                            </strong></p>
                                        <p>Requirement Details: &emsp;
                                            <strong>
                                                {!! $data['listing_details']->getRequirements->REQUIREMENT_DETAILS !!}
                                            </strong>
                                        </p>
                                        <p>Preferred Time To Contact: &emsp;<strong>{{$data['listing_details']->getRequirements->PREP_CONT_TIME}}</strong></p>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <h3 class="mb-1">Seeker Details</h3>
                                        <p>Name: &emsp;<strong>{{$data['listing_details']->getRequirements->getUser->NAME}}</strong></p>
                                        <p>Country: &emsp;<strong>Bangladesh</strong></p>
                                        <p class="text-danger">Mobile number & Email Address only Could be view if you buy this BDT 75</p>
                                    </div>

                                    <div class="col-12">
                                        <a href="" class="btn btn-success">Buy Now</a>
                                    </div>
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
