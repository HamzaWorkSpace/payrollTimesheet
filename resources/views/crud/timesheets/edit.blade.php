{{-- resources/views/crud/timesheets/edit.blade.php --}}
@extends('admin.dashboard')

@section('title', 'Edit Timesheet')

@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <h4>Edit Timesheet for {{ $timesheet->user->name }}</h4>
        </nav>
        <form id="timesheetForm" action="{{ route('timesheets.update', ['id' => $timesheet->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                        <div class="col-12">
                                            <h5 class="d-flex align-items-center mx-2">Contract Finder</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xl-12 stretch-card">
                                            <div class="row flex-grow-1">
                                                <div class="mb-3">
                                                    <label class="form-label mb-0 mx-2 text-muted">Business *</label>
                                                    <select class="form-select select2" name="client_id" id="client">
                                                        @foreach($clients as $client)
                                                            <option value="{{ $client->id }}" {{ $client->id == $timesheet->client->id? 'selected' : '' }}>{{ $client->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label mb-0 mx-2 text-muted">Employee *</label>
                                                    <select class="form-select select2" name="user_id" id="user" disabled>
                                                        <option value="{{ $timesheet->user->id }}">{{ $timesheet->user->name }}</option>
                                                    </select>
                                                    <input type="hidden" name="user_id" id="user_id_{{ $timesheet->user->id }}" value="{{ $timesheet->user->id }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label mb-0 mx-2 text-muted">Contract *</label>
                                                    <select class="form-select select2" name="contract_id" id="contract">
                                                        @foreach($contracts as $contract)
                                                            <option value="{{ $contract->id }}" {{ $contract->id == $timesheet->contract->id ? 'selected' : '' }}>{{ $contract->contract_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Removed the save button from here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row my-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 col-xl-4 stretch-card">
                                            <div class="row flex-grow-1">
                                                <div class="mb-3 d-flex align-items-center">
                                                    <label class="form-label mb-0 mx-2 text-muted">Period *</label>
                                                    <select class="form-select select2" name="period" id="period">
                                                        @foreach($periods as $period)
                                                            <option value="{{ $period }}" {{ $period == $selectedPeriod ? 'selected' : '' }}>{{ $period }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="saveButton" class="btn btn-primary ms-auto">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
            <!-- row -->
            <div class="row my-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="weekDaysContainer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </form>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/app.js')
    @include('crud.partials.periods', ['selectedHours' => $timesheet->hours, 'selectedNotes' =>  $timesheet->notes])
@endsection
