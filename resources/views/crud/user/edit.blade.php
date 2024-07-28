@extends('admin.dashboard')

@section('title', 'Edit User')

@section('admin')

    <div class="container mt-4 pt-5">
        <nav class="flex justify-between items-center">
            <div class="row">
                <div class="col-md-6">
                    <h4>Edit User</h4>
                </div>
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-1">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="{{ $user->id }}"><i data-feather="trash-2" class="feather feather-edit" ></i></button>
                </div>
            </div>
        </nav>

        <form method="POST" action="{{ route('admin.users.update', ['user' => $user->id, 'page' => 1]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username }}">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}">
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
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">User Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
    @include('crud.partials.delete_user_modal')
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var userId = button.getAttribute('data-userid');
                var form = deleteModal.querySelector('#deleteForm');
                var currentPage = '{{ request()->get('page', 1) }}';
                form.action = '{{ url("/admin/users") }}/' + userId + '?page=' + currentPage;
            });
        });
    </script>
@endsection
