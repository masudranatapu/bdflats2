@extends('layouts.app')

@push('custom_css')
<link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<style type="text/css">
.read-more-show,.read-more-hide{cursor:pointer;color: #00a651;font-weight: bold;}.hide_content{display: none;}
</style>
@endpush
@section('content')
<?php 
	$rows = $data['my_ads'] ?? null;
    $shop_info  = $data['shop_data'] ?? null ;
    $banner_path = asset('/uploads/shop/banner/'.Auth::user()->id.'/'.$shop_info->banner);
?>

<!-- shop-product  -->
<div class="shop-product">
    <div class="container">
        <div class="shop-product-details pt-3 pb-4">
            <div class="shop-bx">
                @if($shop_info->name !=null)
                <img src="{{$banner_path}}" alt="">
                @else
                <img src="{{asset('assets/images/shop-default.jpg')}}" alt="">
                @endif
                <div class="prdut-name">
                    <h3>{{$shop_info->name}}</h3>
                </div>
            </div>
        </div>
        <div class="row mb-5 shop-description">
            <div class="col-lg-8">
                <div class="product-content pb-4">
                    <h2>{{$shop_info->name}}</h2>
                    @if(strlen($shop_info->description) > 500)
                    {{substr($shop_info->description,0,500)}}
                    <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                    <span class="read-more-content"> {{substr($shop_info->description,500,strlen($shop_info->description))}} 
                    <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                    @else
                    {{$shop_info->description}}
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-contact">
                    <div class="info-list">
                        <div class="info-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="info-artile">
                            <p>{{$shop_info->open_time}}</p>
                        </div>
                    </div>
                    <div class="info-list">
                        <div class="info-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="info-artile">
                            <p>{{$shop_info->address}}</p>
                        </div>
                    </div>
                    <div class="info-list">
                        <div class="info-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="info-artile">
                            <p>{{$shop_info->contact}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-gallery">
            <div class="product-show text-center">
                <h5>Apon Mobile Shop এর বিজ্ঞাপন সমূহ (1-25 এর 47)</h5>
            </div>
            <hr>
            <div class="product-show">
                <h5>Latest Promoted Ads List</h5>
              </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- ad-item -->
                    <div class="ad-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-lg-4">
                            <div class="item-image">
                                <a href="#"><img src="{{asset('assets/images/listing/1.jpg')}}" alt="Image" class="img-fluid"></a>
                            </div><!-- item-image -->
                        </div>
                        
                        <!-- rending-text -->
                        <div class="item-info col-lg-8">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">$800.00 <span class="topadtag">top</span></h3>
                                <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                <div class="item-cat">
                                    <span><a href="#">Electronics & Gedgets</a></span> /
                                    <span><a href="#">Tv & Video</a></span>
                                </div>                                      
                            </div><!-- ad-info -->
                            
                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
                                </div>                                      
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                    <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>                                            
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->
                </div>
                <div class="col-lg-6">
                    <!-- ad-item -->
                    <div class="ad-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-lg-4">
                            <div class="item-image">
                                <a href="details.html"><img src="{{asset('assets/images/listing/1.jpg')}}" alt="Image" class="img-fluid"></a>
                                <span class="featured-ad">Featured</span>
                            </div><!-- item-image -->
                        </div>
                        
                        <!-- rending-text -->
                        <div class="item-info col-lg-8">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">$800.00</h3>
                                <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                <div class="item-cat">
                                    <span><a href="#">Electronics & Gedgets</a></span> /
                                    <span><a href="#">Tv & Video</a></span>
                                </div>                                      
                            </div><!-- ad-info -->
                            
                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
                                </div>                                      
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                    <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>                                            
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->
                </div>
                <div class="product-show pb-1 col-12">
                <h5>General Ads List</h5>
              </div>
                <!-- featured -->
                @foreach($rows as $val)
                <div class="col-md-6 col-lg-3">
                    <!-- featured -->
                    <div class="featured">
                        <div class="featured-image">
                            <a href="details.html"><img src="{{asset('assets/images/listing/1.jpg')}}" alt="" class="img-fluid"></a>
                            <a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a>
                        </div>
                        
                        <!-- ad-info -->
                        <div class="ad-info">
                            <h3 class="item-price">Tk {{$val->price}}</h3>
                            <h4 class="item-title"><a href="#">{{$val->ad_title}}</a></h4>
                            <div class="item-cat">
                                <span><a href="#">{{$val->main_category}}</a></span> 
                            </div>
                        </div><!-- ad-info -->
                        
                        <!-- ad-meta -->
                        <div class="ad-meta">
                            <div class="meta-content">
                                <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                            </div>                                  
                            <!-- item-info-right -->
                            <div class="user-option pull-right">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>                                           
                            </div><!-- item-info-right -->
                        </div><!-- ad-meta -->
                    </div><!-- featured -->
                </div><!-- featured -->
                @endforeach
            </div>
        </div>
        <!-- pagination  -->
			<div class="text-center pb-5">
				<ul class="pagination ">
					<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
					<li><a href="#">1</a></li>
					<li class="active"><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a>...</a></li>
					<li><a href="#">10</a></li>
					<li><a href="#">20</a></li>
					<li><a href="#">30</a></li>
					<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
				</ul>
			</div><!-- pagination  -->	
		</div><!-- featureds -->
    </div>



@endsection

@push('custom_js')

<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script type="text/javascript">
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    $('.read-more-content').addClass('hide_content')
    $('.read-more-show, .read-more-hide').removeClass('hide_content')

    // Set up the toggle effect:
    $('.read-more-show').on('click', function(e) {
      $(this).next('.read-more-content').removeClass('hide_content');
      $(this).addClass('hide_content');
      e.preventDefault();
    });

    // Changes contributed by @diego-rzg
    $('.read-more-hide').on('click', function(e) {
      var p = $(this).parent('.read-more-content');
      p.addClass('hide_content');
      p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
      e.preventDefault();
    });
</script>
@endpush
