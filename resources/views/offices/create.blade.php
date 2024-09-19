<!-- resources/views/offices/create.blade.php -->
@extends('layouts.master')

@section('content')
<br>
<br>
<br>
    <div class="container">
        <h2>{{ __('office-create.create_new_office') }}</h2>
        <form method="post" action="{{ route('offices.store') }}">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">{{ __('office-create.owner') }}</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('office-create.office_name') }}</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">{{ __('office-create.address') }}</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">{{ __('office-create.country') }}</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="mb-3">
                <label for="current_balance" class="form-label">{{ __('office-create.current_balance') }}</label>
                <input type="number" class="form-control" id="current_balance" name="current_balance" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('office-create.create_office') }}</button>
        </form>
    </div>
@endsection
