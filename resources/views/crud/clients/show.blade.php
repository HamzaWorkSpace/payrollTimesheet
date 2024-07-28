@extends('admin.dashboard')
@section('title', 'List Clients')
@section('styles')
    @vite('resources/css/app.css')
    @vite('resources/css/datatables.css')
@endsection

@section('admin')

<div class="page-content">
    <a class="float-right" href="{{ route('clients.index') }}"> Back</a>
    <nav class="flex justify-between items-center">
        <div class="row">
            <div class="col-md-6">
                <h4>Client Detail</h4>
            </div>
            <div class="col-md-5">&nbsp;</div>
            <div class="col-md-1">
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="{{ $client->id }}"><i data-feather="trash-2" class="feather feather-edit" ></i></button>
            </div>
        </div>
    </nav>

    <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-line-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contracts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Additional Contracts</a>
        </li>
    </ul>
    <div class="tab-content mt-3" id="lineTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
            <nav>
                <h4>Client Details </h4>
            </nav>
            <div class="row mt-3">
                <div class="col-md-4  ">
                    <div class="client-detail py-3 text-justify">
                        <p class=" bg-gray-200 p-2 my-2">Client Name</p>
                        <p class=" bg-gray-200 p-2 my-2">ABN</p>
                        <p class=" bg-gray-200 p-2 my-2">Contract</p>
                        <p class=" bg-gray-200 p-2 my-2">Email :</p>
                        <p class=" bg-gray-200 p-2 my-2">Xero Contract Id :</p>
                        <p class=" bg-gray-200 p-2 my-2">Invoice Data Type</p>
                        <p class=" bg-gray-200 p-2 my-2">Payments Terms (Days)</p>
                        <p class=" bg-gray-200 p-2 my-2">Invoicing</p>
                        <p class=" bg-gray-200 p-2 my-2">Merge Attachments as ZIP</p>
                        <p class=" bg-gray-200 p-2 my-2">Auto Upload Attachments to Xero</p>
                        <p class=" bg-gray-200 p-2 my-2">Notes</p>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="client-detail py-3">
                        <p class="  p-2 my-2">{{$client->name}}</p>
                        <p class="  p-2 my-2">{{$client->ABN}}</p>
                        <p class="  p-2 my-2">{{$client->contract_name}}</p>
                        <p class="  p-2 my-2">{{$client->email}}</p>
                        <p class="  p-2 my-2">{{$client->Xero_contact_id}}</p>
                        <p class="  p-2 my-2">{{$client->invoice_data_type}}</p>
                        <p class="  p-2 my-2">{{$client->payment_terms}}</p>
                        <p class="  p-2 my-2"> {{$client->invoicing===1?'yes':'no'}}</p>
                        <p class="  p-2 my-2"> {{$client->merge_attachments_as_zip===1?'yes':'no'}} </p>
                        <p class="  p-2 my-2"> {{$client->auto_upload_attachments_to_xero===1?'yes':'no'}}</p>
                        <p class="  p-2 my-2">{{$client->notes}}</p>
                    </div>
                </div>
            </div>
            <nav class="page-breadcrumb">
                <h4>Invoice Sechedule</h4>
            </nav>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label" for="termsCheck">
                                        Show Active Only
                                    </label>
                                    <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Frequency</th>
                                        <th>Strat Date</th>
                                        <th>Status</th>
                                        <th> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Fortnightly</td>
                                        <td>Fortnightly</td>
                                        <td>Mon 16 jan, 2023</td>
                                        <td>Active</td>
                                        <td>abc</td>
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
            <nav class="page-breadcrumb">
                <h4>Contracts</h4>
            </nav>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Account Manager</th>
                                        <th>Place of Employment</th>
                                        <th>status</th>
                                        <th>Start</th>
                                        <th>End</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="timesheet-detail.html">Tim_Bajaj</a></td>
                                        <td>Tim_Bajaj</td>
                                        <td>6 Chan st Belconnen</td>
                                        <td><span class="text-white bg-success rounded-circle"><i data-feather="check" class="icon-sm"></i></span> approved</td>
                                        <td>01 jul 2023</td>
                                        <td>30 jun 2024</td>
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
            <nav class="page-breadcrumb">
                <h4>Contracts</h4>
            </nav>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Include in Emails</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tim_Bajaj</td>
                                        <td>Tim_Bajaj</td>
                                        <td> 6 Chan st Belconnen</td>
                                        <td> <span class="text-white bg-success rounded-circle"><i data-feather="check" class="icon-sm" ></i></span> approved</td>
                                        <td>01 jul 2023</td>
                                        <td>30 jun 2024</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <span class="text-muted d-flex align-items-center justify-content-center mt-3"> NO Record Found</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('crud.partials.delete_user_modal')

@endsection

@section('scripts')
    @vite('resources/js/app.js')
    @vite('resources/js/datatables.js')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var userId = button.getAttribute('data-userid');
                var form = deleteModal.querySelector('#deleteForm');
                var currentPage = '{{ request()->get('page', 1) }}';
                form.action = '{{ url("/clients") }}/' + userId + '?page=' + currentPage;
            });
        });
    </script>

@endsection
