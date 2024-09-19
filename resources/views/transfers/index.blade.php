@extends('layouts.master')

@section('content')
    <style>
        .table-hover tbody tr:hover {
            background-color: #f5f5f5; /* يمكن تغيير لون التمييز عند التمرير على السطر */
            filter: brightness(1.2); /* زيادة سطوع السطر عند التمرير عليه */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa; /* لون خلفية السطور الفردية */
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e9ecef; /* لون خلفية السطور الزوجية */
        }
    </style>

    <div class="container" dir="rtl">
        <h2>{{ __('transfer-index.page_title') }}</h2>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover table-striped">
                <div class="mt-4">
                    <a href="{{ route('transfers.export-all') }}" class="btn btn-success">
                        {{ __('transfer-index.export_button') }}
                    </a>
                </div>
                <thead style="background-color: #3366CC; color: white;">
                    <tr>
                        <th scope="col">{{ __('transfer-index.transfer_number') }}</th>
                        <th scope="col">{{ __('transfer-index.sending_office') }}</th>
                        <th scope="col">{{ __('transfer-index.sending_office_owner') }}</th>
                        <th scope="col">{{ __('transfer-index.receiving_office') }}</th>
                        <th scope="col">{{ __('transfer-index.receiving_office_owner') }}</th>
                        <th scope="col">{{ __('transfer-index.receiver') }}</th>
                        <th scope="col">{{ __('transfer-index.status') }}</th>
                        <th scope="col">{{ __('transfer-index.amount') }}</th>
                        <th scope="col">{{ __('transfer-index.transfer_date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transfers as $transfer)
                        <tr>
                            <td>{{ $transfer->id }}</td>
                            <td>{{ $transfer->sender->name }}</td>
                            <td>{{ $transfer->sender->HisOwner->name }}</td>
                            <td>{{ $transfer->receiver->name }}</td>
                            <td>{{ $transfer->receiver->HisOwner->name }}</td>
                            <td>{{ $transfer->person_receiving }}</td>
                            <td>{{ $transfer->status }}</td>
                            <td>{{ $transfer->amount }}</td>
                            <td>{{ $transfer->transfer_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
