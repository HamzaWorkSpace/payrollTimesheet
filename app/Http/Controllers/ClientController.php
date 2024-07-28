<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        try {
            $clients = Client::orderBy('created_at', 'desc')->paginate(10);
            return view('crud.clients.index', compact('clients'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to fetch clients: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('crud.clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'ABN' => 'required|numeric',
            'contract_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'invoice_date_type' => 'nullable|string|max:255',
            'payment_terms' => 'nullable|integer',
            'notes' => 'nullable|string|max:255',
        ]);

        try {
            $client = new Client();
            $client->name = $request->input('name');
            $client->ABN = $request->input('ABN');
            $client->contract_name = $request->input('contract_name');
            $client->email = $request->input('email');
            $client->invoice_date_type = $request->input('invoice_date_type');
            $client->payment_terms = $request->input('payment_terms');
            $client->notes = $request->input('notes');
            $client->save();

            return redirect()->route('clients.index')->with('success', 'Client created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to create client: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $client = Client::findOrFail($id);
            return view('crud.clients.show', compact('client'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to fetch client: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $client = Client::findOrFail($id);
            return view('crud.clients.edit', compact('client'));
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to fetch client: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'ABN' => 'required|numeric',
            'contract_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'invoice_date_type' => 'nullable|string|max:255',
            'payment_terms' => 'nullable|integer',
            'notes' => 'nullable|string|max:255',
        ]);

        try {
            $client = Client::findOrFail($id);
            $client->name = $request->input('name');
            $client->ABN = $request->input('ABN');
            $client->contract_name = $request->input('contract_name');
            $client->email = $request->input('email');
            $client->invoice_date_type = $request->input('invoice_date_type');
            $client->payment_terms = $request->input('payment_terms');
            $client->notes = $request->input('notes');
            $client->save();

            return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to update client: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to delete client: ' . $e->getMessage());
        }
    }
}
