<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\User;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.payments');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        if ($request->amounts < 500000) {
            return redirect('/payment')->with('error', 'Minimum payment is Rp. 500.000');
        }
        
        $user = User::where('id', auth()->user()->id)->first();
        $newAmounts = $user->amounts + $request->amounts;

        $user->update([
            'amounts' => $newAmounts,
        ]);
    
        return redirect('/payment')->with('success', 'Your payment has been successfully added!');
    }
}
