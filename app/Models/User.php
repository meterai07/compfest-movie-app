<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'password',
        'amounts',
    ];

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
