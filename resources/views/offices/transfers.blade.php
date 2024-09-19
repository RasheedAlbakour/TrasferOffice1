{{-- views/offices/transfers.blade.php --}}
@extends('layouts.master')

@section('content')
    <style>
        .table-hover tbody tr:hover {
            background-color: #f5f5f5; /* لون التمييز عند التمرير على السطر */
            filter: brightness(1.2); /* زيادة سطوع السطر عند التمرير عليه */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa; /* لون خلفية السطور الفردية */
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e9ecef; /* لون خلفية السطور الزوجية */
        }

        .table th, .table td {
            text-align: center; /* محاذاة النص في الخانات إلى الوسط */
        }

        .btn-action {
            margin: 2px; /* هامش بسيط لتوسيع الأزرار */
        }
    </style>

    <div class="container" dir="rtl">
        <h2>{{ __('office-transfers.page_title', ['officeName' => $office->name]) }}</h2>

        <div class="mt-4">
            <h3>{{ __('office-transfers.sent_transfers') }}</h3>

            <table class="table table-bordered table-hover table-striped">
                <div class="mb-3">
                    <a href="{{ route('export.sent-transfers', ['office' => $office->id]) }}" class="btn btn-success">{{ __('office-transfers.export_sent_transfers') }}</a>
                </div>
                <thead style="background-color: #3366CC; color: white;">
                    <tr>
                        <th>{{ __('office-transfers.transfer_id') }}</th>
                        <th>{{ __('office-transfers.receiver_office') }}</th>
                        <th>{{ __('office-transfers.receiver_owner') }}</th>
                        <th>{{ __('office-transfers.person_receiving') }}</th>
                        <th>{{ __('office-transfers.amount') }}</th>
                        <th>{{ __('office-transfers.transfer_date') }}</th>
                        <th>{{ __('office-transfers.delivery_status') }}</th>
                        <th>{{ __('office-transfers.transfer_code') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($office->transfersFrom as $sentTransfer)
                        <tr>
                            <td>{{ $sentTransfer->id }}</td>
                            <td>{{ $sentTransfer->receiver->name }}</td>
                            <td>{{ $sentTransfer->receiver->HisOwner->name }}</td>
                            <td>{{ $sentTransfer->person_receiving }}</td>
                            <td>{{ $sentTransfer->amount }}</td>
                            <td>{{ $sentTransfer->transfer_date }}</td>
                            <td>{{ $sentTransfer->status === 'received' ? __('office-transfers.delivered') : __('office-transfers.pending') }}</td>
                            <td>{{ $sentTransfer->transfer_code }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">{{ __('office-transfers.no_sent_transfers') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <h3>{{ __('office-transfers.received_transfers') }}</h3>
            <table class="table table-bordered table-hover table-striped">
                <thead style="background-color: #3366CC; color: white;">
                    <div class="mb-3">
                        <a href="{{ route('export.received-transfers', ['office' => $office->id]) }}" class="btn btn-success">{{ __('office-transfers.export_received_transfers') }}</a>
                    </div>
                    <tr>
                        <th>{{ __('office-transfers.transfer_id') }}</th>
                        <th>{{ __('office-transfers.receiver_office') }}</th>
                        <th>{{ __('office-transfers.receiver_owner') }}</th>
                        <th>{{ __('office-transfers.person_receiving') }}</th>
                        <th>{{ __('office-transfers.amount') }}</th>
                        <th>{{ __('office-transfers.transfer_date') }}</th>
                        <th colspan="2">{{ __('office-transfers.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($office->transfersTo as $receivedTransfer)
                        <tr>
                            <td>{{ $receivedTransfer->id }}</td>
                            <td>{{ $receivedTransfer->sender->name }}</td>
                            <td>{{ $receivedTransfer->sender->HisOwner->name }}</td>
                            <td>{{ $receivedTransfer->person_receiving }}</td>
                            <td>{{ $receivedTransfer->amount }}</td>
                            <td>{{ $receivedTransfer->transfer_date }}</td>
                            <td>
                                @if ($receivedTransfer->status === 'pending')
                                    <form method="post" action="{{ route('transfers.destroy', $receivedTransfer->id) }}" onsubmit="return confirm('{{ __('office-transfers.return_transfer_confirmation') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-action"> <i class="fa-solid fa-trash"></i>{{ __('office-transfers.return_transfer') }}</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if ($receivedTransfer->status === 'pending')
                                    <form method="post" action="{{ route('transfers.mark-received', $receivedTransfer->id) }}">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="transfer_code" placeholder="{{ __('office-transfers.transfer_code') }}">
                                            <button type="submit" class="btn btn-success btn-action"><i class="fa-solid fa-hand-holding-dollar"></i>{{ __('office-transfers.mark_received') }}</button>
                                        </div>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">{{ __('office-transfers.no_received_transfers') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
