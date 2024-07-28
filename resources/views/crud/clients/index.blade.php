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
                    <h4>Clients</h4>
                </div>
                <div class="col-md-5">&nbsp;</div>
                <div class="col-md-1">
                    <a href="{{ route('clients.create') }}" class="btn pl-3 text-right me-2 bg-white border border-black rounded-none  text-3xl font-bold"><i data-feather="plus" class=""></i></a>
                </div>
            </div>
        </nav>
        <div class="row mt-2">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="clients-table">
                                <thead class="text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Contracts</th>
                                    <th>Payment Terms</th>
                                    <th>Active</th>
                                    <th>Related Contracts</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ($clients as $client)
                                    <tr>
                                        <td><a href="{{ route('clients.show', $client->id) }}">{{ $client->name }}</a></td>
                                        <td>{{ $client->contract_name }}</td>
                                        <td>{{$client->payment_terms}}</td>
                                        <td>{{ $client->active===1?'Yes':'No' }}</td>

                                        <td><i data-feather="external-link" class="me-2 icon-sm" ></i></td>
                                        <td>
                                            <a href="{{ route('clients.edit', ['client' => $client->id, 'page' => request()->get('page', 1)]) }}" class="btn"><i data-feather="edit" class="feather feather-edit" ></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $clients->links('vendor.pagination.bootstrap-5') }}
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

