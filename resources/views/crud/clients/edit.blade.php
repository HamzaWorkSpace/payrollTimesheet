{{-- resources/views/crud/clients/edit.blade.php --}}
@extends('admin.dashboard')

@section('title', 'Edit Client')

@section('admin')
    <div class="main-wrapper">
        <!-- partial:partials/_sidebar.html -->

        <!-- partial -->

        <div class="page-wrapper">

            <div class="page-content">
                <nav class="page-breadcrumb">
                    <h4 class="">Edit Client</h4>
                </nav>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('clients.update', $client->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-8">
                        <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                            <div class="col-12 d-flex justify-content-between">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                        <span class="text-white bg-black rounded-circle px-1"> 1 </span>Client Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-line-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                        <span class="text-white bg-black rounded-circle px-1"> 2 </span>Schedule
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div>
                    <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                            <div class="row">
                                <div class="col-lg-8 col-8 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Summary</label>
                                                <input id="search" class="form-control" name="search" type="search" placeholder="Search by Name">
                                            </div>
                                            <div class="mb-3">
                                                <input id="name" class="form-control" name="name" type="text" placeholder="Name*" value="{{ old('name', $client->name) }}">
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input id="abn" class="form-control" name="ABN" type="text" placeholder="ABN*" value="{{ old('ABN', $client->ABN) }}">
                                                @error('ABN')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select class="form-select" name="invoice_date_type" id="invoiceDateType">
                                                            <option selected disabled class="text-muted">Invoice Date Type</option>
                                                            <option value="Option 1" {{ old('invoice_date_type', $client->invoice_date_type) == 'Option 1' ? 'selected' : '' }}>Option 1</option>
                                                            <option value="Option 2" {{ old('invoice_date_type', $client->invoice_date_type) == 'Option 2' ? 'selected' : '' }}>Option 2</option>
                                                            <option value="Option 3" {{ old('invoice_date_type', $client->invoice_date_type) == 'Option 3' ? 'selected' : '' }}>Option 3</option>
                                                            <option value="Option 4" {{ old('invoice_date_type', $client->invoice_date_type) == 'Option 4' ? 'selected' : '' }}>Option 4</option>
                                                        </select>
                                                    </div>
                                                    @error('invoice_date_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select class="form-select" name="payment_terms" id="paymentTerms">
                                                            <option selected disabled class="text-muted">Payment Terms (days)</option>
                                                            <option value="1" {{ old('payment_terms', $client->payment_terms) == '1' ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ old('payment_terms', $client->payment_terms) == '2' ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ old('payment_terms', $client->payment_terms) == '3' ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ old('payment_terms', $client->payment_terms) == '4' ? 'selected' : '' }}>4</option>
                                                        </select>
                                                    </div>
                                                    @error('payment_terms')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select class="form-select" name="another_option" id="anotherOption">
                                                            <option selected disabled class="text-muted">Disabled</option>
                                                            <option value="Option 1" {{ old('another_option', $client->another_option) == 'Option 1' ? 'selected' : '' }}>Option 1</option>
                                                            <option value="Option 2" {{ old('another_option', $client->another_option) == 'Option 2' ? 'selected' : '' }}>Option 2</option>
                                                            <option value="Option 3" {{ old('another_option', $client->another_option) == 'Option 3' ? 'selected' : '' }}>Option 3</option>
                                                            <option value="Option 4" {{ old('another_option', $client->another_option) == 'Option 4' ? 'selected' : '' }}>Option 4</option>
                                                        </select>
                                                    </div>
                                                    @error('another_option')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select class="form-select" name="invoice_date_type_2" id="invoiceDateType2">
                                                            <option selected disabled class="text-muted">Invoice Date Type</option>
                                                            <option value="Option 1" {{ old('invoice_date_type_2', $client->invoice_date_type_2) == 'Option 1' ? 'selected' : '' }}>Option 1</option>
                                                            <option value="Option 2" {{ old('invoice_date_type_2', $client->invoice_date_type_2) == 'Option 2' ? 'selected' : '' }}>Option 2</option>
                                                            <option value="Option 3" {{ old('invoice_date_type_2', $client->invoice_date_type_2) == 'Option 3' ? 'selected' : '' }}>Option 3</option>
                                                            <option value="Option 4" {{ old('invoice_date_type_2', $client->invoice_date_type_2) == 'Option 4' ? 'selected' : '' }}>Option 4</option>
                                                        </select>
                                                    </div>
                                                    @error('invoice_date_type_2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select class="form-select" name="invoice_date_type_3" id="invoiceDateType3">
                                                            <option selected disabled class="text-muted">Invoice Date Type</option>
                                                            <option value="Option 1" {{ old('invoice_date_type_3', $client->invoice_date_type_3) == 'Option 1' ? 'selected' : '' }}>Option 1</option>
                                                            <option value="Option 2" {{ old('invoice_date_type_3', $client->invoice_date_type_3) == 'Option 2' ? 'selected' : '' }}>Option 2</option>
                                                            <option value="Option 3" {{ old('invoice_date_type_3', $client->invoice_date_type_3) == 'Option 3' ? 'selected' : '' }}>Option 3</option>
                                                            <option value="Option 4" {{ old('invoice_date_type_3', $client->invoice_date_type_3) == 'Option 4' ? 'selected' : '' }}>Option 4</option>
                                                        </select>
                                                    </div>
                                                    @error('invoice_date_type_3')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input id="contractName" class="form-control" name="contract_name" type="text" placeholder="Contract Name*" value="{{ old('contract_name', $client->contract_name) }}">
                                                @error('contract_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input id="email" class="form-control" name="email" type="email" placeholder="Email*" value="{{ old('email', $client->email) }}">
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <textarea id="notes" class="form-control" name="notes" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars.">{{ old('notes', $client->notes) }}</textarea>
                                                @error('notes')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 d-flex justify-content-end">
                                                <input class="btn btn-primary" type="submit" value="Update Client">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="contact-line-tab">
                            <nav class="page-breadcrumb">
                            </nav>
                            <div class="row">
                                <div class="col-lg-8 col-8 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="my-3">Invoice Schedule</h4>
                                            <div class="mb-3">
                                                <input id="schedule" class="form-control" name="schedule" type="search" placeholder="Schedule" value="{{ old('schedule', $client->schedule) }}">
                                            </div>
                                            <div class="mb-3">
                                                <input id="abn_schedule" class="form-control" name="abn_schedule" type="text" placeholder="ABN*" value="{{ old('abn_schedule', $client->abn_schedule) }}">
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select class="form-select" name="frequency" id="frequency">
                                                            <option selected disabled class="text-muted">Frequency</option>
                                                            <option value="Option 1" {{ old('frequency', $client->frequency) == 'Option 1' ? 'selected' : '' }}>Option 1</option>
                                                            <option value="Option 2" {{ old('frequency', $client->frequency) == 'Option 2' ? 'selected' : '' }}>Option 2</option>
                                                            <option value="Option 3" {{ old('frequency', $client->frequency) == 'Option 3' ? 'selected' : '' }}>Option 3</option>
                                                            <option value="Option 4" {{ old('frequency', $client->frequency) == 'Option 4' ? 'selected' : '' }}>Option 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select class="form-select" name="start" id="start">
                                                            <option selected disabled class="text-muted">Start</option>
                                                            <option value="Option 1" {{ old('start', $client->start) == 'Option 1' ? 'selected' : '' }}>Option 1</option>
                                                            <option value="Option 2" {{ old('start', $client->start) == 'Option 2' ? 'selected' : '' }}>Option 2</option>
                                                            <option value="Option 3" {{ old('start', $client->start) == 'Option 3' ? 'selected' : '' }}>Option 3</option>
                                                            <option value="Option 4" {{ old('start', $client->start) == 'Option 4' ? 'selected' : '' }}>Option 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <textarea id="schedule_notes" class="form-control" name="schedule_notes" maxlength="100" rows="8" placeholder="This textarea has a limit of 100 chars.">{{ old('schedule_notes', $client->schedule_notes) }}</textarea>
                                            </div>
                                            <div class="mb-3 d-flex justify-content-end">
                                                <input class="btn btn-primary" type="submit" value="Update Client">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/app.js')
@endsection
