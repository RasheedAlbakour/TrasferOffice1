<!-- resources/views/currencies/index.blade.php -->
@extends('layouts.master')

@section('content')
    <style>
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6; /* لون حدود الجدول */
        }

        .table th,
        .table td {
            text-align: center; /* محاذاة النص في الخانات إلى الوسط */
        }

        .table th {
            background-color: #f8f9fa; /* لون خلفية العناوين */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa; /* لون خلفية السطور الفردية */
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e9ecef; /* لون خلفية السطور الزوجية */
        }
    </style>

    <br>
    <br>
    <br>
    <br>
    <div class="container" dir="rtl">
        <h2>{{ __('currencies-index.exchange_rates') }}</h2>

        <form action="{{ route('currencies.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search_symbol" class="form-control" placeholder="{{ __('currencies-index.search_currency') }}">
                <button type="submit" class="btn btn-primary">{{ __('currencies-index.search') }}</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead style="background-color: #3366CC; color: white;">
                <tr>
                    <th>{{ __('currencies-index.currency_name') }}</th>
                    <th>{{ __('currencies-index.exchange_rate_usd') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exchangeRates as $currencyCode => $exchangeRate)
                    <tr>
                        <td>{{ $currencyCode }}</td>
                        <td>{{ $exchangeRate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
