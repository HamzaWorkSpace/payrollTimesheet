@extends('admin.dashboard')
@section('title', 'List contracts')
@section('styles')
    @vite('resources/css/app.css')
    @vite('resources/css/datatables.css')
@endsection

@section('admin')

    <div class="page-content">
        <nav class="flex justify-between items-center">
            <div class="row">
                <div class="col-md-6">
                    <h4>Contracts</h4>
                </div>
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-1">
                    <a href="{{ route('contracts.create') }}" class="btn pl-3 text-right me-2 bg-white border border-black rounded-none  text-3xl font-bold"><i data-feather="plus" class=""></i></a>
                </div>
            </div>
        </nav>
        <div class="row mt-2">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="contracts-table" class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>User</th>
                                    <th>Manager</th>
                                    <th>Client</th>
                                    <th>Place of Employment</th>
                                    <th>Type</th>
                                    <th>Employment Basis</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    <th>Timesheet Frequency</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($contracts as $contract)
                                    <tr>
                                        <td>{{ Str::words($contract->user->id, 2, '...') }}</td>
                                        <td><a href="{{ route('contracts.show', $contract->id) }}">{{ Str::words($contract->user->name, 2, '...') }}</a></td>
                                        <td>{{ Str::words($contract->manager->name, 2, '...') }}</td>
                                        <td>{{ Str::words($contract->client->name, 2, '...') }}</td>
                                        <td>{{ Str::words($contract->place_of_employment, 2, '...') }}</td>
                                        <td>Labor Hire</td>
                                        <td>Type</td>
                                        <td>{{ $contract->contract_start_date }}</td>
                                        <td>{{ $contract->contract_end_date }}</td>
                                        <td>{{ $contract->contract_status===1?'approved':'not approved' }}</td>
                                        <td>{{ $contract->timesheet_frequency }}</td>
                                        <td>
                                            <a href="{{ route('contracts.edit', ['contract' => $contract->id, 'page' => request()->get('page', 1)]) }}" class="btn"><i data-feather="edit" class="feather feather-edit" ></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="mt-3">
                            {{ $contracts->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
    @vite('resources/js/app.js')
    @vite('resources/js/datatables.js')
@endsection

