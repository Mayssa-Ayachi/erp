<?php

namespace App\Http\Controllers;

use App\Models\Packagedetails;
use Illuminate\Http\Request;

Class PackageController extends Controller
{
    public function store(Request $request){
        Packagedetails::create(['name' => $request->package,
        'price' => $request->price,
        'description' => $request->description]);
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
}