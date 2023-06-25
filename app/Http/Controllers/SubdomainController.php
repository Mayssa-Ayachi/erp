<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Packagedetails;
use Illuminate\Http\Request;

Class SubdomainController extends Controller
{
    public function store(Request $request){
        $tenant = Tenant::create(['id' => $request->subdomain]);
        $tenant->domains()->create(['domain' => $request->subdomain .'.localhost']);
        $tenant->tenantpackages()->create(['tenant_package' => $request->input('package')]);
        return back();
    }

    public function showForm()
    {
        $Package = Packagedetails::all(); 
        return view('subdomain', ['package' => $Package]);
    }

    public function showpage()
    {
        return view('subdomain');
    }
}