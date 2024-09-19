<!-- resources/views/users/profile.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container" dir="{{ __('profile.dir') }}">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="profile-card mt-5 p-4  rounded">
                <div class="profile-header text-center">
                    <i class="bi bi-person-circle fs-1 text-primary mb-3"></i> <!-- استخدمت أيقونة من Bootstrap Icons -->
                    <h2 class="mt-3">{{ $user->name }}</h2>
                    <p class="text-muted">{{ $user->email }}</p>
                </div>
                <hr>
                <div class="profile-details">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        <i class="bi bi-person-fill icon"></i> {{ __('profile.name') }}
                                    </label>
                                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        <i class="bi bi-envelope-fill icon"></i> {{ __('profile.email') }}
                                    </label>
                                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">
                                        <i class="bi bi-person-lines-fill icon"></i> {{ __('profile.status') }}
                                    </label>
                                    <input type="text" class="form-control" id="status" value="{{ $user->Status }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">
                                        <i class="bi bi-people-fill icon"></i> {{ __('profile.role') }}
                                    </label>
                                    <input type="text" class="form-control" id="role" value="{{ $user->getRoleNames()->implode(', ') }}" readonly>
                                </div>
                            </div>
                            @if ($user->HisOffice)
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="officeName" class="form-label">
                                            <i class="bi bi-building icon"></i> {{ __('profile.office_name') }}
                                        </label>
                                        <input type="text" class="form-control" id="officeName" value="{{ $user->HisOffice->name }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="balance" class="form-label">
                                            <i class="bi bi-cash icon"></i> {{ __('profile.balance') }}
                                        </label>
                                        <input type="text" class="form-control" id="balance" value="{{ $user->HisOffice->current_balance }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sentTransfers" class="form-label">
                                            <i class="bi bi-arrow-right-circle-fill icon"></i> {{ __('profile.sent_transfers') }}
                                        </label>
                                        <input type="text" class="form-control" id="sentTransfers" value="{{ $user->HisOffice->transfersFrom->count() }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="receivedTransfers" class="form-label">
                                            <i class="bi bi-arrow-left-circle-fill icon"></i> {{ __('profile.received_transfers') }}
                                        </label>
                                        <input type="text" class="form-control" id="receivedTransfers" value="{{ $user->HisOffice->transfersTo->count() }}" readonly>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .icon {
        font-size: 2rem;
        margin-right: 8px;
        color: #3498db; /* يمكنك تغيير لون الأيقونات حسب تفضيلاتك */
    }

    .profile-card {
        animation: fadeInUp 1s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
