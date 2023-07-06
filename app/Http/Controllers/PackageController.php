<?php

namespace App\Http\Controllers;
use App\Models\Tenantpackage;
use App\Models\Packagedetails;
use Illuminate\Http\Request;

Class PackageController extends Controller
{
    public function store(Request $request){
        try {
            Packagedetails::create([
                'name' => $request->package,
                'price' => $request->price,
                'description' => $request->description
            ]);
    
            session()->flash('success', 'The package has been successfully created.');
        } catch (\Exception $e) {
            session()->flash('failed', 'An error occurred while creating the package.');
        }
    
        return back();
    }

    public function showaddpackage(){
        return view('addpackages');
    }
    
    public function show()
    {
        $Package = Packagedetails::all(); 
        return view('packages', ['package' => $Package]);
    }

    public function showpage()
    {
        return view('packages');
    }

    public function destroy($id)
    {
        $Package = Packagedetails::findOrFail($id);
        $specificColumnValue = $Package->name;
        $Tenant = Tenantpackage::where('tenant_package', '=', $specificColumnValue)->get();


        if ($Tenant->isEmpty()) {
            $Package->delete();
            session()->flash('success', 'The package has been successfully created.');
            return redirect()->back();
        } else {
            session()->flash('Failed', 'There are organizations subscribed to this package.');
            return redirect()->back();
        }
    }
}