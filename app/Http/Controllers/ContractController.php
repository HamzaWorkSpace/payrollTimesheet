<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with(['client', 'user', 'manager'])->orderBy('id', 'desc')->paginate(10);
        return view('crud.contracts.index', compact('contracts'));
    }

    public function create()
    {
        $clients = Client::all();
        $users = User::all();
        $employees = User::where('role', 'manager')->get();
        return view('crud.contracts.create', compact('clients', 'users', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'nullable|exists:clients,id',
            'user_id' => 'nullable|exists:users,id',
            'manager_id' => 'nullable|exists:users,id',
        ]);

        Contract::create($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }

    public function show($id)
    {
        $contract = Contract::with(['client', 'user', 'manager'])->findOrFail($id);
        return view('crud.contracts.show', compact('contract'));
    }

    public function edit($id)
    {
        $contract = Contract::with(['client', 'user', 'manager'])->findOrFail($id);
        $clients = Client::all();
        $users = User::where('role', 'user')->get();
        $employees = User::where('role', 'manager')->get();
        $selectedClient = $contract->client_id;
        $selectedUser = $contract->user_id;
        $selectedManager = $contract->manager_id;
        return view('crud.contracts.create', compact('contract', 'clients', 'users', 'employees', 'selectedClient', 'selectedUser', 'selectedManager'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'nullable|exists:clients,id',
            'user_id' => 'nullable|exists:users,id',
            'manager_id' => 'nullable|exists:users,id',
        ]);

        $contract = Contract::findOrFail($id);
        $contract->update($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contract updated successfully.');
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully.');
    }
}
