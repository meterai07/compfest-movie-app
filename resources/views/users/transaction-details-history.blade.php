@extends('users.layouts.main')

@section('title', ' History')

<x-navbar />
@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Transaction Detail</h1>
    <ul class="space-y-4">
        @foreach ($transactionDetail as $transaction)
            <li class="border p-4 rounded">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm text-gray-500">{{ $transaction['created_at'] }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-gray-700">Seat ID: {{ $transaction['seat_id'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>


@endsection
