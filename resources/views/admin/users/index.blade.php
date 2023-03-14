@extends('admin.layouts.master')

@section('admin-user', 'active')
@section('title') Admin| User @endsection

@push('style')
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Admin user') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Admin user') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">
                                    {{ __('Admin user list') }}
                                    <span class="float-right">

                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('email') }}</th>
                                            <th>{{ __('status') }}</th>
                                            <th>{{ __('roles') }}</th>
                                            @if (Auth::user()->can('admin.user.edit') || Auth::user()->can('admin.user.delete'))
                                                <th width="10%">{{ __('action') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $row)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>
                                                    @if($row->status == 1)
                                                        <span class="badge bg-success">Actve</span>
                                                    @else
                                                        <span class="badge bg-info">Inactve</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($row->roles as $role)
                                                        <span class="badge badge-primary">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if (Auth::user()->can('admin.user.edit'))
                                                        <a href="{{ route('admin.user.edit', $row->id) }}"
                                                            class="btn btn-sm btn-success">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                    @endif
                                                    {{-- @if (Auth::user()->can('admin.user.destroy'))
                                                        <a href="{{ route('admin.user.destroy', [$row->id]) }}"
                                                            class="btn btn-sm btn-danger "
                                                            onclick="return confirm('Are you sure you want to delete?')"
                                                            title="DELETE"><i class="la la-trash"></i>
                                                            {{ __('Delete') }}</a>
                                                    @endif --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    data not found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
