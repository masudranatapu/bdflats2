<!--
     ============  footer   ============
 -->
@php
    $webSetting = \App\Models\WebSetting::find(1);
@endphp
<footer class="footer-sec">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-6 col-lg-4 mb-5">
                <div class="footer-wrapper">
                    <div class="widget-heading">
                        <h3>About Bdflats</h3>
                    </div>
                    <div class="about-bdflats">
                        <p>{{ $webSetting->DESCRIPTION ?? '' }}</p>
                        <p>{{ $webSetting->HQ_ADDRESS ?? '' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2 mb-5">
                <div class="footer-wrapper">
                    <div class="widget-heading">
                        <h3>Quick Links</h3>
                    </div>
                    <div class="widget-list">
                        <ul>
                            <li><a href="{{route('about-us')}}">About Us</a></li>
                            <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                            <li><a href="{{route('terms-conditions')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{route('site-map')}}">Sitemap</a></li>
                            @if(!Auth::user() || (Auth::user()->USER_TYPE == 1 && !Auth::user()->requirements()->count()))
                                <li><a href="{{route('post-requirement')}}">Post Requirement</a></li>
                            @endif
                            <li><a href="{{ route('make-suggested-property') }}">Make suggested property</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-2 mb-5">
                <div class="footer-wrapper">
                    <div class="widget-heading">
                        <h3>Follow Us</h3>
                    </div>
                    <div class="widget-list">
                        <ul>
                            @if($webSetting->FACEBOOK_URL)
                                <li><a href="{{ $webSetting->FACEBOOK_URL }}" target="_blank">Facebook</a></li>
                            @endif
                            @if($webSetting->TWITTER_URL)
                                <li><a href="{{ $webSetting->TWITTER_URL }}" target="_blank">Twitter</a></li>
                            @endif
                            @if($webSetting->INSTAGRAM_URL)
                                <li><a href="{{ $webSetting->INSTAGRAM_URL }}" target="_blank">Instagram</a></li>
                            @endif
                            @if($webSetting->YOUTUBE_URL)
                                <li><a href="{{ $webSetting->YOUTUBE_URL }}" target="_blank">YouTube</a></li>
                            @endif
                            @if($webSetting->PINTEREST_URL)
                                <li><a href="{{ $webSetting->PINTEREST_URL }}" target="_blank">Pinterest</a></li>
                            @endif
                            @if($webSetting->WHATS_APP)
                                <li><a href="{{ $webSetting->WHATS_APP }}" target="_blank">WhatsApp</a></li>
                            @endif

                            <li><a href="{{ route('make-lead') }}">Make lead</a></li>
                            {{-- <li><a href="{{ route('make-expaired-property') }}" >Make expaired property</a></li> --}}



                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-5">
                <div class="footer-wrapper">
                    <div class="widget-heading">
                        <h3>Newsletter</h3>
                    </div>
                    <div class="widget-list">
                        <p>Trade is Worlds leading classifieds platform that brings!</p>
                        <form action="{{ route('newsletter.store') }}" method="post">
                            <div class="subscribe_form">
                                @csrf
                                <input type="email" required class="form-control mb-3" name="email" id="newsletter_email"
                                       placeholder="Enter your email">
                                <input type="submit" id="submit" name="submit" value="Subscribe">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div><!-- row -->
    </div> <!-- container -->
</footer>
<!--
    ============  copyright   ============
-->
<div class="copyright-sec">
    <!-- container -->
    <div class="container">
        <div class="copyright-text text-center">
            <p>© 2021 bdflats.com All rights reserved</p>
        </div>
    </div><!-- container -->
</div>

<!--
    ============  fixed menu footer   ============
-->
@include('layouts.mobile-filter')
<div class="fixed-menu">
    <!-- container-fluid -->
    <div class="container-fluid">
        <div class="menu-list">
            <ul class="footer-menu-mobile">
                <li><a href="{{ route('web.home') }}"><i class="fa fa-home"></i><br/>Home</a></li>
                <li><a href="{{ route('web.property') }}?verified=1"><i class="fa fa-building"></i><br/>Properties</a></li>
                <li class="search_form"><div class="open_serch" data-target="#filterModal" data-toggle="modal"><a href="#"><i class="fa fa-search"></i></a></div></li>
                <li><a href="{{ route('contact-us') }}"><i class="fa fa-address-card"></i><br/>Contact</a></li>
                <li><a href="{{ route('my-account') }}"><i class="fa fa-user"></i><br/>My Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- container-fluid -->
</div>


<!--
    ============  scroll top btn   ============
-->
<div id="scroll"><i class="fa fa-angle-double-up"></i></div>
