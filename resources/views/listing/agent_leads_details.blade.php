@extends('layouts.app')
@section('agent-leads','active')
@push('custom_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <style>
        .buy_leads_div p {
            font-family: 'Montserrat-Medium';
            font-size: 14px;
            text-transform: capitalize;
        }

        .buy_leads_div h3 {
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
                                    <h3><a href="{{ route('developer-buy-leads') }}"><i class="fa fa-long-arrow-left"></i>Buy Leads</a></h3>
                                </div>

                                <div class="row no-gutters position-relative buy_leads_div">
                                    <div class="col-12 mb-3">
                                        <h3 class="mb-1">Basic Info</h3>
                                        <p>Create Date: &emsp;<strong>{{date('d M, Y',strtotime($data['listing_details']->CREATED_AT))}}</strong></p>
                                        <p>Lead Type: &emsp;<strong>
                                                @if($data['listing_details']->LEAD_TYPE == 0)
                                                    100% Matching
                                                @else
                                                    Force Lead
                                                @endif
                                            </strong></p>
                                        <p>Lead Id: &emsp;<strong>{{$data['listing_details']->CODE}}</strong></p>
                                    </div>
                                    @php
                                        $area= [];
                                        foreach(json_decode($data['listing_details']->getRequirements->F_AREAS) as $i){
                                            $area[] = \App\Models\Area::where('id',$i)->first()->AREA_NAME;
                                        }
                                    @endphp
                                    <div class="col-12 mb-3">
                                        <h3 class="mb-1">Requirement Details</h3>
                                        <p>Looking property for: <strong>{{$data['listing_details']->getRequirements->PROPERTY_FOR}}</strong></p>
                                        <p>Property Type: &emsp;<strong>{{$data['listing_details']->getRequirements->PROPERTY_TYPE}}</strong></p>
                                        <p>Preferred Location: &emsp;<strong>{{implode(', ',$area)}}
                                            </strong></p>
                                        <p>Property Size: &emsp;<strong>{{$data['listing_details']->getRequirements->MIN_SIZE}}
                                                - {{$data['listing_details']->getRequirements->MAX_SIZE}} sft</strong></p>
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
                                        @if($data['is_paid'])
                                            <p>Mobile: &emsp;<strong>{{$data['listing_details']->getRequirements->getUser->MOBILE_NO}}</strong></p>
                                            <p>Email: &emsp;<strong>{{$data['listing_details']->getRequirements->getUser->EMAIL}}</strong></p>
                                        @else
                                            <p class="text-danger">Mobile number & Email Address only Could be view if you buy this
                                                BDT {{$data['listing_details']->getRequirements->LEAD_PRICE}}</p>
                                        @endif
                                    </div>

                                    @if($data['is_paid'])
                                    @else
                                        <div class="col-12">
                                            <a href="" data-toggle="modal" data-target="#paymentModal" class="btn btn-success">Buy Now</a>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-wrap text-center">
                        @auth
                            {!! Form::open([ 'route' => ['developer.lead.pay',$data['listing_details']->id], 'method' => 'post', 'id'=>'login_user', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}

                            {!! Form::hidden('f_lead_share_no',$data['listing_details']->id) !!}
                            {!! Form::hidden('f_requirement_no',$data['listing_details']->F_REQUIREMENT_NO) !!}
                            {!! Form::hidden('price',$data['listing_details']->getRequirements->LEAD_PRICE) !!}

                            <div class="row">
                                @if(Auth::user()->UNUSED_TOPUP < $data['listing_details']->getRequirements->LEAD_PRICE )
                                    <div class="col-12">
                                        <p style="font-size: 20px;color: #FF3521;display: inline-block;margin-bottom: 25px !important;">
                                            Sorry ! you do not have sufficiant
                                            balance to buy this lead.</p>
                                        <p>Your current balance</p>
                                        <strong
                                            style="font-size: 28px;color: #3986FA;display: inline-block;margin-bottom: 25px !important;">BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</strong>
                                    </div>
                                    <div class="col-12 form-group text-center">
                                        <a href="{{route('recharge-balance') . '?attempt=1'}}"
                                           class="btn btn-success">{{ __('Recharge Now') }}</a>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <p style="font-size: 20px;font-weight: bold;margin-bottom: 12px !important;">
                                            This property has been verified by bdflat.com</p>
                                        <p style="color: #6ABD50;font-weight: bold; margin-bottom: 25px !important;">If
                                            you want ot view the contact details including mobile
                                            number & address</p>
                                        <p>Please Pay:</p>
                                        <strong
                                            style="font-size: 28px;color: #FF3521;display: inline-block;margin-bottom: 25px !important;">BDT {{ number_format($data['listing_details']->getRequirements->LEAD_PRICE,2) }}</strong>
                                        <p>Your current balance</p>
                                        <strong
                                            style="font-size: 28px;color: #6ABD50;display: inline-block;margin-bottom: 25px !important;">BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</strong>
                                    </div>

                                    <div class="col-12 form-group text-center">
                                        <button style="width: 120px" type="submit"
                                                class="btn btn-success">{{ __('Pay Now') }}</button>
                                    </div>

                                @endif
                            </div>
                            {!! Form::close() !!}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('custom_js')

@endpush
