<!-- resources/views/offices/show.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container" dir="rtl">
    @if (session('danger'))
    <div class="alert alert-danger">
        <p style="font-weight: bold">{{ __('office-show.danger_alert') }}</p>
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        <p style="font-weight: bold">{{ __('office-show.success_alert') }}</p>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="profile-card mt-5 p-4 rounded">
                <div class="profile-header text-center">
                    <i class="bi bi-building fs-1 text-primary mb-3"></i>
                    <h2 class="mt-3">{{ __('office-show.profile_details') }}</h2>
                    <p><strong>{{ __('office-show.owner') }}: </strong>{{ $office->HisOwner->name }}</p>
                    <p><strong>{{ __('office-show.office_name') }}: </strong>{{ $office->name }}</p>
                    <p><strong>{{ __('office-show.address') }}: </strong>{{ $office->address }}</p>
                    <p><strong>{{ __('office-show.country') }}: </strong>{{ $office->country }}</p>
                    <p><strong>{{ __('office-show.current_balance') }}: </strong>{{ $office->current_balance }}</p>
                </div>
                <hr>
                <div class="profile-details">
                    <div class="mt-4">
                        @can('transfer-office')
                        <a href="{{ route('offices.transfers', $office->id) }}" class="btn btn-info btn-sm mr-2">{{ __('office-show.transfer_office') }}</a>
                        @endcan

                        @can('transfer-create')
                        <a href="{{ route('transfers.create') }}" class="btn btn-info btn-sm mr-2">{{ __('office-show.create_transfer') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
