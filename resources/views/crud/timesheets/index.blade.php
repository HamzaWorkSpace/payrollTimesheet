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
{{--                <div class="col-md-1">--}}
{{--                    <a href="{{ route('timesheets.create') }}" class="btn pl-3 text-right me-2 bg-white border border-black rounded-none  text-3xl font-bold"><i data-feather="plus" class=""></i></a>--}}
{{--                </div>--}}
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
                                    <th>Employee Name</th>
                                    <th>Account Manager</th>
                                    <th>Client</th>
                                    <th>Contract</th>
                                    <th>Contract Start</th>
                                    <th>Contract End</th>
                                    {{--                                    <th>Status</th>--}}
                                    {{--                                    <th>Rate</th>--}}
                                    <th>Unit of Pay</th>
                                    <th>PayAmount</th>
                                    <th>Charge Amount</th>
                                    <th>Total Unit</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody class="text-center">
                                @foreach ($timesheets as $timesheet)
                                    <tr>
                                        <td><a href="{{ route('timesheets.show', $timesheet->timesheet_id) }}">{{ Str::words($timesheet->user_name, 2, '...') }}</td>
                                        <td>{{ Str::words($timesheet->manager_name, 2, '...') }}</td>
                                        <td>{{ Str::words($timesheet->client_name, 2, '...') }}</td>
                                        <td>{{ Str::words($timesheet->contract_title, 2, '...') }}</td>
                                        <td>{{ $timesheet->contract_start_date }}</td>
                                        <td>{{ $timesheet->contract_end_date }}</td>



                                        {{--                                        <td>--}}
                                        {{--                                            <button type="button"--}}
                                        {{--                                                    class="btn btn-sm rounded-pill {{ $timesheet->status === 'approved' ? 'btn-success' : ($timesheet->status === 'rejected' ? 'btn-danger' : ($timesheet->status === 'pending' ? 'btn-warning' : 'btn-secondary')) }}"--}}
                                        {{--                                                    data-bs-toggle="modal"--}}
                                        {{--                                                    data-bs-target="#timesheetConfirmation{{ $timesheet->id }}"--}}
                                        {{--                                                    data-timesheetid="{{ $timesheet->id }}"--}}
                                        {{--                                                    id="confirmationModel">--}}
                                        {{--                                                {{ $timesheet->status }}--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </td>--}}
                                        {{--                                        <td>{{ $timesheet->total_unit }}</td>--}}
                                        <td>{{ $timesheet->unit_of_pay }}</td>
                                        <td>{{ $timesheet->pay_amount }}</td>
                                        <td>{{ $timesheet->charge_amount }}</td>
                                        <td>{{ $timesheet->total_unit }}</td>


                                        <td>
                                            <a href="{{ route('timesheets.viewEmployeeTimesheets', ['user_id' => $timesheet->user_id, 'page' => request()->get('page', 1)]) }}" class="btn"><i data-feather="eye" class="feather feather-eye" ></i></a>
{{--                                            <a href="{{ route('timesheets.edit', ['id' => $timesheet->timesheet_id, 'page' => request()->get('page', 1)]) }}" class="btn"><i data-feather="edit" class="feather feather-edit" ></i></a>--}}
{{--                                            <button class="btn" onclick="copyTimesheet({{ $timesheet->timesheet_id}})"><i data-feather="copy"></i></button>--}}
                                        </td>
                                    </tr>
{{--                                    @include('crud.partials.timesheet_approval_confirmation_modal')--}}
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                        <div class="mt-3">
{{--                            {{ $timesheets->links('vendor.pagination.bootstrap-5') }}--}}
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



