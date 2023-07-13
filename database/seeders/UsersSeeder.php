<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 't.mrr39@gmail.com',
            'birth_date' => '1999-06-21',
            'password' => bcrypt('password'),
            'amounts' => 1000,
        ]);
    }
}
