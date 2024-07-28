{{-- resources/views/crud/user/create.blade.php --}}
@extends('admin.dashboard')

@section('title', 'Add Client')

@section('admin')
        <div class="page-content">
            <nav class="flex justify-between items-center">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Contract
                            <button type="button"
                                    class="btn btn-sm rounded-pill {{ $timesheet->status === 'approved' ? 'btn-success' : ($timesheet->status === 'rejected' ? 'btn-danger' : ($timesheet->status === 'pending' ? 'btn-warning' : 'btn-secondary')) }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#timesheetConfirmation{{ $timesheet->id }}"
                                    data-timesheetid="{{ $timesheet->id }}"
                                    data-action=""
                                    id="confirmationModel">
                                {{ $timesheet->status }}
                            </button>
                        </h4>
                        <span class="text-muted"> Last Updated by reference {{ $timesheet->updated_at}}</span>
                    </div>
                    <div class="col-md-5">&nbsp;</div>
{{--                    <div class="col-md-1">--}}
{{--                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-contractid="{{ $timesheet->id }}"><i data-feather="trash-2" class="feather feather-edit" ></i></button>--}}
{{--                    </div>--}}
                </div>
            </nav>
            <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-line-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false">Attachments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">Invoices</a>
                </li>
            </ul>
            <div class="tab-content mt-3" id="lineTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                    <nav class="d-flex">
                        <h4>Contract Details</h4>
                    </nav>
                    <div class="row mt-3">
                        <div class="col-md-2 col-2">
                            <div class="client-detail py-3">
                                <p class="bg-gray-200 p-2 my-2">Business</p>
                                <p class="bg-gray-200 p-2 my-2">Employee</p>
                                <p class="bg-gray-200 p-2 my-2">Type</p>
                                <p class="bg-gray-200 p-2 my-2">Employment Basis</p>
                                <p class="bg-gray-200 p-2 my-2 text-nowrap">Subcontractor Entity</p>
                                <p class="bg-gray-200 p-2 my-2">Payroll Tax Exempt</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="client-detail py-3">
                                <p class="p-2 my-2">{{$timesheet->client->name}}</p>
                                <p class="p-2 my-2">{{$timesheet->user->name}}</p>
                                <p class="p-2 my-2">Labour hire</p>
                                <p class="p-2 my-2">PAYG</p>
                                <p class="p-2 my-2">-</p>
                                <p class="p-2 my-2">Yes</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="client-detail py-3">
                                <p class="bg-gray-200 p-2 my-2">Contract period</p>
                                <p class="bg-gray-200 p-2 my-2 text-nowrap">Place of Employment</p>
                                <p class="bg-gray-200 p-2 my-2">Pay Schedule</p>
                                <p class="bg-gray-200 p-2 my-2">Timesheet Type</p>
                                <p class="bg-gray-200 p-2 my-2">Timesheet Approver</p>
                                <p class="bg-gray-200 p-2 my-2">Supervisor Approval</p>
                                <p class="bg-gray-200 p-2 my-2">Jurisdiction</p>
                                <p class="bg-gray-200 p-2 my-2">Account Manager</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="client-detail py-3">
                                <p class="p-2 my-2 text-nowrap">{{$timesheet->contract->contract_start_date}} to {{ $timesheet->contract->contract_end_date }}</p>
                                <p class="p-2 my-2 text-nowrap">{{$timesheet->contract->place_of_employment}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->pay_schedule}}</p>
                                <p class="p-2 my-2">Total hours</p>
                                <p class="p-2 my-2">{{$timesheet->manager->name}}</p>
                                <p class="p-2 my-2">No info</p>
                                <p class="p-2 my-2">{{$timesheet->contract->place_of_employment}}</p>
                                <p class="p-2 my-2">{{$timesheet->manager->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="client-detail py-3">
                                <p class="bg-gray-200 p-2 my-2">Client</p>
                                <p class="bg-gray-200 p-2 my-2">Invoice Schedule</p>
                                <p class="bg-gray-200 p-2 my-2 text-nowrap">Generate Sales Invoice</p>
                                <p class="bg-gray-200 p-2 my-2">Purchase Order</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="client-detail py-3">
                                <p class="p-2 my-2 text-nowrap">{{$timesheet->client->name}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->invoicing_scheduler}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->generate_sales_invoice===1?'Yes':'No'}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->purchase_order}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 col-3">
                            <div class="client-detail py-3">
                                <p class="bg-gray-200 p-2 my-2">Award</p>
                                <p class="bg-gray-200 p-2 my-2">Position description</p>
                                <p class="bg-gray-200 p-2 my-2">Insurance Details</p>
                                <p class="bg-gray-200 p-2 my-2">Contracts Conditions</p>
                                <p class="bg-gray-200 p-2 my-2 text-nowrap">Contract Template</p>
                                <p class="bg-gray-200 p-2 my-2">Notes</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="client-detail py-3">
                                <p class="p-2 my-2">{{$timesheet->contract->award}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->position_description}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->insurance_details}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->contract_conditions}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->contract_template}}</p>
                                <p class="p-2 my-2">{{$timesheet->contract->additional_clause}}</p>
                            </div>
                        </div>
                    </div>
                    <nav class="page-breadcrumb">
                        <h4>Rates</h4>
                    </nav>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Unit</th>
                                                <th>Pay Amount</th>
                                                <th>Charge Account</th>
                                                <th>Standard Hours in Day</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$timesheet->contract->rate_name}}</td>
                                                <td>{{$timesheet->contract->unit_of_pay}}</td>
                                                <td>{{$timesheet->contract->pay_amount}}</td>
                                                <td>{{$timesheet->contract->charge_amount}}</td>
                                                <td>{{$timesheet->contract->standard_hours_in_a_day}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-line-tab">
                    <div class="row mt-5">
                        <nav class="page-breadcrumb d-flex justify-content-end">
                            <a href="create-timesheet.html" class="btn bg-black text-white" type="submit">
                                <i data-feather="plus"></i>
                            </a>
                        </nav>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample" class="table text-center">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Duration(HH:MM)</th>
                                                <th>Duration(hrs)</th>
                                                <th>Units</th>
                                                <th>Rate</th>
                                                <th>Notes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>01 jul 2023</td>
                                                <td>8:00</td>
                                                <td>8</td>
                                                <td>8 Hours</td>
                                                <td>Hourly Rate</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>01 jul 2023</td>
                                                <td>8:00</td>
                                                <td>8</td>
                                                <td>8 Hours</td>
                                                <td>Hourly Rate</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>01 jul 2023</td>
                                                <td>8:00</td>
                                                <td>8</td>
                                                <td>8 Hours</td>
                                                <td>Hourly Rate</td>
                                                <td>-</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-line-tab">
                    <div class="row mt-5">
                        <nav class="page-breadcrumb d-flex justify-content-end">
                            <a href="#" class="btn bg-black text-white" type="submit">
                                <i data-feather="plus"></i>
                            </a>
                        </nav>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Action by</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                                <th>Notes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>01 jul 2023</td>
                                                <td>Tim Bajaj</td>
                                                <td>Approve</td>
                                                <td><span class="text-white bg-success rounded-circle"><i data-feather="check" class="icon-sm"></i></span> Approved</td>
                                                <td>Approved</td>
                                            </tr>
                                            <tr>
                                                <td>01 jul 2023</td>
                                                <td>Tim Bajaj</td>
                                                <td>Approve</td>
                                                <td><span class="text-white bg-success rounded-circle"><i data-feather="check" class="icon-sm"></i></span> Approved</td>
                                                <td>-</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-line-tab">
                    <div class="row mt-5">
                        <nav class="page-breadcrumb d-flex justify-content-end">
                            <a href="#" class="btn bg-black text-white" type="submit">
                                <i data-feather="plus"></i>
                            </a>
                        </nav>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>Size</th>
                                                <th>Added By</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Timesheet 01 jul 2023 PDF</td>
                                                <td>20.66 KB</td>
                                                <td>Tim Bajaj</td>
                                                <td>01 jul 2023</td>
                                            </tr>
                                            <tr>
                                                <td>Timesheet 01 jul 2023 PDF</td>
                                                <td>20.66 KB</td>
                                                <td>Tim Bajaj</td>
                                                <td>01 jul 2023</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-line-tab">
                    <div class="row mt-5">
                        <nav class="page-breadcrumb d-flex justify-content-end">
                            <a href="#" class="btn bg-black text-white" type="submit">
                                <i data-feather="plus"></i>
                            </a>
                        </nav>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Invoice Date</th>
                                                <th>Reference</th>
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Due Date</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>SALES</td>
                                                <td>01 jul 2023</td>
                                                <td>Timesheet 01 jul 2023 HITECH PERSONNEL</td>
                                                <td>Submitted</td>
                                                <td>Outstanding</td>
                                                <td>01 jul 2023</td>
                                                <td><i data-feather="external-link" class="icon-sm"></i></td>
                                                <td><i data-feather="download" class="icon-sm"></i></td>
                                            </tr>
                                            <tr>
                                                <td>PURCHASE</td>
                                                <td>01 jul 2023</td>
                                                <td>Timesheet 01 jul 2023 HITECH PERSONNEL</td>
                                                <td>Submitted</td>
                                                <td>Outstanding</td>
                                                <td>01 jul 2023</td>
                                                <td><i data-feather="external-link" class="icon-sm"></i></td>
                                                <td><i data-feather="download" class="icon-sm"></i></td>
                                            </tr>
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

@section('scripts')
    @vite('resources/js/app.js')
@endsection
