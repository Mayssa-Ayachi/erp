<?php

namespace App\Http\Controllers;

use App\Models\Userstenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Class UserstenantController extends Controller
{
    public function create(){
        return view('userstenant');
    }

    public function store(Request $request){
        Userstenant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
   
        return back();
    }

    public function show(){
        $User = Userstenant::all(); 
        return view('userslist', ['user' => $User]);
        return view('userslist');
    }

    
    public function destroy($id)
    {   try {
        $User = Userstenant::findOrFail($id);
        $User->delete();
        session()->flash('success', 'The user has been successfully created.');
        return redirect()->back();
    } catch (\Exception $e) {
        session()->flash('failed', 'An error occurred while creating the user.');
        return redirect()->back();
        }
    }}