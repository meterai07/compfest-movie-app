<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use GuzzleHttp\Client;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://seleksi-sea-2023.vercel.app/api/movies');

        foreach (json_decode($response->getBody()->getContents()) as $movie) {
            Movie::updateOrCreate(
                [
                    'movie_id' => $movie->id + 1,
                    'title' => $movie->title,
                    'description' => $movie->description,
                    'release_date' => $movie->release_date,
                    'poster_url' => $movie->poster_url,
                    'age_rating' => $movie->age_rating,
                    'ticket_price' => $movie->ticket_price,
                ]
            );
        }

        return view('movies.movies', [
            'movies' => Movie::paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie, Request $request)
    {   
        $movieDetails = $movie::where('id', $request->id)->where('movie_id', $request->movie_id)->first();
        $movieHistoryTransactionID = Transaction::where('post_id', $request->id)->where('movie_id', $request->movie_id)->get('id');

        $bookedSeat = [];
        foreach ($movieHistoryTransactionID as $movieHistoryTransaction) {
            $bookedSeat[] = TransactionDetail::where('transaction_id', $movieHistoryTransaction->id)->get('seat_id');
        }

        return view('movies.details', [
            'movie' => $movieDetails,
            'bookedSeat' => $bookedSeat,
        ]);
    }
}
