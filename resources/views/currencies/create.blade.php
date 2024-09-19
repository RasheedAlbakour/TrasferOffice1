<!-- resources/views/currencies/create.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container" dir="rtl">
        <h2>إضافة عملة جديدة</h2>

        <form method="post" action="{{ route('currencies.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">اسم العملة</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="exchange_rate" class="form-label">سعر الصرف (مقابل الدولار)</label>
                <input type="number" step="0.01" class="form-control" id="exchange_rate" name="exchange_rate" required>
            </div>
            <button type="submit" class="btn btn-success">إضافة</button>
        </form>
    </div>
@endsection
