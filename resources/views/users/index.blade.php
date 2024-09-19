{{-- views/users/index.blade.php --}}
@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
    {{ __('user-index.title') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('user-index.page_header.title') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('user-index.page_header.breadcrumb') }}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
<br>
<br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-sm-1 col-md-2">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}"> <i class="fa-solid fa-user-plus"></i>{{ __('user-index.content.add_user') }}</a>
                    </div><br><br>
                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">{{ __('user-index.table_header.number') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('user-index.table_header.user_name') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('user-index.table_header.email') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('user-index.table_header.user_status') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('user-index.table_header.user_type') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('user-index.table_header.office') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('user-index.table_header.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->Status == 'مفعل')
                                                <span class="label text-success d-flex">
                                                    <i class="fa-solid fa-link fa-beat" style="color: #2ec27e;"></i>{{ $user->Status }}
                                                </span>
                                            @else
                                                <span class="label text-danger d-flex">
                                                    <i class="fa-solid fa-link-slash fa-flip" style="color: #e01b24;"></i>{{ $user->Status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <label class="btn btn-sm btn-success"
                                                style="color: wheat;">{{ $user->roles_name }}</label>
                                        </td>
                                        <td>
                                            @if (!empty($user->HisOffice))
                                                <a href="{{ route('offices.show', ['office' => $user->HisOffice->id]) }}"
                                                    class="btn btn-sm btn-primary">
                                                    {{ $user->HisOffice->name }}
                                                </a>
                                            @elseif ($user->hasRole('admin'))
                                                {{ __('user-index.table_header.office') }}
                                            @else
                                                <a href="{{ route('offices.create') }}"
                                                    class="btn btn-sm btn-primary">{{ __('user-index.table_header.office') }}</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info" title="{{ __('user-index.edit_user') }}">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ __('user-index.delete_user') }}">
                                                    <i class="fa-solid fa-trash-can fa-shake" style="color: #ffffff;"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
