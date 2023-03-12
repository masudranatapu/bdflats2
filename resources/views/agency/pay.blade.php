@extends('layouts.app')
@section('agency-listings','active')
@push('custom_css')

@endpush
<?php
$type = $data['listing']->PROPERTY_FOR ?? null;
$price = 0;
if ($type == 'sale') {
    $price = $data['listing']->listingType->SELL_PRICE ?? 0;
} else if ($type == 'rent') {
    $price = $data['listing']->listingType->RENT_PRICE ?? 0;
} else if ($type == 'roommate') {
    $price = $data['listing']->listingType->ROOMMATE_PRICE ?? 0;
}

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
                <div class="col-md-9 col-sm-12">
                    <div class="account-details">
                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="{{ route('agency-listings') }}"><i class="fa fa-long-arrow-left"></i>My Properties</a></h3>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 offset-md-3">
                                        <div class="card shadow text-center">
                                            <div class="card-body">
                                                <h6 class="font-weight-bold">Hi, you are paying amount for
                                                    "{{ $data['listing']->listingType->NAME }}"</h6>
                                                <div class="my-2">
                                                    <h6>Your Current Balance</h6>
                                                    <h2 class="text-primary font-weight-bold">
                                                        BDT {{ number_format(Auth::user()->UNUSED_TOPUP, 2) }}</h2>
                                                </div>
                                                <div class="my-2">
                                                    <h6>Listing Cost</h6>
                                                    <h2 class="text-danger font-weight-bold">
                                                        BDT {{ number_format($price, 2) }}</h2>
                                                </div>
                                                <div class="my-2">
                                                    @if(Auth::user()->UNUSED_TOPUP - $price < 1)
                                                        <h6>Recharge Needed</h6>
                                                        <h2 class="text-warning font-weight-bold">
                                                            BDT {{ number_format(-(Auth::user()->UNUSED_TOPUP - $price), 2) }}</h2>
                                                    @else
                                                        <h6>Balance After Payment</h6>
                                                        <h2 class="text-success font-weight-bold">
                                                            BDT {{ number_format(Auth::user()->UNUSED_TOPUP - $price, 2) }}</h2>
                                                    @endif

                                                </div>
                                                <div class="my-3">
                                                    @if(Auth::user()->UNUSED_TOPUP - $price < 1)
                                                        <a href="{{ route('recharge-balance') }}" class="btn text-white" style="background: #d8232a;">Recharge
                                                            Now</a>
                                                    @else
                                                        <a href="#" class="btn text-white" onclick="event.preventDefault();document.getElementById('pay').submit()" style="background: #d8232a;">Pay
                                                            Now</a>
                                                        <form action="{{ route('agency.listings.pay', $data['listing']->id) }}" id="pay" method="post"
                                                              class="d-none">
                                                            @csrf
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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
