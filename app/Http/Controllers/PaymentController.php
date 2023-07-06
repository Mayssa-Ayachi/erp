<?php

namespace App\Http\Controllers;

use App\Models\Packagedetails;
use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Http\Request;

Class PaymentController extends Controller
{
    public function store(Request $request){
        try {
        Payment::create(['tenant_id' => $request->tenant_id,
        'package' => $request->input('package'),
        'type' => $request->type,
        'paid' => $request->paid,
        'start_access' => $request->start,
        'end_access' => $request->end]);
        session()->flash('success', 'The payment has been successfully created.');
    } catch (\Exception $e) {
        session()->flash('failed', 'An error occurred while creating the payment.');
        }
        return back();
    }

    public function showpayment(){
        return view('addpayment');
    }

    /*public function showlistpayment(){
        return view('payment');
    }*/

    public function show()
    {
        $Payment = Payment::all(); 
        return view('payment', ['payment' => $Payment]);
        return view('payment');
    }

    public function showinfo()
    {
        $Package = Packagedetails::all(); 
        $Tenant = Tenant::all(); 
        return view('addpayment', ['package' => $Package, 'tenant' => $Tenant]);
    }

    public function destroy($id)
    {   try {
        $Payment = Payment::findOrFail($id);
        $Payment->delete();
        session()->flash('success', 'The payment has been successfully created.');
        return redirect()->back();
    } catch (\Exception $e) {
        session()->flash('failed', 'An error occurred while creating the payment.');
        return redirect()->back();
        }
    }
}