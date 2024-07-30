@extends('admin.dashboard')
@section('title', 'List Clients')
@section('styles')
    @vite('resources/css/app.css')
    @vite('resources/css/datatables.css')
@endsection

@section('admin')


 <div class="page-content">
        <nav class="flex justify-between items-center">
             <div class="row">
                 <div class="col-md-6">
                    <h4>Contract
                        @if($contract->contract_status===0)
                            <button type="button" class="btn btn-danger rounded-pill m-3 ">Not Approved</button>
                        @else
                            <button type="button" class="btn btn-success rounded-pill m-3 ">Approved</button>
                        @endif
                    </h4>
                    <span class="text-muted"> Last Updated by reference {{$contract->updated_at}}</span>
                 </div>
                 <div class="col-md-5">&nbsp;</div>
                 <div class="col-md-1">
                     <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-contractid="{{ $contract->id }}"><i data-feather="trash-2" class="feather feather-edit" ></i></button>
                 </div>
             </div>
        </nav>

        <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-line-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timesheets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Attachments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false">Private Attachments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">Signature Events</a>
            </li>
        </ul>
        <div class="tab-content mt-3" id="lineTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                <nav class="d-flex align-items-center justify-content-evenly">
                    <h4>Contract Details </h4>
                    <h4>Client Details</h4>
                </nav>
                <div class="row mt-3">
                    <div class="col-md-2 col-2  ">
                        <div class="client-detail py-3">
                            <p class=" bg-gray-200 p-2 my-2">Business</p>
                            <p class=" bg-gray-200 p-2 my-2">Employee</p>
                            <p class=" bg-gray-200 p-2 my-2">Type</p>
                            <p class=" bg-gray-200 p-2 my-2">Employment Basis</p>
                            <p class=" bg-gray-200 p-2 my-2 text-nowrap">Subcontractor Entity</p>
                            <p class=" bg-gray-200 p-2 my-2">Payroll Tax Exempt</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-2 ">
                        <div class="client-detail py-3">
                            <p class="  p-2 my-2">{{$contract->client->name}}</p>
                            <p class="  p-2 my-2">{{$contract->user->name}}</p>
                            <p class="  p-2 my-2">Labour hire</p>
                            <p class="  p-2 my-2">PAYG</p>
                            <p class="  p-2 my-2">-</p>
                            <p class="  p-2 my-2">Yes</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-2  ">
                        <div class="client-detail py-3 ">
                            <p class=" bg-gray-200 p-2 my-2">Contract period</p>
                            <p class=" bg-gray-200 p-2 my-2 text-nowrap">place of Employment</p>
                            <p class=" bg-gray-200 p-2 my-2">Pay Schedule</p>
                            <p class=" bg-gray-200 p-2 my-2">Timesheet Type</p>
                            <p class=" bg-gray-200 p-2 my-2">Timesheet Approver</p>
                            <p class=" bg-gray-200 p-2 my-2">Supervisor Approval</p>
                            <p class=" bg-gray-200 p-2 my-2">Jurisdiction</p>
                            <p class=" bg-gray-200 p-2 my-2">Account Manager</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-2 ">
                        <div class="client-detail py-3">
                            <p class="  p-2 my-2 text-nowrap">{{$contract->contract_start_date}}, {{$contract->contract_end_date}}</p>
                            <p class="  p-2 my-2 text-nowrap">{{$contract->place_of_employment}}</p>
                            <p class="  p-2 my-2">{{$contract->timesheet_frequency}}</p>
                            <p class="  p-2 my-2">{{$contract->timesheet_frequency}}</p>
                            <p class="  p-2 my-2">{{$contract->timesheet_approved_by}}</p>
                            <p class="  p-2 my-2">No infc</p>
                            <p class="  p-2 my-2">{{$contract->place_of_employment}}</p>
                            <p class="  p-2 my-2">{{$contract->manager->name}}</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-2  ">
                        <div class="client-detail py-3">
                            <p class=" bg-gray-200 p-2 my-2">Client</p>
                            <p class=" bg-gray-200 p-2 my-2">Invoice Schedule</p>
                            <p class=" bg-gray-200 p-2 my-2 text-nowrap">Generate Sales Invoice</p>
                            <p class=" bg-gray-200 p-2 my-2">Purchase Order</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-2 ">
                        <div class="client-detail py-3">
                            <p class="  p-2 my-2 text-nowrap">{{$contract->client->name}}</p>
                            <p class="  p-2 my-2 ">{{$contract->invoice_data_type}}</p>
                            <p class="  p-2 my-2">Enabled check</p>
                            <p class="  p-2 my-2"> - </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3 col-3  ">
                        <div class="client-detail py-3">
                            <p class=" bg-gray-200 p-2 my-2">Award</p>
                            <p class=" bg-gray-200 p-2 my-2">Position description</p>
                            <p class=" bg-gray-200 p-2 my-2">Insurance Details</p>
                            <p class=" bg-gray-200 p-2 my-2">Contracts Conditions</p>
                            <p class=" bg-gray-200 p-2 my-2 text-nowrap">Contract Template</p>
                            <p class=" bg-gray-200 p-2 my-2">Notes</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 ">
                        <div class="client-detail py-3">
                            <p class="  p-2 my-2">{{$contract->award}}</p>
                            <p class="  p-2 my-2">{{$contract->position_description}}</p>
                            <p class="  p-2 my-2"> {{$contract->insurance_details}} </p>
                            <p class="  p-2 my-2"> {{$contract->contract_conditions}} </p>
                            <p class="  p-2 my-2">External - PAYG Employment Agreement docx</p>
                            <p class="  p-2 my-2">{{$contract->notes}} </p>
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
                                            <th>Standard Hours in Day </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$contract->rate_name}} </td>
                                            <td>{{$contract->unit_of_pay}}</td>
                                            <td>{{$contract->pay_amount}}</td>
                                            <td>{{$contract->charge_amount}}</td>
                                            <td> {{$contract->standard_hours_of_pay}} </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpan1" aria-labelledby="contact-line-tab">
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
                                    <table id="dataTableExample" class="table">
                                        <thead>
                                        <tr>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>status</th>
                                            <th>Submitted On</th>
                                            <th> </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>01 jul 2023</td>
                                            <td>30 jul 2024</td>
                                            <td> <span class="text-white bg-success rounded-circle"><i data-feather="check" class="icon-sm" ></i></span> approved</td>
                                            <td> 15 Jan 2024</td>
                                            <td> <i data-feather="external-link" class="icon-sm" ></i> </td>
                                        </tr>
                                        <tr>
                                            <td>01 jul 2023</td>
                                            <td>30 jul 2024</td>
                                            <td> <span class="text-white bg-success rounded-circle"><i data-feather="check" class="icon-sm" ></i></span> approved</td>
                                            <td> 15 Jan 2024</td>
                                            <td> <i data-feather="external-link" class="icon-sm" ></i> </td>
                                        </tr>
                                        <tr>
                                            <td>01 jul 2023</td>
                                            <td>30 jul 2024</td>
                                            <td> <span class="text-white bg-success rounded-circle"><i data-feather="check" class="icon-sm" ></i></span> approved</td>
                                            <td> 15 Jan 2024</td>
                                            <td> <i data-feather="external-link" class="icon-sm" ></i> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpan1" aria-labelledby="contact-line-tab">additional contracts</div>
            <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-line-tab">additional contracts</div>
            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-line-tab">additional contracts</div>
        </div>
    </div>

 @include('crud.partials.delete_contract_modal')
@endsection

@section('scripts')
    @vite('resources/js/app.js')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var contractid = button.getAttribute('data-contractid');
                var form = deleteModal.querySelector('#deleteForm');
                var currentPage = '{{ request()->get('page', 1) }}';
                form.action = '{{ url("/contracts") }}/' + contractid + '?page=' + currentPage;
            });
        });
    </script>
@endsection
