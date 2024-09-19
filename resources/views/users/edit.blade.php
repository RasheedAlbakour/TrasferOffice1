{{-- views/users/edit.blade.php --}}

@extends('layouts.master')

@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@endsection

@section('title')
    @lang('user-edit.title')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('user-edit.page_header.title')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('user-edit.page_header.breadcrumb')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <br>
    <br>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>@lang('user-edit.content.error')</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <br>
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-edit.content.name_label') <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="name" required=""
                                    type="text" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-edit.content.email_label') <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="email" required=""
                                    type="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-edit.content.password_label') <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="password" required=""
                                    type="password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-edit.content.confirm_password_label') <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="confirm-password" required=""
                                    type="password">
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="col-lg-6">
                                <label class="form-label">@lang('user-edit.content.status_label')</label>
                                <select name="Status" id="select-beast" class="form-control nice-select custom-select">
                                    <option value="مفعل" {{ $user->Status == 'مفعل' ? 'selected' : '' }}>مفعل</option>
                                    <option value="غير مفعل" {{ $user->Status == 'غير مفعل' ? 'selected' : '' }}>غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <button class="btn btn-main-primary pd-x-20 mb-2" type="submit" style="background-color: rgba(22, 130, 218, 0.856)">@lang('user-edit.content.update_button')</button>

                                <a class="btn btn-secondary pd-x-20 mb-2" href="{{ route('users.index') }}">@lang('user-edit.content.back_button')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js') }}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{ URL::asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{ URL::asset('assets/js/form-validation.js') }}"></script>
@endsection
