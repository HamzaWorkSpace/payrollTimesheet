<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = User::where('role', 'manager')->orderBy('id', 'desc')->paginate(10);
        return view('crud.employee.list', compact('employees'));
    }

    public function create(): View
    {
        return view('crud.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric',
            'status' => 'required|in:active,inactive', // Ensure status is either 'active' or 'inactive'
            'contract' => 'string|nullable',
        ]);

        $employee = new User();
        $employee->name = $request->input('name');
        $employee->username = $request->input('username');
        $employee->email = $request->input('email');
        $employee->password = bcrypt($request->password);
        $employee->phone = $request->input('phone');
        $employee->status = $request->input('status'); // Ensure it's 'active' or 'inactive'
        $employee->role = 'manager'; // Ensure the role is set to 'manager'
        $employee->save();

        return redirect()->route('employees.index', ['page' => 1])->with('success', 'Employee created successfully.');
    }
    public function edit(User $employee, Request $request): View
    {
        $currentPage = $request->input('page', 1);
        return view('crud.employee.edit', compact('employee', 'currentPage'));
    }

    public function update(Request $request, User $employee)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $employee->id,
            'email' => 'required|email|unique:users,email,' . $employee->id,
            'password' => 'sometimes|nullable',
            'phone' => 'required|numeric',
            'status' => 'required|in:active,inactive',
            'contract' => 'string|nullable',
        ]);

        $employee->name = $request->input('name');
        $employee->username = $request->input('username');
        $employee->email = $request->input('email');

        if ($request->filled('password')) {
            $employee->password = bcrypt($request->password);
        }

        $employee->phone = $request->input('phone');
        $employee->status = $request->input('status');
        $employee->save();

        $currentPage = $request->input('page', 1);
        return redirect()->route('employees.index', ['page' => $currentPage])->with('success', 'Employee edited successfully.');
    }


    public function destroy(User $employee, Request $request)
    {
        try {
            $employee->delete();
        } catch (\Exception $e) {
            return redirect()->route('employees.index', ['page' => $request->input('page', 1)])->with('error', 'Failed to delete employee: ' . $e->getMessage());
        }

        $page = $request->input('page', 1);
        return redirect()->route('employees.index', ['page' => $page])->with('success', 'Employee deleted successfully.');
    }
}
