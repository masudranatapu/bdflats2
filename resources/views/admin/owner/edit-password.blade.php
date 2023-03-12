@extends('admin.layout.master')

@section('Property Owner','open')
@section('owner_list','active')

@section('title') Owner | Update @endsection
@section('page-name') Update Owner Password @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Update Owner</li>
@endsection


@section('content')
<div class="row">
    <div class="col-6">


<div class="card card-success min-height">
    <div class="card-header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">
            {!! Form::open([ 'route' => ['admin.owner.password.update', $data['row']->PK_NO ], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('password', 'Password *', false) !!}
                    <div class="form-group">
                        <div class="controls">
                            {!! Form::password('password', [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'placeholder' => 'Password', 'tabIndex' => 1]) !!}
                            {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('admin.owner.list')}}">
                        <button type="button" class="btn btn-warning mr-1">
                            <i class="ft-x"></i> Cancel
                        </button>
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
    </div>
    </div>

@endsection


