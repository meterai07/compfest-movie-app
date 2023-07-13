@extends('movies.layouts.main')

@section('title', ' Details')

@section('content')
<div class="mx-auto" style="background: url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80'); background-repeat: no-repeat; background-size: cover; background-position: center; ">
        <div class="lg:mx-40 md:mx-20 mx-10 lg:flex lg:justify-between gap-4 p-4 rounded-lg shadow-lg">
            <div class="rounded-lg flex justify-center items-center lg:w-1/2">
                <img src="{{ asset($movie->poster_url) }}" alt="{{ $movie->title }} picture" class="rounded-lg">
            </div>

            <div class="p-10 bg-slate-900 lg:w-1/2">
                <h2 class="text-white text-4xl font-bold mb-2">{{ $movie->title }}</h2>
                <p class="text-gray-200">Release date: {{ $movie->release_date }}</p>
                <p class="mb-2 text-gray-200">Age Rating: {{ $movie->age_rating }}</p>
                <p class="mb-4 text-gray-100">{{ $movie->description }}</p>
                <div class="w-auto bg-red-800 rounded-3xl flex justify-between items-center text-center">
                    <p class="px-4 py-2 text-white">Ticket Price: {{ $movie->ticket_price }} </p>
                    <a href="#seat-arrangement"
                        class="font-bold h-full rounded-r-3xl bg-black text-white px-4 py-5 shadow-lg hover:bg-white hover:text-black transition-colors duration-300">Book
                        Now</a>
                </div>
            </div>
        </div>


        <div class="mt-4 lg:mx-40 md:mx-20 ">
            <h2 class="text-2xl font-bold mb-1 text-center text-white" id="seat-arrangement">Seating Arrangement</h2>
            <p class="text-center mb-4 text-sm text-gray-500">Note: Once a seat is booked, it cannot be selected again.</p>

            <form action="/transaction" method="post">
                @csrf
                <input type="hidden" name="post_id" id="post_id" value="{{ $movie->id }}">
                <input type="hidden" name="movie_id" id="movie_id" value="{{ $movie->movie_id }}">
                <div class="grid grid-cols-9 gap-4 p-4 bg-slate-600 rounded-lg mx-10">
                    @for ($row = 1; $row <= 8; $row++)
                        @for ($col = 1; $col <= 9; $col++)
                            @php
                                $seatId = chr($row + 64) . $col;
                                $isSeatTaken = false;
                            @endphp

                            @foreach ($bookedSeat as $seats)
                                @foreach ($seats as $seat)
                                    @if ($seat->seat_id === $seatId)
                                        @php $isSeatTaken = true; @endphp
                                    @break

                                    2
                                @endif
                            @endforeach
                        @endforeach

                        @if ($col === 5)
                            {{-- Empty walkway --}}
                            <div class="p-4"></div>
                        @else
                            <div class="hover:cursor-pointer seat bg-{{ $isSeatTaken ? 'white pointer-events-none' : 'blue-400' }} rounded-lg text-center lg:w-16 flex justify-center items-center hover:text-white transition-colors duration-300"
                                id="{{ $seatId }}">
                                <span>{{ $seatId }}</span>
                            </div>
                        @endif
                    @endfor
                @endfor

            </div>

            <div class="flex justify-center mt-4">
                <div id="selected-seats" class="bg-slate-300 absolute"></div>
                <input type="hidden" name="selected_seats" id="selected-seats-input">
    
                <button type="submit"
                    class="mb-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-600 transition-colors duration-300">Book
                    Now</button>
            </div>
        </form>
    </div>
</div>

<div id="selected-seats" class="bg-slate-300 absolute">

</div>
@endsection
