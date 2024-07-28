{{-- resources/views/crud/timesheets/create.blade.php --}}
@extends('admin.dashboard')

@section('title', 'Add Client')

@section('admin')

    <div class="page-content">
        <nav class="page-breadcrumb">
            <h4>Create Timesheet</h4>
        </nav>
        <form id="timesheetForm" action="{{ route('timesheets.store') }}" method="POST">
            @csrf
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
                                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label mb-0 mx-2 text-muted">Employee *</label>
                                                    <select class="form-select select2" name="user_id" id="user">
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label mb-0 mx-2 text-muted">Contract *</label>
                                                    <select class="form-select select2" name="contract_id" id="contract">
                                                        @foreach($contracts as $contract)
                                                            <option value="{{ $contract->id }}">{{ $contract->contract_title }}</option>
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
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                        <div class="col-12">
                                            <h5 class="d-flex align-items-center mx-2 me-4">Contract Details <i data-feather="external-link" class="icon-md"></i></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xl-12 stretch-card">
                                            <div class="row flex-grow-1">
                                                <div class="row d-flex justify-content-between"> </div>
                                                <div class="col-6 mb-3">
                                                    <p>Business :</p>
                                                    <p>Employees :</p>
                                                    <p class="my-3">Contract Status :</p>
                                                    <p class="mb-3">Contract Period :</p>
                                                    <p>Timesheet/Pay Frequency :</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <p>CANVAS ICT</p>
                                                    <p>Tim Bajaj</p>
                                                    <button type="submit" class="btn bg-success rounded-pill text-white my-2">Approved</button>
                                                    <p>01 jul 2023 - 30 jun 2024</p>
                                                    <p>Fortnightly</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                        <div class="col-12">
                                            <h5 class="d-flex align-items-center mx-2">Client Details <i data-feather="external-link" class="icon-md"></i></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-xl-12 stretch-card">
                                            <div class="row flex-grow-1">
                                                <div class="row d-flex justify-content-between"> </div>
                                                <div class="col-6 mb-3 text-nowrap">
                                                    <p>Name :</p>
                                                    <p>Invoice Frequency :</p>
                                                </div>
                                                <div class="col-6 mb-3 text-nowrap">
                                                    <p>HITECH PERSONEL</p>
                                                    <p>Fortnightly</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                            <option value="{{ $period}}">{{ $period}}</option>
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
                                    <div id="weekDaysContainer">

                                    </div>
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
    @include('crud.partials.periods')
@endsection
