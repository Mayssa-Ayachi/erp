<?php

namespace App\Http\Controllers\AuthTenant;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
//use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUsertenantController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.registerTenant');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Userstenant::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Userstenant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Auth::login($user);
        session()->flash('success', 'The user has been successfully created.');
    } catch (\Exception $e) {
        session()->flash('failed', 'An error occurred while creating the user.');
    }
    return redirect('/users/create');
    }
}
