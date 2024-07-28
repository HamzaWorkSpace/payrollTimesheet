<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', 'user')->orderBy('id', 'desc')->paginate(15);
        return view('crud.user.list', compact('users'));
    }

    public function create(): View
    {
        return view('crud.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric',
            'status' => 'required',
            'contract' => 'string|nullable',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);
        $user->phone = $request->input('phone');
        $user->status = $request->input('status');
        $user->save();

        return redirect()->route('admin.users.list', ['page' => 1])->with('success', 'User created successfully.');
    }

    public function edit(User $user): View
    {
        return view('crud.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable',
            'phone' => 'required|numeric',
            'status' => 'required',
            'contract' => 'string|nullable',
        ]);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->phone = $request->input('phone');
        $user->status = $request->input('status');
        $user->save();

        $currentPage = $request->input('page', 1);
        return redirect()->route('admin.users.list', ['page' => $currentPage])->with('success', 'User edited successfully.');
    }

    public function destroy(User $user, Request $request)
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return redirect()->route('admin.users.list', ['page' => $request->input('page', 1)])->with('error', 'Failed to delete user: ' . $e->getMessage());
        }

        $page = $request->input('page', 1);
        return redirect()->route('admin.users.list', ['page' => $page])->with('success', 'User deleted successfully.');
    }


    public function UserDashboard()
    {
        return view('user.index');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('user.profile_view', compact('profileData'));
    }

    public function UserProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if (!empty($request->file('photo'))) {
            $file = $request->file('photo');
            @unlink(public_path('upload/avatar/' . $data->photo));
            $ext = $request->file('photo')->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move(public_path('upload/avatar'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notify = [
            'message' => 'User Profile Updated',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notify);
    }
}
