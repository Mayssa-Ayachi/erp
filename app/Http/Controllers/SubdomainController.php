<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Packagedetails;
use Illuminate\Http\Request;

Class SubdomainController extends Controller
{
    public function store(Request $request){
        try {
        $tenant = Tenant::create(['id' => $request->subdomain]);
        $tenant->domains()->create(['domain' => $request->subdomain .'.localhost']);
        $tenant->tenantpackages()->create(['tenant_package' => $request->input('package'),
        'tenant_email' => $request->input('email'),]);
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