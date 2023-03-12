@extends('layouts.app')

@push('custom_css')


@endpush

@section('content')
<!-- 
     ============   dashboard   ============
 -->
<!-- 
     ============   dashboard   ============
 -->
<div class="dashboard-sec">
  <!-- container -->
  <div class="container">
      <!-- row -->
      <div class="row">

          <div class="col-md-4 mb-5 d-none d-md-block">
              <div class="dashboard-wrapper">
                   @include('users._user_dashboard_menu')
              </div>
          </div>

          <div class="col-sm-12 col-md-8">
               <div class="account-details">
                     
                    <div class="property-wrapper">
                        <div class="new-property">
                            <div class="property-heading">
                                <h3><a href="my-dashboard.html"><i class="fa fa-long-arrow-left"></i>Contacted Properties</a></h3>
                            </div>

                            <!-- product -->
                            <div class="property-product mb-4">
                                <div class="row no-gutters position-relative">
                                    <div class="col-4">
                                        <div class="property-bx">
                                            <a href="details.html"><img src="{{asset('assets/img/product/6.jpg')}}" class="w-100" alt="image"></a>
                                        </div>
                                    </div>
                                    <div class="col-8 position-static">
                                        <h3>TK 569 <span class="float-right claim"><a href="refund.html">Claim Refund</a> <i class="fa fa-exclamation-triangle"></i></span></h3>
                                        <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina Display</a></h5>
                                        <h6>2 Bed, 3 Bath</h6>
                                        <a href="#" class="location"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                    </div>
                                </div>
                            </div>

                             <!-- product -->
                            <div class="property-product">
                                <div class="row no-gutters position-relative">
                                    <div class="col-4">
                                        <div class="property-bx">
                                            <a href="details.html"><img src="{{asset('assets/img/product/6.jpg')}}" class="w-100" alt="image"></a>
                                        </div>
                                    </div>
                                    <div class="col-8 position-static">
                                        <h3>TK 569 <span class="float-right claim"><a href="refund.html">Claim Refund</a><i class="fa fa-exclamation-triangle"></i></span></h3>
                                        <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina Display</a></h5>
                                        <h6>2 Bed, 3 Bath</h6>
                                        <a href="#" class="location"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
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
