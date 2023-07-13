@extends('users.layouts.main')

@section('title', ' Login')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="p-8 shadow-2xl rounded-3xl lg:flex">
        <img class="lg:w-72" src="images/image/loginPicture.svg" alt="">
        <div class="w-80 mx-5">
            <h1 class="text-2xl font-bold mb-4">Login Movie App</h1>
            <form action="/login" method="post" class="bg-white">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 w-full">login</button>
                </div>
                <p class=" text-center text-xs">Doesn't have account yet?<a href="/register" class="text-blue-500 hover:underline">register now!</a></p>
            </form>
        </div>
    </div>
</div>

@endsection