<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionDetailRequest;
use App\Http\Requests\UpdateTransactionDetailRequest;
use App\Models\Movie;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        $transactionHistory = Transaction::where('user_id', $user->id)->get()->sortByDesc('created_at');

        foreach ($transactionHistory as $transaction) {
            $transaction->movie_id = Movie::where('id', $transaction->movie_id)->first()->title;
        }

        return view('users.transaction-details', [
            'user' => $user,
            'transactionHistory' => $transactionHistory, 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionDetail $transactionDetail, Request $request)
    {
        $transactionDetail = TransactionDetail::where('transaction_id', $request->id)->get();

        return view('users.transaction-details-history', [
            'transactionDetail' => $transactionDetail,
        ]);
    }
}
