@extends('layouts.master')

@section('content')
<br>
<br>
<br>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ __('show-user.show_user') }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}">{{ __('show-user.back') }}</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('show-user.name') }}:</strong>
            {{ $users->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('show-user.email') }}:</strong>
            {{ $users->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('show-user.roles') }}:</strong>
            <label class="badge badge-success" style="color: black;">{{ $users->roles_name }}</label>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('show-user.office_name') }}:</strong>
            @if (!empty(optional($users->HisOffice)->name))
                <label class="badge badge-success" style="color: black;">{{ $users->HisOffice->name }}</label>
            @else
                <a href="{{ route('offices.create') }}">{{ __('show-user.create_office') }}</a>
            @endif
        </div>
    </div>
</div>
@endsection
