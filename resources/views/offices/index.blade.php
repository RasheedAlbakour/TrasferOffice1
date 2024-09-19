<!-- resources/views/offices/index.blade.php -->

@extends('layouts.master')

@section('content')
@if (Auth::user()->hasRole('admin'))

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <br><br>

            {{-- Delete message --}}
            @if (session('danger'))
                <div class="alert alert-danger">
                    <p style="font-weight: bold">{{ session('danger') }}</p>
                </div>
            @endif

            {{-- Create message --}}
            @if (session('created'))
                <div class="alert alert-success">
                    <p style="font-weight: bold">{{ session('created') }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-sm-1 col-md-2">
                        <a class="btn btn-primary btn-sm" href="{{route('offices.create')}}"><i class="fa-solid fa-circle-plus"></i>{{ __('office-index.add_office') }}</a>
                    </div><br><br>
                </div>

                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">{{ __('office-index.office_name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('office-index.location') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('office-index.operations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($offices->chunk(3) as $chunk)
                                    @foreach ($chunk as $office)
                                        <tr>
                                            <td>
                                                <a href="{{ route('offices.show', $office->id) }}" class="text-decoration-none text-dark">
                                                    <p>{{ $office->name }}</p>
                                                </a>
                                            </td>
                                            <td>
                                                <p class="card-text">{{ $office->address }}</p>
                                            </td>
                                            <td>
                                                @can('office-edit')
                                                    <a href="{{ route('offices.edit', $office->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>{{ __('office-index.edit_office') }} <span>{{ $office->name }}</span></a>
                                                @endcan
                                                @can('office-delete')
                                                    <button class="btn btn-danger" onclick="deleteOffice({{ $office->id }}, '{{ $office->name }}')"><i class="fa-solid fa-trash-can fa-shake" style="color: #ffffff;"></i>{{ __('office-index.delete_office') }} <span>{{ $office->name }}</span></button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="3">{{ __('office-index.no_offices') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@elseif (Auth::user()->hasRole('owner'))
@if (isset(Auth::user()->HisOffice))

    <br><br><br>
    <div class="container">
        <br><br>
        <div class="alert alert-info">
            <h4 class="alert-heading">{{ __('office-index.welcome_owner', ['officeName' => Auth::user()->HisOffice->name]) }}</h4>
            <p>{{ __('office-index.manage_office', ['officeName' => Auth::user()->HisOffice->name]) }}</p>
        </div>
    </div><br><br>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <td>
                    @can('office-show')
                        <a href="{{ route('offices.show', ['office' => Auth::user()->HisOffice->id]) }}" class="btn btn-primary">{{ __('office-index.office_details_btn') }}</a>
                    @endcan
                </td>
                <td>
                    @can('transfer-office')
                        <a href="{{ route('offices.transfers', ['office' => Auth::user()->HisOffice->id]) }}" class="btn btn-primary">{{ __('office-index.view_transfers_btn', ['officeName' => Auth::user()->HisOffice->name]) }}</a>
                    @endcan
                </td>
                <td>
                    @can('transfer-create')
                        <a href="{{ route('transfers.create', ['office_id' => Auth::user()->HisOffice->id]) }}" class="btn btn-primary">{{ __('office-index.send_transfer_btn', ['officeName' => Auth::user()->HisOffice->name]) }}</a>
                    @endcan
                </td>
            </tr>
        </table>
    </div>
    @else
    <br><br><br>

    <div class="alert alert-info">
        <h4 class="alert-heading"> {{Auth::user()->name}}</h4>
        <p> {{ __('office-index.welcome_no_office') }}</p>
    </div>

    @endif


@endif
<script>
    function deleteOffice(officeId, officeName) {
        if (confirm('{{ __('office-index.delete_warning', ['officeName' => '']) }}' + officeName + '{{ __('office-index.delete_warning', ['officeName' => '']) }}')) {
            // Redirect user to the delete page
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('offices.destroy', ':id') }}'.replace(':id', officeId);
            var csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = '{{ csrf_token() }}';
            form.appendChild(csrfField);
            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

@endsection
