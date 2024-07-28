{{-- resources/views/crud/user/create.blade.php --}}
@extends('admin.dashboard')

@section('title', 'Add User')

@section('admin')
    <div class="container mt-4 pt-5">
        <nav class="flex justify-between items-center">
            <div class="row">
                <div class="col-md-6">
                    <h4>Add User</h4>
                </div>
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-1">
                    <a href="{{ route('admin.users.create') }}" class="btn pl-3 text-right me-2 bg-red-500 text-white  rounded-none  text-3xl font-bold"><i data-feather="trash-2"  class=""></i></a>
                </div>
            </div>
        </nav>

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
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
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">User Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Not Active" {{ old('status') == 'Not Active' ? 'selected' : '' }}>Not Active</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
@endsection
