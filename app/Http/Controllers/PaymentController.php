<?php

namespace App\Http\Controllers;

use App\Models\Packagedetails;
use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Http\Request;

Class PaymentController extends Controller
{
    public function store(Request $request){
        Payment::create(['tenant_id' => $request->tenant_id,
        'package' => $request->input('package'),
        'type' => $request->type,
        'paid' => $request->paid,
        'start_access' => $request->start,
        'end_access' => $request->end]);
        return back();
    }

    public function showpayment(){
        return view('addpayment');
    }

    public function showlistpayment(){
        return view('payment');
    }

    public function show()
    {
        $Payment = Payment::all(); 
        return view('payment', ['payment' => $Payment]);
    }

    public function showinfo()
    {
        $Package = Packagedetails::all(); 
        $Tenant = Tenant::all(); 
        return view('addpayment', ['package' => $Package, 'tenant' => $Tenant]);
    }

    public function destroy($id)
    {
        $Payment = Payment::findOrFail($id);
        $Payment->delete();

        return redirect()->back()->with('success', 'Payment deleted successfully.');
    }
}