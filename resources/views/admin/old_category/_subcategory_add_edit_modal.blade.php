<!--Edit Product Subcategory  html-->
<div class="modal fade text-left" id="addEditSubcategory" tabindex="-1" role="dialog" aria-labelledby="category_name" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="category_name"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                {!! Form::open(['method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate' , 'id' => 'subcat_add_edit_frm' ]) !!}
                    @csrf

                {!! Form::hidden('category', null, [ 'class' => 'form-control mb-1 category_id', 'data-validation-required-message' => 'This field is required' ]) !!}

                <div class="modal-body">
                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                        <label>{{trans('form.name')}}<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::text('name', null, [ 'class' => 'form-control mb-1 subcat_name', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter subcategory name', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal" value="Close" title="Close">
                    <input type="submit" class="btn btn-primary btn-sm submit-btn" value="Update" title="Update">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!--End Edit Product Subcategory  html-->


<!--Edit Product Subcategory  html-->
<div class="modal fade text-left" id="addEditHScode" tabindex="-1" role="dialog" aria-labelledby="subcat_name" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="subcat_name"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                {!! Form::open(['method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate' , 'id' => 'hscode_add_edit_frm' ]) !!}
                    @csrf

                {!! Form::hidden('subcategory', null, [ 'class' => 'form-control mb-1 subcat_id', 'data-validation-required-message' => 'This field is required' ]) !!}

                <div class="modal-body">
                    <div class="form-group {!! $errors->has('code') ? 'error' : '' !!}">
                        <label>{{trans('form.code')}}<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::text('code', null, [ 'class' => 'form-control mb-1 hscode', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter HS code', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('code', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                    <div class="form-group {!! $errors->has('narration') ? 'error' : '' !!}">
                        <label>{{trans('form.narration')}}<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::text('narration', null, [ 'class' => 'form-control mb-1 narration',  'placeholder' => 'Enter short description for this code', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('narration', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal" value="Close" title="Close">
                    <input type="submit" class="btn btn-primary btn-sm submit-btn" value="Update" title="Save">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!--End Edit Product Subcategory  html-->




