<!-- Top Bar -->
<div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b pb-4 gap-4 md:gap-0">
    
    <!-- Left: Title -->
    <div class="flex items-center w-full md:w-auto justify-center md:justify-start">
        <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-center md:text-left">
            @yield('title' , 'Page Name')
        </h1>
    </div>

    <!-- Right: Search, Notification & Profile -->
    <div class="flex items-center gap-3 lg:gap-4 w-full md:w-auto justify-center md:justify-end flex-wrap">
        
        <!-- Search -->
        <div class="relative w-full sm:w-60 md:w-72">
            <input type="text" placeholder="Search for anything..." 
                   class="border border-gray-300 rounded-lg pl-8 lg:pl-10 pr-4 py-2 w-full text-sm focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 lg:w-5 lg:h-5 absolute left-2 lg:left-3 top-2.5 text-gray-400" 
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z" />
            </svg>
        </div>

        <!-- Notification -->
        <div class="border p-1 text-blue-600 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
                 fill="none" stroke="currentColor" stroke-width="1.5" 
                 stroke-linecap="round" stroke-linejoin="round" 
                 class="w-5 h-5 lg:w-6 lg:h-6">
                <title>Bell</title>
                <path d="M15 17h5l-1.5-1.5a6.5 6.5 0 0 1-1.9-4.6V10a5.6 5.6 0 1 0-11.2 0v.9c0 1.7-.7 3.3-1.9 4.6L2 17h5" />
                <path d="M9.5 17a2.5 2.5 0 0 0 5 0" />
            </svg>
        </div>

        <!-- Profile -->
        <div class="relative">
            <button id="profileBtn" class="flex items-center gap-2 focus:outline-none">
            <img src="{{ asset(Auth::user()->user_pic) ?? asset('assets/images/image.png') }}" alt="Profile"
                    class="w-14 h-14 rounded-lg object-cover">                <div class="hidden sm:block text-left">
                    <p class="font-semibold text-sm">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ ucfirst(Auth::user()->roles->first()->name ?? 'User') }}</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="w-4 h-4 text-gray-400" fill="none" 
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                <div class="py-1">
                    <a href="{{ route('users.myprofile') }}" 
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    profileBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        profileDropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', () => {
        profileDropdown.classList.add('hidden');
    });
</script>
@endpush
