    <!-- Top Bar -->
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <div class="flex items-center">
            <button id="menu-toggle" class="mr-4 lg:hidden text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-2xl lg:text-3xl font-bold">@yield('title' , 'Page Name')</h1>
        </div>

        <div class="flex items-center gap-2 lg:gap-4">
            <div class="relative">
                <input type="text" placeholder="Search for anything..." class="border border-gray-300 rounded-lg pl-8 lg:pl-10 pr-4 py-2 w-40 lg:w-72 text-sm focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 lg:w-5 lg:h-5 absolute left-2 lg:left-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z" />
                </svg>
            </div>
            <div class="border p-1 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 lg:w-6 lg:h-6">
                    <title>Bell</title>
                    <path d="M15 17h5l-1.5-1.5a6.5 6.5 0 0 1-1.9-4.6V10a5.6 5.6 0 1 0-11.2 0v.9c0 1.7-.7 3.3-1.9 4.6L2 17h5" />
                    <path d="M9.5 17a2.5 2.5 0 0 0 5 0" />
                </svg>
            </div>
            <div class="flex items-center gap-2">
                <img src="https://via.placeholder.com/40" class="rounded-full w-8 h-8 lg:w-10 lg:h-10" alt="">
                <div class="hidden md:block">
                    <p class="font-semibold text-sm">Alex meian</p>
                    <p class="text-xs text-gray-500">Admin</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </div>