<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Null_;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login')->with('Error', 'please login first.');;
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        if ($request->user()->role == 'admin') {
            $url = '/admin/dashboard';
        } elseif ($request->user()->role == 'user') {
            $url = '/user/dashboard';

        } elseif ($request->user()->role == 'manager') {
            $url = '/manager/dashboard';
        }
        $notify = [
            'message' => 'You\'re Loged in!  ⚡️',
            'alert-type' => 'success',
        ];

        return redirect()->intended($url)->with($notify);
    }

    public function redirect(){

        if (Auth::user() === null) {
            return redirect()->intended('/');
        }

        if (Auth::user()->role == 'admin') {
            $url = '/admin/dashboard';
        } elseif (Auth::user()->role == 'user') {
            $url = '/user/dashboard';

        } elseif (Auth::user()->role == 'manager') {
            $url = '/manager/dashboard';
        }

        return redirect()->intended($url);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
