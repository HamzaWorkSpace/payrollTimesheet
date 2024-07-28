@extends('admin.dashboard')

@section('title', 'Edit Employee')

@section('admin')

    <div class="container mt-4 pt-5">
        <nav class="flex justify-between items-center">
            <div class="row">
                <div class="col-md-6">
                    <h4>Edit Employee</h4>
                </div>
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-1">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-employeeid="{{ $employee->id }}"><i data-feather="trash-2" class="feather feather-edit" ></i></button>
                </div>
            </div>
        </nav>

        <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id, 'page' => $currentPage]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $employee->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $employee->username }}">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $employee->email }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Mobile Number</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $employee->phone }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Employee Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>
    @include('crud.partials.delete_employee_modal')
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var employeeId = button.getAttribute('data-employeeid');
                var form = deleteModal.querySelector('#deleteForm');
                var currentPage = '{{ request()->get('page', 1) }}';
                form.action = '{{ url("/employees") }}/' + employeeId + '?page=' + currentPage;
            });
        });
    </script>
@endsection
