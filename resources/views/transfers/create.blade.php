<!-- resources/views/transfers/create.blade.php -->

@extends('layouts.master')

@section('content')
<br>
<br>
<br>
<div class="card mt-4">
    <div class="card-header">{{ __('transfer-create.page_title') }}</div>
    <div class="card-body">
        {{-- Add transfer form --}}
        <form method="post" action="{{ route('transfers.store') }}">
            @csrf
            @if (Auth::user() && Auth::user()->HisOffice)
                <input type="hidden" name="sender_id" value="{{ Auth::user()->HisOffice->id }}">
                <div class="mb-3">
                    <label for="receiver_id" class="form-label">{{ __('transfer-create.receiver') }}</label>
                    <select class="form-select" id="receiver_id" name="receiver_id" required>
                        @foreach ($offices as $otherOffice)
                            {{-- Avoid showing the same office as the receiver and ensure it's not the sender's office --}}
                            @if (Auth::user() && Auth::user()->HisOffice && $otherOffice->id !== Auth::user()->HisOffice->id)
                                <option value="{{ $otherOffice->id }}">{{ $otherOffice->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="person_receiving" class="form-label">{{ __('transfer-create.person_receiving') }}</label>
                    <input type="text" class="form-control" id="person_receiving" name="person_receiving" required>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">{{ __('transfer-create.amount') }}</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <div class="mb-3">
                    <label for="transfer_date" class="form-label">{{ __('transfer-create.transfer_date') }}</label>
                    <input type="text" class="form-control" id="transfer_date" name="transfer_date" value="{{ now()->timezone('Asia/Riyadh')->format('Y-m-d H:i:s') }}" readonly>
                </div>

                <button type="submit" class="btn btn-success">{{ __('transfer-create.submit_button') }}</button>
            @else
                <!-- You can specify appropriate behavior here if there is no office -->
                <p>{{ __('transfer-create.no_office_found') }}</p>
            @endif
        </form>
    </div>
</div>
@endsection
