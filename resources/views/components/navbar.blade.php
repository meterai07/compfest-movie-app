<div id="navbar" class="text-white flex justify-between items-center p-5 h-20 bg-red-900 font-roboto gap-5">
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <div class="">
        <h1 class="text-2xl font-bold">Movie App</h1>
    </div>
    <div class="flex gap-10 font">
        <a href="/">Dashboard</a>
        <a href="/movies">Movies</a>
    </div>
    @if (auth()->check())
        <div class="flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <p>{{ auth()->user()->email }}</p>
            {{-- dropdown with the menu of payment and logout --}}
            <div class="relative">
                <button class="flex gap-1" id="dropdownButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="absolute right-0 top-10 bg-white rounded-md shadow-md w-40 hidden" id="dropdownMenu">
                    <a href="/payment"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-md hover:text-gray-900">Top
                        Up</a>
                    <a href="/transactiondetails"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-md hover:text-gray-900">History</a>
                    <a href="/logout"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-md hover:text-gray-900">Logout</a>
                </div>
            </div>
        </div>
    @else
        <a href="/login" class="flex gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg> Login</a>
    @endif
</div>
