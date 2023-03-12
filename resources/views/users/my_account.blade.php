@extends('layouts.app')

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

          <div class="col-md-4 mb-5 d-none d-md-block">
              <div class="dashboard-wrapper">
                  @include('users._user_dashboard_menu')
              </div>
          </div>

          <div class="col-sm-12 col-md-8">
               <div class="account-details">
                    <div class="account-user">
                        <div class="user-bx">
                            <img src="{{asset('assets/img/user/1.jpg')}}" alt="image">
                        </div>
                        <div class="user-profile">
                            <h3>{{Auth::user()->NAME}} <span style="font-size: 12px;">({{Auth::user()->USER_TYPE}})</span></h3>
                            <h5>User Id: D292</h5>
                            <a href="edit-profile.html"><i class="fa fa-edit"></i>Edit Profile</a>
                        </div>
                        <div class="user-logout">
                            <a class="nav-link"  href="{{ route('logout') }}"
		                        onclick="event.preventDefault();
		                        document.getElementById('logout-form').submit();">
		                        {{ __('Logout') }}
		                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                        </div>
                    </div>
                    <div class="user-wrapper">
                        <div class="user-nav">
                            <div class="row text-center">
                                <div class="col-4 mb-2">
                                    <div class="user-box">
                                        <a href="#">
                                          <span>01</span><br/>
                                           New Properties
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4 mb-2">
                                    <div class="user-box box2">
                                        <a href="#">
                                            <span>02</span><br/>
                                             Contacted
                                        </a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="user-box box3">
                                        <a href="#">
                                          <span>03</span><br/>
                                          Balance
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="property-wrapper">
                        <div class="new-property">
                            <div class="property-heading">
                                <h3>New Property <span class="float-right"><a href="#">See All</a></span></h3>
                            </div>
                            <div class="row">
                               <div class="col-lg-6 mb-3">
                                    <!-- product -->
                                    <div class="sale-wrapper">
                                        <div class="sale-product">
                                            <div class="row no-gutters position-relative">
                                                  <div class="col-3 col-md-5">
                                                      <div class="category-bx">
                                                           <a href="details.html"><img src="{{asset('assets/img/verified/1.jpg')}}" class="img-fluid" alt="image"></a>
                                                      </div>
                                                      <div class="featured">
                                                          <div class="feature-text">
                                                              <span>Featured</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-9 col-md-7 position-static pl-3">
                                                      <div class="category-price">
                                                          <h3>TK 50.00</h3>
                                                      </div>
                                                      <div class="category-title">
                                                          <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina Display</a></h5>
                                                      </div>
                                                      <div class="category-address">
                                                          <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                                      </div>
                                                      <div class="owner-info">
                                                          <ul>
                                                              <li><i class="fa fa-edit"></i><a href="#">Edit</a></li>
                                                              <li><i class="fa fa-times"></i><a href="#">Delete</a></li>
                                                              <li class="float-right"><i class="fa fa-check"></i></li>
                                                          </ul>
                                                      </div>
                                                  </div>
                                              </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <!-- product -->
                                    <div class="sale-wrapper">
                                        <div class="sale-product">
                                            <div class="row no-gutters position-relative">
                                                  <div class="col-3 col-md-5">
                                                      <div class="category-bx">
                                                          <a href="details.html"><img src="{{asset('assets/img/verified/1.jpg')}}" class="img-fluid" alt="image"></a>
                                                      </div>
                                                      <div class="featured">
                                                          <div class="feature-text">
                                                              <span>Featured</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-9 col-md-7 position-static pl-3">
                                                      <div class="category-price">
                                                           <h3>TK 569 <span class="float-right" style="color:#92D36E;">Verified <i class="fa fa-check-square"></i></span></h3>
                                                      </div>
                                                      <div class="category-title">
                                                          <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina Display</a></h5>
                                                      </div>
                                                      <div class="category-address">
                                                          <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                                      </div>
                                                      <div class="owner-info">
                                                          <ul>
                                                              <li><i class="fa fa-edit"></i><a href="#">Edit</a></li>
                                                              <li><i class="fa fa-times"></i><a href="#">Delete</a></li>
                                                              <li class="float-right"><i class="fa fa-check"></i></li>
                                                          </ul>
                                                      </div>
                                                  </div>
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
