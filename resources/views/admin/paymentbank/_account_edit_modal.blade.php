<!--Edit Account modal-->
<div class="modal fade text-left" id="EditAccountname" tabindex="-1" role="dialog" aria-labelledby="brand_name" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="source_name"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                {!! Form::open(['method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate' , 'id' => 'bank_update_frm' ]) !!}
                    @csrf

                {!! Form::hidden('name', null, [ 'class' => 'form-control mb-1 source_id', 'data-validation-required-message' => 'This field is required' ]) !!}

                <div class="modal-body">
                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                        <label>{{trans('form.name')}}<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::text('bank_name', null, [ 'class' => 'form-control mb-1 bank_name', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Account Name', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-primary btn-sm submit-btn" value="Update">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
<!--End Account modal  html-->


<!--Edit Account Method html-->
<div class="modal fade text-left" id="addEditMethodModal" tabindex="-1" role="dialog" aria-labelledby="method" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="source_name"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                {!! Form::open(['method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate' , 'id' => 'method_add_edit_frm' ]) !!}
                    @csrf

                {!! Form::hidden('name', null, [ 'class' => 'form-control mb-1 source_id', 'data-validation-required-message' => 'This field is required' ]) !!}

                <div class="modal-body">
                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                        <label>{{trans('form.method')}}<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::text('method', null, [ 'class' => 'form-control mb-1 method_name', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Payment Method', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('code', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-primary btn-sm submit-btn" value="Update">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
<!--End Edit Account Method  html-->

<!--Edit Account source html-->
<div class="modal fade text-left" id="addEditSourceModal" tabindex="-1" role="dialog" aria-labelledby="source" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="source_name"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                {!! Form::open(['method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate' , 'id' => 'source_add_edit_frm' ]) !!}
                    @csrf

                {!! Form::hidden('name', null, [ 'class' => 'form-control mb-1 source_id', 'data-validation-required-message' => 'This field is required' ]) !!}

                <div class="modal-body">
                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                        <label>{{trans('form.accountSource')}}<span class="text-danger">*</span></label>
                        <div class="controls">
                            {!! Form::text('name', null, [ 'class' => 'form-control mb-1 source_name', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Payment Source', 'tabindex' => 1 ]) !!}
                            {!! $errors->first('code', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary btn-sm" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-primary btn-sm submit-btn" value="Update">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
<!--End Edit Account Method  html-->


