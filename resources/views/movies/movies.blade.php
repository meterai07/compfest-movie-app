@extends('movies.layouts.main')

@section('title', ' Movies')

@section('content')
    <div class="mx-auto p-4 bg-slate-950">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($movies as $movie)
                <a href="/movies/details/{{ $movie->id }}/{{ $movie->movie_id }}">
                    <div class="lg:max-h-96 md:max-h-48 sm:max-h-24 lg:h-96 md:h-48 sm:h-24 bg-gray-100 p-4 rounded-xl flex flex-col justify-start"
                        style="background: url('{{ asset($movie->poster_url) }}'); background-size: cover;">
                        <h2 class="text-2xl font-bold text-white">{{ $movie->title }}</h2>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="p-4 mt-4">
            {{ $movies->links('pagination::tailwind') }}
        </div>
    </div>
@endsection


