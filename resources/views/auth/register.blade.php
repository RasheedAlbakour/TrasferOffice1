@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <p class="text-danger">
                        لا يمكنك إنشاء حساب لنفسك. يرجى التواصل مع الإدارة عبر البريد الإلكتروني: <strong>admin@yahoo.com</strong>
                    </p>
                    <p>
                        سيتم تحويلك إلى صفحة تسجيل الدخول بعد 5 ثواني.
                        <span id="countdown" class="text-muted">5</span>
                    </p>

                    <script>
                        // عداد تنازلي
                        var seconds = 5;
                        function countdown() {
                            seconds--;
                            document.getElementById('countdown').textContent = seconds;
                            if (seconds <= 0) {
                                window.location.href = '{{ route("login") }}';
                            }
                        }
                        setInterval(countdown, 1000);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
