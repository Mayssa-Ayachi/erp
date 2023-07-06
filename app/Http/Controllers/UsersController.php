<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

Class UsersController extends Controller
{
    public function create(){
        return view('users');
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role,
        ]);
   
        return back();
    }

    public function show(){
        $User = User::all(); 
        return view('userslist', ['user' => $User]);
        return view('userslist');
    }

    
    public function destroy($id)
    {   try {
        $User = User::findOrFail($id);
        $User->delete();
        session()->flash('success', 'The user has been successfully created.');
        return redirect()->back();
    } catch (\Exception $e) {
        session()->flash('failed', 'An error occurred while creating the user.');
        return redirect()->back();
        }
    }}