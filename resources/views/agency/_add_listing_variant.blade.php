<?php
$bed_room = Config::get('static_array.bed_room') ?? [];
$bath_room = Config::get('static_array.bath_room') ?? [];
?>
<div class="row no-gutters form-group size_child" style="position: relative">
    <div class="col-6 col-md-3 size_div">
        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::number('size[]', old('size[]'), ['id'=>'size', 'class' => 'form-control',  'placeholder' => 'Size in sft','data-validation-required-message' => 'This field is required']) !!}
                <span class="size_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3 bedroom_div" style="{{ $request->property_type != 1 ? 'display:none' : '' }}">
        <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('bedroom[]', $bed_room, old('bedroom[]') ?? null, array('class'=>'form-control', 'placeholder'=>'Bedroom','data-validation-required-message' => 'This field is required')) !!}
                <span class="bedroom_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3 bathroom_div" style="{{ $request->property_type != 1 ? 'display:none' : '' }}">
        <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('bathroom[]', $bath_room, old('bathroom'), array('class'=>'form-control', 'placeholder'=>'Bathroom','data-validation-required-message' => 'This field is required')) !!}
                <span class="bathroom_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3 price_div">
        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::number('price[]', old('price[]'), ['class' => 'form-control',  'placeholder' => 'Price','data-validation-required-message' => 'This field is required']) !!}
                <span class="price_placeholder advertis-label" style="opacity: 0.6;font-size: 12px"></span>
                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <button class="del_btn btn btn-danger btn-xs">✕</button>
</div>

