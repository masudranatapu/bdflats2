@extends('layouts.app')
@section('suggested-properties','active')
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

                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="account-details">

                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="#"><i class="fa fa-long-arrow-left"></i>Suggested Properties</a></h3>
                                </div>
                                <!-- product -->
                                @if(isset($data['properties']) && count($data['properties']))
                                    @foreach($data['properties'] as $property)
                                        @php
                                            $listing_variants = \App\Models\ListingVariants::where('F_LISTING_NO',$property->id)->get();
                                        @endphp
                                        <div class="property-product mb-4">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-4">
                                                    <div class="property-bx">
                                                        <a href="{{ route('web.property.details', $property->URL_SLUG) }}">
                                                            <img src="{{ defaultThumb($property->THUMB_PATH ?? '') }}" class="w-100" alt="{{ $property->TITLE }}"></a>
                                                    </div>
                                                </div>
                                                <div class="col-8 position-static">
                                                    <h3>TK {{ number_format($property->TOTAL_PRICE ?? 0, 2) }}
                                                        @if($property->IS_VERIFIED == 1)
                                                            <span class="float-right">Verified <i class="fa fa-check-square"></i></span>
                                                        @endif
                                                    </h3>

                                                    <h5 class="mt-0"><a href="{{ route('web.property.details', $property->URL_SLUG) }}">{{ $property->TITLE ?? '' }}</a></h5>
                                                    <h6>
                                                        {{ $property->BEDROOM . ' Bed, '}} {{$property->BATHROOM. ' Bath' }}
                                                        @if($listing_variants->count() > 1 )
                                                            <a href="javascript:void(0)" data-id="{{$property->id}}" class="moreVariantBtn">More </a>
                                                        @endif
                                                    </h6>

                                                    <a href="#" class="location"><i class="fa fa-map-marker"></i>{{ $property->AREA_NAME }}, {{ $property->CITY_NAME }}</a>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{$data['properties']->links()}}
                                    @else
                                    <p>Data Not Found Yet</p>
                                @endif
                            </div>
                        </div>

                        <div class="city-location">
                            <div class="modal fade" id="extra_variants" tabindex="-1" aria-labelledby="extra_variantsLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="extra_variantsLabel">More Variants</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="nav modalcategory flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <table class="table text-center table-striped" style="font-family: 'Montserrat-Medium';font-size: 14px">
                                                            <thead>
                                                            <tr>
                                                                <th>BED</th>
                                                                <th>BATH</th>
                                                                <th>PRICE</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="show_variant"></tbody>
                                                        </table>

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
    <script>
        $(".moreVariantBtn").on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "ajax-get-variants/" + id,
                method: 'GET',
                success: function (data) {
                    $("#show_variant").empty();
                    $("#extra_variants").modal('show');
                    $("#show_variant").append(data);
                }
            });
        });

        $(".close").on('click', function () {
            $("#extra_variants").modal('hide');
        });
    </script>
@endpush
