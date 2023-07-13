<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Movie;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $post = Movie::where('id', $request->post_id)->where('movie_id', $request->movie_id)->first();
        $selectedSeats = json_decode($request->selected_seats, true);

        $birthDate = Carbon::parse($user->birth_date);
        $currentDate = Carbon::now();
        $age = $birthDate->diffInYears($currentDate);

        if ($age < $post->age_rating) {
            return redirect('/movies')->with('error', 'You are not old enough to watch this movie!');
        }

        if (count($selectedSeats) > 6) {
            return redirect('/movies')->with('error', 'The maximum number of tickets that can be booked in
            one transaction is 6 tickets.');
        }

        if ($user->amounts < $post->ticket_price * count($selectedSeats)) {
            return redirect('/movies')->with('error', 'Your amounts is not enough!');
        }

        DB::transaction(function() use ($user, $request, $post, $selectedSeats) {
            $user->update([
                'amounts' => $user->amounts - $post->ticket_price * count($selectedSeats),
            ]);

            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->post_id,
                'movie_id' => $request->movie_id,
                'total_amounts' => $post->ticket_price * count($selectedSeats),
            ]);

            foreach ($selectedSeats as $selectedSeat) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'seat_id' => $selectedSeat,
                ]);
            }
        });

        return redirect('/movies')->with('success', 'Transaction success!');
    }


    public function destroy(Transaction $transaction, Request $request)
    {
        $transaction = Transaction::where('id', $request->id)->first();

        DB::transaction(function() use ($transaction) {
            $transactionDetails = TransactionDetail::where('transaction_id', $transaction->id)->get();

            foreach ($transactionDetails as $transactionDetail) {
                $transactionDetail->delete();
            }

            $user = User::where('id', auth()->user()->id)->first();
            $user->update([
                'amounts' => $user->amounts + $transaction->total_amounts,
            ]);
        });

        $transaction->delete();

        return redirect('/transactiondetails')->with('success', 'Transaction has been successfully deleted!');
    }
}
