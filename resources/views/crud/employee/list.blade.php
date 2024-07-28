@extends('admin.dashboard')

@section('title', 'List Users')

@section('styles')
    @vite('resources/css/app.css')
    @vite('resources/css/datatables.css')
@endsection

@section('admin')
    <div class="page-content" >
        <nav class="flex justify-between items-center">
            <div class="row">
                <div class="col-md-6">
                    <h4>Employees</h4>
                </div>
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-1">
                    <a href="{{ route('employees.create') }}" class="btn pl-3 text-right me-2 bg-white border border-black rounded-none  text-3xl font-bold"><i data-feather="plus" class=""></i></a>
                </div>
            </div>
        </nav>
        <div class="row mt-2">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="employee-table">
                                <thead class="text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Mobile No.</th>
                                    <th>Active</th>
                                    <th>Manage Contract</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->username }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->status }}</td>
                                        <td><i data-feather="external-link" class="me-2 icon-sm" ></i></td>

                                        <td>
                                            <a href="{{ route('employees.edit', ['employee' => $employee->id, 'page' => request()->get('page', 1)]) }}" class="btn"><i data-feather="edit" class="feather feather-edit" ></i></a>
                                            {{--                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="{{ $employee->id }}">Delete</button>--}}
                                        </td>
                                    </tr>
                                    {{--                                <tr>{{$employee}}</tr>--}}
                                    {{--                                <br/>--}}
                                    {{--                                <br/>--}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $employees->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@section('scripts')
    @vite('resources/js/app.js')
    @vite('resources/js/datatables.js')
@endsection




