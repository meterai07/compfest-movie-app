<?php

namespace Database\Seeders;

use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
    }
}
