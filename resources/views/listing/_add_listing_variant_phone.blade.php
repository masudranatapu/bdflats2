<div class="row form-group size_child_phn">
    {{ Form::label('mobile','Mobile:',['class' => 'col-sm-4 advertis-label']) }}
    <div class="col-sm-7">
        <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
            <div class="controls">
                <input id="mobile" class="form-control" placeholder="Property Owner Number" data-validation-required-message="This field is required" name="mobile[]" type="number">
                {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-sm-1">
        <button class="del_btn_phn btn btn-danger btn-xs">✕</button>
    </div>
</div>
