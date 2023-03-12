@extends('layouts.app')
@section('buy-leads','active')
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
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="account-details">

                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3>
                                        <a href="{{ route('buy-leads') }}"><i class="fa fa-long-arrow-left"></i>Buy Leads</a>
                                        <a href="{{ route('owner-leads') }}" class="link" style="float: right">Leads</a>
                                    </h3>
                                </div>
                                @if($data['listing']->count()>0)
                                    @foreach($data['listing'] as $item)
                                        <div class="leads-wrapper mb-2">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-3">
                                                    <div class="leads-bx text-center">
                                                        <a href="{{route('buy-leads-details',$item->id)}}"><img
                                                                src="{{ $item->getRequirements->getUser->PROFILE_PIC_URL ? asset($item->getRequirements->getUser->PROFILE_PIC_URL) : asset('assets/img/default_avatar.jpg') }}"
                                                                alt="image"></a>
                                                    </div>
                                                </div>
                                                <div class="col-9 position-static">
                                                    <div class="leads-info">
                                                        <h5 class="mt-0">{{$item->getRequirements->getUser->NAME}} @if($item->LEAD_TYPE == 0)
                                                                <span class="float-right">100%<br/>Matched</span>
                                                            @else
                                                                <span class="float-right text-danger">Force <br> Lead</span>
                                                            @endif</h5>
                                                        <h4><span>LID {{$item->getRequirements->getUser->CODE}}</span></h4>
                                                        <h6>{{date('d M, Y',strtotime($item->CREATED_AT))}} <span><a href="{{route('buy-leads-details',$item->id)}}"
                                                                                                                     class="float-right"><i class="fa fa-eye"></i>Details</a></span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{$data['listing']->links()}}
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
