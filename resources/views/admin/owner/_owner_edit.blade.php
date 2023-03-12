<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('user_type', 'User Type *', ['class' => 'lable-title']) !!}
            <div class="controls">
                {!! Form::radio('user_type','2', old('user_type') ? $owner->USER_TYPE == old('user_type') : $owner->USER_TYPE == 2,[ 'id' => 'owner', 'tabIndex' => ++$tabIndex]) !!}
                {{ Form::label('owner','Owner') }}
                &emsp;
                {!! Form::radio('user_type','3', old('user_type') ? $owner->USER_TYPE == old('user_type') : $owner->USER_TYPE == 3,[ 'id' => 'builder', 'tabIndex' => ++$tabIndex]) !!}
                {{ Form::label('builder','Builder') }}
                &emsp;
                {!! Form::radio('user_type','4', old('user_type') ? $owner->USER_TYPE == old('user_type') : $owner->USER_TYPE == 4,[ 'id' => 'agency', 'tabIndex' => ++$tabIndex]) !!}
                {{ Form::label('agency','Agency') }}

                {!! $errors->first('user_type', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Name *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('name', old('name', $owner->NAME), ['class' => 'form-control', 'placeholder' => 'Name', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Email *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::email('email', old('email', $owner->EMAIL), ['class' => 'form-control', 'placeholder' => 'Email', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('mobile_no', 'Phone *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::tel('mobile_no', old('mobile_no', $owner->MOBILE_NO), ['class' => 'form-control', 'placeholder' => 'Phone', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('mobile_no', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('listing_limit', 'Listing Limit *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::number('listing_limit', old('listing_limit', $owner->LISTING_LIMIT), ['class' => 'form-control', 'placeholder' => 'Listing Limit', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('listing_limit', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('working_days', 'Working Days *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::select('working_days[]', $days ?? [], old('working_days', json_decode($owner->info->WORKING_DAYS ?? '')), ['multiple', 'class' => 'form-control select2', 'id' => 'working_days', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('working_days', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('open_time', 'Open Time *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('open_time', old('open_time', $owner->info->SHOP_OPEN_TIME ?? ''), [ 'class' => 'form-control time', 'id' => 'open_time', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('open_time', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('close_time', 'Close Time *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('close_time', old('close_time', $owner->info->SHOP_CLOSE_TIME ?? ''), [ 'class' => 'form-control time', 'id' => 'close_time', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('close_time', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('auto_payment_renew', 'Auto Payment Renew *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::select('auto_payment_renew', [1 => 'Active', 0 => 'Inactive'], old('auto_payment_renew', $owner->PAYMENT_AUTO_RENEW), ['class' => 'form-control', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('auto_payment_renew', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('feature', 'Is Feature *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::select('feature', [1 => 'Feature', 0 => 'General'], old('feature', $owner->IS_FEATURE), ['class' => 'form-control', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('feature', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('images','User Image (300x300) <span>*</span>', ['class' => 'label-title'], false) !!}
            <div class="controls">
                @if($owner->PROFILE_PIC_URL)
                    <img src="{{ asset($owner->PROFILE_PIC_URL) }}" alt="" style="max-width: 200px;max-height: 120px">
                @endif
                <div id="imageFile" style="padding-top: .5rem;"></div>
            </div>
            {!! $errors->first('images', '<label class="help-block text-danger">:message</label>') !!}
            {!! $errors->first('images.0', '<label class="help-block text-danger">:message</label>') !!}
        </div>
    </div>
</div>
