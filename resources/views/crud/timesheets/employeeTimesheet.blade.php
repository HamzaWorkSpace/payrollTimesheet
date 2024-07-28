@extends('admin.dashboard')
@section('title', 'List timesheets')
@section('styles')
    @vite('resources/css/app.css')
    @vite('resources/css/datatables.css')
@endsection

@section('admin')
    <div class="page-content">
        <nav class="flex justify-between items-center">
            <div class="row">
                <div class="col-md-6">
                    <h4>Timesheet</h4>
                </div>
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-1">
                    <a href="{{ route('timesheets.create', ['user_id' => request()->route('user_id')]) }}" class="btn pl-3 text-right me-2 bg-white border border-black rounded-none text-3xl font-bold"><i data-feather="plus" class=""></i></a>
                </div>
            </div>
        </nav>

        <div class="row mt-2">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="timesheets-table" class="table table-responsive">
                                <thead>
                                <tr class="text-center">
                                    <th>Timesheet ID</th>
                                    <th>Employee Name</th>
                                    <th>Account Manager</th>
                                    <th>Client</th>
                                    <th>Contract</th>
                                    <th>Timesheet Start</th>
                                    <th>Timesheet End</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody class="text-center">
                                @foreach ($employeeTimesheets as $employeeTimesheet)
                                    <tr>
                                        <td>{{ $employeeTimesheet->timesheet_id }}</td>
                                        <td>{{ Str::words($employeeTimesheet->employeeName, 4, '...') }}</td>
                                        <td>{{ Str::words($employeeTimesheet->managerName, 4, '...') }}</td>
                                        <td>{{ Str::words($employeeTimesheet->clientName, 4, '...') }}</td>
                                        <td>{{ Str::words($employeeTimesheet->contract_title, 4, '...') }}</td>
                                        <td>{{ $employeeTimesheet->timesheet_start }}</td>
                                        <td>{{ $employeeTimesheet->timesheet_end }}</td>
                                        <td>
                                            <button type="button"
                                                    class="btn btn-sm rounded-pill {{ $employeeTimesheet->status === 'approved' ? 'btn-success' : ($employeeTimesheet->status === 'rejected' ? 'btn-danger' : ($employeeTimesheet->status === 'pending' ? 'btn-warning' : 'btn-secondary')) }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#timesheetConfirmation{{ $employeeTimesheet->timesheet_id }}"
                                                    data-timesheetid="{{ $employeeTimesheet->timesheet_id }}"
                                                    id="confirmationModel">
                                                {{ $employeeTimesheet->status }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('userTimesheets.edit', ['id' => $employeeTimesheet->timesheet_id, 'page' => request()->get('page', 1)]) }}" class="btn"><i data-feather="edit" class="feather feather-edit" ></i></a>
                                            <button class="btn" onclick="copyTimesheet({{ $employeeTimesheet->timesheet_id }})"><i data-feather="copy"></i></button>
                                            <button
                                                class="btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $employeeTimesheet->timesheet_id }}"
                                                data-timesheet_id="{{ $employeeTimesheet->timesheet_id }}">
                                                <i data-feather="trash-2" class="feather feather-edit" ></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('crud.partials.timesheet_approval_confirmation_modal', ['employeeTimesheet' => $employeeTimesheet])
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                        <div class="mt-3">
                            {{ $employeeTimesheets->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @foreach ($employeeTimesheets as $employeeTimesheet)
        @include('crud.partials.delete_timesheet_modal', ['employeeTimesheet' => $employeeTimesheet])
    @endforeach
@endsection

@section('scripts')
    @vite('resources/js/app.js')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModals = document.querySelectorAll('[id^="deleteModal"]');
            deleteModals.forEach(function (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var timesheetId = button.getAttribute('data-timesheet_id');
                    var form = deleteModal.querySelector('form');
                    var currentPage = '{{ request()->get('page', 1) }}';
                    form.action = '{{ url("/userTimesheets") }}/' + timesheetId + '?page=' + currentPage;
                });
            });
        });
    </script>
@endsection
