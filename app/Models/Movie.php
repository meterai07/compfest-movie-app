<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'movie_id',
        'title',
        'description',
        'release_date',
        'poster_url',
        'age_rating',
        'ticket_price',
    ];

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
