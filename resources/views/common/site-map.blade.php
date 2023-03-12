@extends('layouts.app')
@push('custom_css')
@endpush
@section('content')
<!-- 
    ============   page-header    ============
 -->
<div class="page-heading">
    <!-- container -->
     <div class="container">
         <div class="page-name">
            <ul>
                <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                <li>Sitemap</li>
            </ul>
             <h1>Sitemap</h1>
         </div>
     </div><!-- container -->
</div>

 <!-- 
     ============   sitemap    ============
 -->
 <div class="sitemap-sec">
    <!-- container -->
    <div class="container">
          <div class="sitemap-heading">
                <h3>General Site Links</h3>
          </div>
        <!-- row -->
        <div class="row mb-5">
            <div class="col-sm-4">
                <div class="sitemap-wrap">
                    <div class="sitemap-list">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('about-us')}}">About Us</a></li>
                            <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                            <li><a href="{{route('login')}}">Login</a></li>
                            <li><a href="{{route('register')}}">Registraion</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="sitemap-wrap">
                    <div class="sitemap-list">
                        <ul>
                            <li><a href="{{route('terms-conditions')}}">Terms Conditions</a></li>
                            <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('post-requirement')}}">Post Requirement</a></li>
                            <li><a href="{{ route('web.property', ['type' => 'sale']) }}">Sale</a></li>
                            <li><a href="{{ route('web.property', ['type' => 'rent']) }}">Rent</a></li>
                        </ul>
                    </div>
                </div>
            </div>

             <div class="col-sm-4">
                <div class="sitemap-wrap">
                    <div class="sitemap-list">
                        <ul>
                            <li><a href="{{ route('web.property', ['type' => 'roommate']) }}">Rommate</a></li>
                            <li><a href="{{ route('web.property') }}?verified=1">Verified properties</a></li>
                            <li><a href="{{route('password.request')}}">Forgot Password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
 </div>



@endsection

@push('custom_js')

@endpush
