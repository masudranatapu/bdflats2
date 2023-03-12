<!--
     ============ js files ============
  -->
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{asset('/assets/js/vendor/modernizr-3.11.2.min.js?v=0') }}"></script>
<script src="{{asset('/assets/js/bootstrap.bundle.js?v=0') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- <script src="{{asset('/assets/js/fastselect.standalone.js?v=0') }}"></script> -->
{{--  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>--}}
<script src="{{ asset('/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('/assets/js/owl.carousel.min.js?v=0') }}"></script>
<script src="{{ asset('/assets/js/hc-offcanvas-nav.js?ver=6.1.1') }}"></script>
<script src="{{ asset('/assets/js/plugins.js?v=0') }}"></script>
<script src="{{ asset('/assets/js/main.js?v=0') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
{!! Toastr::message() !!}
@yield('scripts')
<script>
    (function($) {
        //  sidebar menu
        var Nav = new hcOffcanvasNav('#main-nav', {
            disableAt: false,
            customToggle: '.toggle',
            levelSpacing: 40,
            levelTitles: false,
            levelTitleAsBack: true,
            labelClose: false,
        });

    })(jQuery);
</script>


