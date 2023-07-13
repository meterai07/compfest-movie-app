<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'post_id',
        'movie_id',
        'total_amounts',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function TransactionDetail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
