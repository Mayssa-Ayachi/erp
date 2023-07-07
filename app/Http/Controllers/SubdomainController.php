<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Packagedetails;
use Illuminate\Http\Request;

use App\Mail\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Class SubdomainController extends Controller
{
    public function store(Request $request){
        try {
        $tenant = Tenant::create(['id' => $request->subdomain]);
        $tenant->domains()->create(['domain' => $request->subdomain .'.localhost']);
        $tenant->tenantpackages()->create(['tenant_package' => $request->input('package'),
        'tenant_email' => $request->input('email'),]);
        $adress = $request->subdomain .'.localhost:8000/users/create';
        $name = $request->subdomain;
        $package = $request->input('package');
        Mail::to($request->input('email'))->send(new Email($adress,$name,$package));
        session()->flash('success', 'The organization has been successfully created.');
        } catch (\Exception $e) {
            session()->flash('failed', 'An error occurred while creating the organization.');
        }
        return back();
    }

    public function showForm()
    {
        $Package = Packagedetails::all(); 
        return view('subdomain', ['package' => $Package]);
    }

    public function showpage()
    {
        $Package = Packagedetails::all(); 
        return view('subdomain', ['package' => $Package]);
    }
}