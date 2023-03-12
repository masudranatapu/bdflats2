@extends('layouts.app')
@section('browsed-properties','active')
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
                                    <h3><a href="{{ route('browsed-properties') }}"><i
                                                class="fa fa-long-arrow-left"></i>Browsed Properties</a></h3>
                                </div>
                                <!-- product -->
                                @if(isset($data['browsedProperties']) && count($data['browsedProperties']))
                                    @foreach($data['browsedProperties'] as $property)

                                        <div class="property-product mb-4">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-4">
                                                    <div class="property-bx">
                                                        <a href="{{ route('web.property.details', $property->URL_SLUG) }}"><img src="{{ defaultThumb($property->getDefaultThumb->THUMB_PATH ?? null) }}" class="w-100" alt="image"></a>
                                                    </div>
                                                </div>
                                                <div class="col-8 position-static">
                                                    <h3>TK {{ number_format($property->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                                    <h5 class="mt-0"><a
                                                            href="{{ route('web.property.details', $property->URL_SLUG) }}">{{ $property->TITLE ?? '' }}</a></h5>
                                                    <h6>{{ $property->getListingVariant->BEDROOM ? $property->getListingVariant->BEDROOM . ' Bed, ' : '' }}{{ $property->getListingVariant->BATHROOM ? $property->getListingVariant->BATHROOM . ' Bath' : '' }}</h6>
                                                    <a href="#" class="location"><i class="fa fa-map-marker"> {{ $property->AREA_NAME }}, {{ $property->CITY_NAME }}</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            {{$data['browsedProperties']->links()}}
                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
