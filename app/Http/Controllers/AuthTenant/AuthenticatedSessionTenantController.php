<?php

namespace App\Http\Controllers\AuthTenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionTenantController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.logintenant');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //dd($request);
        //$request->authenticateTenant();

        //$request->session()->regenerate();

        return redirect()->intended('/users/create');
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
