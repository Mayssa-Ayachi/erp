<?php

namespace App\Http\Controllers\AuthTenant;

use App\Http\Controllers\Controller;
use App\Models\Userstenant;

use App\Models\Tenantpackage;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
//use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Illuminate\Support\Facades\URL;

class RegisteredUsertenantController extends Controller
{
    /**
     * Display the registration view.
     */
    /*public function create(): View
    {
        return view('auth.registerTenant');
    }*/

    public function getEmailFromSubdomain()
{
    $url = URL::current(); // Obtenir l'URL actuelle

    $parsedUrl = parse_url($url); // Analyser l'URL en ses composants
    
    $subdomain = explode('.', $parsedUrl['host'], 2)[0];


    $tenant = Tenantpackage::where('tenant_id', $subdomain)->first();

    if ($tenant) {
        return $tenant->tenant_email;
    }

    return null; // ou une valeur par défaut si aucun locataire correspondant n'est trouvé
}


    public function create(): View
{
    $email =  $this->getEmailFromSubdomain();
    return view('auth.registerTenant', compact('email'));
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

        $email = $this->getEmailFromSubdomain();

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
    return redirect('/login');
    }
}
