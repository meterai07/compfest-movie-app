@extends('users.layouts.main')

@section('title', ' TopUp')

@section('content')
    <x-navbar />
    <div class="flex justify-center items-center h-screen">
        <div class="p-8 shadow-2xl rounded-3xl lg:flex">
            <img class="lg:w-72" src="images/image/topUp.svg" alt="">
            <div class="w-80 mx-5">
                <h1 class="text-2xl font-bold mb-4">TopUp Movie App</h1>
                <form action="/payment" method="post" class="bg-white">
                    @csrf
                    <div class="mb-4">
                        <label for="amounts" class="block font-medium text-gray-700">Amount</label>
                        <input placeholder="Rp. {{ auth()->user()->amounts }}" type="number" name="amounts" id="amounts"
                            class="w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md px-3 py-2">
                    </div>
                    <div class="mb-4">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 w-full">TopUp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection