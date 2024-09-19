@extends('layouts.master')
{{-- views/users/create.blade.php --}}

@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{ URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />
@endsection

@section('title')
    @lang('user-create.title')
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('user-create.page_header.title')</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    @lang('user-create.page_header.breadcrumb')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
<br>
<br>
<br>

    <!-- row -->
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>@lang('user-create.content.error')</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <br>
            <div class="card">
                <div class="card-body">

                    <br>
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                        action="{{ route('users.store', 'test') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-create.content.name_label') <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="name" required=""
                                    type="text">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-create.content.email_label') <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="email" required=""
                                    type="email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-create.content.password_label') <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="password" required=""
                                    type="password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>@lang('user-create.content.confirm_password_label')
                                    <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20" name="confirm-password" required=""
                                    type="password">
                            </div>
                        </div>

                        <div class="row row-sm mg-b-20">
                            <div class="col-md-12">
                                <label class="form-label">@lang('user-create.content.status_label')</label>
                                <select name="Status" id="select-beast"
                                    class="form-control nice-select custom-select">
                                    <option value="مفعل">مفعل</option>
                                    <option value="غير مفعل">غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-main-primary pd-x-20 "style="background-color: rgba(22, 130, 218, 0.856)" type="submit">@lang('user-create.content.update_button')</button>
                                <a class="btn btn-secondary pd-x-20" href="{{ route('users.index') }}">@lang('user-create.content.back_button')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
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
