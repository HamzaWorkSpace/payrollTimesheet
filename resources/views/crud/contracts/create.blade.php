{{-- resources/views/crud/user/create.blade.php --}}
@extends('admin.dashboard')

@section('title', 'Add Client')

@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <h4>Create Contract</h4>
        </nav>
        <div class="col-10">
            <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-line-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        <span class="text-white bg-black rounded-circle px-1">1</span> Client Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-line-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        <span class="text-white bg-black rounded-circle px-1">2</span> Employee Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">
                        <span class="text-white bg-black rounded-circle px-1">3</span> Contracts Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">
                        <span class="text-white bg-black rounded-circle px-1">4</span> Rates
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-line-tab" data-bs-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">
                        <span class="text-white bg-black rounded-circle px-1">5</span> Additional Clauses
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content mt-3" id="lineTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                <div class="row">
                    <div class="col-lg-10 col-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mt-2">Client Details</h4>
                                <form id="signupForm">
                                    <div class="mb-3">
                                        <label for="service1" class="form-label text-muted mb-0">
                                            <small>Employee*</small>
                                        </label>
                                        <select class="form-select select2" name="employee_id" id="employee">
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Is invoicing to a client required ?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender_radio" id="yes">
                                                <label class="form-check-label" for="yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender_radio" id="no">
                                                <label class="form-check-label" for="no">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="service2" class="form-label text-muted mb-0">
                                            <small>Clients*</small>
                                        </label>
                                        <select class="form-select select2" name="client_id" id="client">
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Clients Invoice Emails</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                <label class="form-check-label" for="checkInline1">Generate Sales Invoice</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="service1" class="form-label text-muted mb-0">
                                            <small>Invoice Schedule</small>
                                        </label>
                                        <select class="form-select" name="age_select" id="service1">
                                            <option selected disabled>Invoice Schedule</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label text-muted mb-0">
                                            <small>Purchase Owner</small>
                                        </label>
                                        <input id="name" class="form-control" name="name" type="text">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <input class="btn btn-primary me-3" type="submit" value="Cancel">
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="contact-line-tab">
                <div class="row">
                    <div class="col-lg-10 col-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form id="signupForm">
                                    <nav class="page-breadcrumb">
                                        <h5>Employee Details</h5>
                                    </nav>
                                    <div class="row my-3">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Employment Basis*</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Contract Template</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <select class="form-select select2" name="employee_id" id="employee">
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="ageSelect" class="form-label text-muted mb-0">
                                                <small>Account Manager</small>
                                            </label>
                                            <select class="form-select" name="age_select" id="ageSelect">
                                                <option selected disabled class="text-muted">Tim Bajaj</option>
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                                <option>Option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <select class="form-select" name="age_select" id="ageSelect">
                                                <option selected disabled class="text-muted">ABC*</option>
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                                <option>Option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" placeholder="Notes"></textarea>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end">
                                        <input class="btn btn-primary me-3" type="submit" value="Back">
                                        <input class="btn btn-primary" type="submit" value="Next">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-line-tab">
                <div class="row">
                    <div class="col-lg-10 col-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form id="signupForm">
                                    <h4>Contract Details</h4>
                                    <div class="row my-3">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <div class="input-group flatpickr" id="flatpickr-date">
                                                    <input type="text" class="form-control" placeholder="Select date" data-input>
                                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Pay Schedule*</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Timesheet Type</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Tim Bajaj</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <input id="abn" class="form-control" name="abn" type="name" placeholder="Place of Employment">
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">ABC*</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" placeholder="Position description"></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <input id="abn" class="form-control" name="abn" type="name" placeholder="Award*">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" placeholder="Details"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <textarea id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" placeholder="Contract Conditions"></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <input id="abn" class="form-control" name="abn" type="name" placeholder="Total Contract Unit">
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end">
                                        <input class="btn btn-primary me-3" type="submit" value="Back">
                                        <input class="btn btn-primary" type="submit" value="Next">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-line-tab">
                <div class="row">
                    <div class="col-lg-10 col-10 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form id="signupForm">
                                    <h4>Rates</h4>
                                    <div class="row my-3">
                                        <div class="col-12"></div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <input id="abn" class="form-control" name="abn" type="name" placeholder="Name*">
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <div class="input-group flatpickr" id="flatpickr-date">
                                                    <input type="text" class="form-control" placeholder="Select date" data-input>
                                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Limit of Pay*</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Pay Amount*</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <select class="form-select" name="age_select" id="ageSelect">
                                                    <option selected disabled class="text-muted">Change Amount*</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end">
                                        <input class="btn btn-primary me-3" type="submit" value="Back">
                                        <input class="btn btn-primary" type="submit" value="Next">
                                    </div>
                                </form>
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
