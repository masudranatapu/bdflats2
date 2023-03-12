<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('user_type', 'User Type *', ['class' => 'lable-title']) !!}
            <div class="controls">
                {!! Form::radio('user_type','2', old('user_type') ? $owner->user_type == old('user_type') : $owner->user_type == 2,[ 'id' => 'owner', 'tabIndex' => ++$tabIndex]) !!}
                {{ Form::label('owner','Owner') }}
                &emsp;
                {!! Form::radio('user_type','3', old('user_type') ? $owner->user_type == old('user_type') : $owner->user_type == 3,[ 'id' => 'builder', 'tabIndex' => ++$tabIndex]) !!}
                {{ Form::label('builder','Builder') }}
                &emsp;
                {!! Form::radio('user_type','4', old('user_type') ? $owner->user_type == old('user_type') : $owner->user_type == 4,[ 'id' => 'agency', 'tabIndex' => ++$tabIndex]) !!}
                {{ Form::label('agency','Agency') }}

                {!! $errors->first('user_type', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('company_name', 'Company Name *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('company_name', old('company_name', $owner->name), ['class' => 'form-control', 'placeholder' => 'Company Name', 'data-validation-required-message' => 'This field is required', 'tabIndex' => ++$tabIndex]) !!}
                {!! $errors->first('company_name', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('contact_person_name', 'Contact Person Name *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('contact_person_name', old('contact_person_name', $owner->contact_per_name), ['class' => 'form-control', 'placeholder' => 'Contact Person Name', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('contact_person_name', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('designation', 'Designation *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('designation', old('designation', $owner->designation), ['class' => 'form-control', 'placeholder' => 'Designation', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('designation', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('office_address', 'Office Address *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('office_address', old('office_address', $owner->address), ['class' => 'form-control', 'placeholder' => 'Office Address', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('office_address', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Email *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::email('email', old('email', $owner->email), ['class' => 'form-control', 'placeholder' => 'Email', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('mobile_no', 'Phone *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::tel('mobile_no', old('mobile_no', $owner->mobile_no), ['class' => 'form-control', 'placeholder' => 'Phone', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('mobile_no', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-1">
        <div class="form-group">
            {!! Form::label('about_company', 'About Company *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::textarea('about_company', old('about_company', $owner->info->about_company ?? ''), ['class' => 'form-control', 'placeholder' => 'About Company', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'The About Company field is required']) !!}
                {!! $errors->first('about_company', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('images','Logo (300x300) <span>*</span>', ['class' => 'label-title'], false) !!}
            <div class="controls">
                @if($owner->info && $owner->info->logo)
                    <img src="{{ asset($owner->info->logo) }}" alt="" style="max-width: 200px;max-height: 120px">
                @endif
                <div id="logoFile" style="padding-top: .5rem;"></div>
            </div>
            {!! $errors->first('images', '<label class="help-block text-danger">:message</label>') !!}
            {!! $errors->first('images.0', '<label class="help-block text-danger">:message</label>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('images','Banner (1100x350) <span>*</span>', ['class' => 'label-title'], false) !!}
            <div class="controls">
                @if($owner->info && $owner->info->banner)
                    <img src="{{ asset($owner->info->banner) }}" alt="" style="max-width: 200px;max-height: 120px">
                @endif
                <div id="bannerFile" style="padding-top: .5rem;"></div>
            </div>
            {!! $errors->first('images', '<label class="help-block text-danger">:message</label>') !!}
            {!! $errors->first('images.1', '<label class="help-block text-danger">:message</label>') !!}
        </div>
    </div>
    <div class="col-md-12">
        <h2>SEO</h2>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('meta_title', 'Meta Title *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::tel('meta_title', old('meta_title', $owner->info->meta_title ?? ''), ['class' => 'form-control', 'placeholder' => 'Meta Title', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('meta_title', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('site_url', 'Site URL *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::tel('site_url', old('site_url', $owner->info->site_url ?? ''), ['class' => 'form-control', 'placeholder' => 'Site URL', 'tabIndex' => ++$tabIndex]) !!}
                {!! $errors->first('site_url', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('listing_limit', 'Listing Limit *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::number('listing_limit', old('listing_limit', $owner->listing_limit), ['class' => 'form-control', 'placeholder' => 'Listing Limit', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('listing_limit', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('feature', 'Is Feature *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::select('feature', [1 => 'Feature', 0 => 'General'], old('feature', $owner->is_feature), ['class' => 'form-control', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('feature', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('working_days', 'Working Days *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::select('working_days[]', $days ?? [], old('working_days', json_decode($owner->info->working_days ?? '')), ['multiple', 'class' => 'form-control select2', 'id' => 'working_days', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('working_days', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('open_time', 'Open Time *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('open_time', old('open_time', $owner->info->shop_open_time ?? ''), [ 'class' => 'form-control time', 'id' => 'open_time', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('open_time', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('close_time', 'Close Time *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::text('close_time', old('close_time', $owner->info->shop_close_time ?? ''), [ 'class' => 'form-control time', 'id' => 'close_time', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('close_time', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('auto_payment_renew', 'Auto Payment Renew *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::select('auto_payment_renew', [1 => 'Active', 0 => 'Inactive'], old('auto_payment_renew', $owner->payment_auto_renew), ['class' => 'form-control', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('auto_payment_renew', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('meta_description', 'Meta Description *', ['class' => 'label-title'], false) !!}
            <div class="controls">
                {!! Form::textarea('meta_description', old('meta_description', $owner->info->meta_description ?? ''), ['class' => 'form-control', 'placeholder' => 'Meta Description', 'tabIndex' => ++$tabIndex, 'data-validation-required-message' => 'This field is required']) !!}
                {!! $errors->first('meta_description', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
</div>
