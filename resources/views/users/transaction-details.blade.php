@extends('users.layouts.main')

@section('title', ' History')

<x-navbar />
@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Transaction History</h1>
    <ul class="space-y-4">
        @foreach ($transactionHistory as $transaction)
            <li class="flex justify-between items-center bg-white shadow-md rounded p-4">
                <div>
                    <p class="text-lg font-bold">{{ $transaction->movie_id }}</p>
                    <p class="text-lg">{{ $transaction->total_amounts }}</p>
                    <p class="text-gray-500">Booked By: {{ $user->name }} | {{ $transaction->created_at }}</p>
                </div>
                <div>
                    <a href="/deletetransaction/{{ $transaction->id }}" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded">Cancel</a>
                    <a href="/transactiondetailshistory/{{ $transaction->id }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded">View Details</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>


@endsection
