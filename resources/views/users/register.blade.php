@extends('users.layouts.main')

@section('title', ' Register')

@section('content')

    <div class="flex justify-center items-center h-screen">
        <div class="p-8 shadow-2xl rounded-3xl lg:flex">
            <img class="lg:w-72" src="images/image/registerPicture.svg" alt="">
            <div class="w-80 mx-5">
                <h1 class="text-2xl font-bold mb-4">Register Movie App</h1>
                <form action="/register" method="post" class="bg-white">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block font-medium text-gray-700">Name</label>
                        <input placeholder="fill name here" type="text" name="name" id="name"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block font-medium text-gray-700">Email</label>
                        <input placeholder="fill email here" type="email" name="email" id="email"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                    </div>

                    {{-- birth date form --}}
                    <div class="mb-4">
                        <label for="birth_date" class="block font-medium text-gray-700">Birth Date</label>
                        <input placeholder="fill birth date here" type="date" name="birth_date" id="birth_date"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block font-medium text-gray-700">Password</label>
                        <input placeholder="fill password here" type="password" name="password" id="password"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="block font-medium text-gray-700">Password
                            Confirmation</label>
                        <input placeholder="confirm your password" type="password" name="password_confirmation"
                            id="password_confirmation"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 w-full">Register</button>
                    </div>
                    <p class=" text-center text-xs">Already have account?<a href="/login"
                            class="text-blue-500 hover:underline">login now!</a></p>
                </form>

            </div>

        @endsection
