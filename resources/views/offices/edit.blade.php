<!-- resources/views/offices/edit.blade.php -->
@extends('layouts.master')

@section('content')
<br>
<br>
<br>
<br>
    <div class="container" dir="rtl">
        <h2>{{ __('office-edit.edit_office_data') }}</h2>
        <form method="post" action="{{ route('offices.update', $office->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('office-edit.name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $office->name }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">{{ __('office-edit.address') }}</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $office->address }}" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">{{ __('office-edit.country') }}</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ $office->country }}" required>
            </div>
            <div class="mb-3">
                <label for="current_balance" class="form-label">{{ __('office-edit.current_balance') }}</label>
                <input type="number" class="form-control" id="current_balance" name="current_balance" value="{{ $office->current_balance }}" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('office-edit.save_changes') }}</button>
        </form>
    </div>
@endsection
