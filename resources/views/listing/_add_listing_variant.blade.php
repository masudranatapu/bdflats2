<?php
$bed_room = Config::get('static_array.bed_room') ?? [];
$bath_room = Config::get('static_array.bath_room') ?? [];
$bath_room = Config::get('static_array.bath_room') ?? [];
$balcony = Config::get('static_array.balcony') ?? [];
$car_parking = Config::get('static_array.parking') ?? [];
?>
<div class="row no-gutters form-group size_child" style="position: relative">
    <span class="floating_labels">Type-B</span>
    <div class="col-6 col-md-4 size_div">
        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::number('size[]', old('size[]'), ['id'=>'size', 'class' => 'form-control',  'placeholder' => 'Size in sft','data-validation-required-message' => 'This field is required']) !!}
                <span class="size_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>

    @if( in_array( $request->property_type,[1,8] ) )
    <div class="col-6 col-md-4 bedroom_div">
        <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('bedroom[]', $bed_room, old('bedroom[]') ?? null, array('class'=>'form-control', 'placeholder'=>'Select bedroom','data-validation-required-message' => 'This field is required')) !!}
                <span class="bedroom_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    @endif

    @if( in_array( $request->property_type,[1,8] ) )
    <div class="col-6 col-md-4 bathroom_div">
        <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('bathroom[]', $bath_room, old('bathroom'), array('class'=>'form-control', 'placeholder'=>'Select bathroom','data-validation-required-message' => 'This field is required')) !!}
                <span class="bathroom_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    @endif

    @if( in_array( $request->property_type,[1,8] ) )
    <div class="col-6 col-md-4 balcony_div">
        <div class="form-group mb-0 {!! $errors->has('balcony') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('balcony[]', $balcony, old('balcony[]'), array('class'=>'form-control', 'placeholder'=>'Select balcony')) !!}
                <span class="balcony_placeholder advertis-label"
                      style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('balcony', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    @endif

    @if( in_array( $request->property_type,[1,8] ) )
    <div class="col-6 col-md-4 price_div">
        <div class="form-group mb-0 {!! $errors->has('car_parking') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('car_parking[]',$car_parking, old('car_parking[]'), ['class' => 'form-control',  'placeholder' => 'Select parking','data-validation-required-message' => 'This field is required']) !!}
                <span class="price_placeholder advertis-label"
                      style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('car_parking', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    @endif

    @if( in_array( $request->property_type,[1,8] ) )
    <div class="col-6 col-md-4 price_div">
        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::number('price[]', old('price[]'), ['class' => 'form-control',  'placeholder' => 'Price per sqft','data-validation-required-message' => 'This field is required']) !!}
                <span class="price_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    @endif
    {{-- <div class="col-6 col-md-2 price_div">
        <div class="form-group mb-0 {!! $errors->has('land_area') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::text('land_area[]', old('land_area[]'), ['class' => 'form-control',  'placeholder' => 'Land Area','data-validation-required-message' => 'This field is required']) !!}
                <span class="price_placeholder advertis-label"
                      style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('land_area', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div> --}}
    <button class="del_btn btn btn-danger btn-xs">✕</button>
</div>

