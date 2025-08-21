<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Responsive Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    html,
    body {
        height: 100%;
    }
    </style>

</head>

<body class="bg-gray-100 ">

    <!-- Hamburger (mobile only) -->
    <button id="hamburger" class="lg:hidden fixed top-4 left-4 z-50 text-white bg-blue-600 p-2 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Dark overlay (mobile only) -->
    <div id="overlay" class="fixed inset-0 bg-black/50 hidden z-40 lg:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed h-full sm:h-auto top-0 left-0 w-64 pt-20 bg-black text-white flex flex-col
                transform -translate-x-full transition-transform duration-300 ease-in-out
                lg:static lg:translate-x-0 lg:transform-none z-50 overflow-y-auto">

        <!-- Create new project button -->
        <div class="p-4">
            <button
                class="w-full bg-gradient-to-r from-purple-500 to-blue-500 text-white py-3 px-4 rounded-xl flex items-center justify-center gap-2 font-medium">
                <span class="text-3xl text-blue-600 rounded-lg bg-white px-2 py-1">＋</span>
                Create new project
            </button>
        </div>

        <!-- Menu (your original content kept) -->
        <nav class="flex-1 px-3 space-y-2 text-sm overflow-y-auto">
            <a href="#" class="flex items-center gap-3 p-3 rounded-lg bg-white text-blue-600 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 8h7V3H3v5zM14 8h7V3h-7v5zM14 21h7v-5h-7v5zM3 21h7v-5H3v5z" />
                </svg>
                Dashboard
            </a>

            <!-- Pages -->
            <div>
                <button id="pages-toggle"
                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 w-full text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                    </svg>
                    Pages
                    <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="pages-dropdown" class="hidden pl-10 mt-1 space-y-1">
                    <a href="#" class="block py-2 text-sm text-gray-300 hover:text-white">Page 1</a>
                    <a href="#" class="block py-2 text-sm text-gray-300 hover:text-white">Page 2</a>
                    <a href="#" class="block py-2 text-sm text-gray-300 hover:text-white">Page 3</a>
                </div>
            </div>

            <!-- Transaction -->
            <div>
                <button onclick="toggleDropdown('transactionDropdown1','arrowIcon1')"
                    class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                    </svg>
                    Transaction
                    <svg id="arrowIcon1" xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="transactionDropdown1" class="hidden ml-8 mt-1 space-y-1">
                    <a href="#" class="block p-2 rounded hover:bg-white/10">Transaction 1</a>
                    <a href="#" class="block p-2 rounded hover:bg-white/10">Transaction 2</a>
                </div>
            </div>

            <!-- Users -->
            <div>
                <button onclick="toggleDropdown('usersDropdown','arrow-users')"
                    class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                    </svg>
                    Users
                    <svg id="arrow-users" xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="usersDropdown" class="hidden ml-8 mt-1 space-y-1">
                    <a href="#" class="block p-2 rounded hover:bg-white/10">All users</a>
                    <a href="#" class="block p-2 rounded hover:bg-white/10">Add new users</a>
                    <a href="#" class="block p-2 rounded hover:bg-white/10">Profile</a>
                    <a href="#" class="block p-2 rounded hover:bg-white/10">Teams</a>
                </div>
            </div>

            <!-- Clients -->
            <div>
                <button onclick="toggleDropdown('ClientsDropdown','arrow-Clients')"
                    class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                    </svg>
                    Clients
                    <svg id="arrow-Clients" xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="ClientsDropdown" class="hidden ml-8 mt-1 space-y-1">
                    <a href="#" class="block p-2 rounded hover:bg-white/10">All Clients</a>
                    <a href="#" class="block p-2 rounded hover:bg-white/10">Add new Clients</a>
                </div>
            </div>

            <!-- Static links -->
            <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12h6m-6 6h6m-6-12h6" />
                </svg>
                Resource mgmt
            </a>
            <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 16h10" />
                </svg>
                Project template
            </a>
            <a href="#" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 15l-4-4m0 0l4-4m-4 4h12" />
                </svg>
                Menu settings
            </a>
        </nav>
    </aside>

    <script>
    // Ensure DOM is ready (prevents null refs if script loads early)
    document.addEventListener('DOMContentLoaded', () => {
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        if (!hamburger || !sidebar || !overlay) return;

        // Open/close sidebar on mobile
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        // Close by overlay tap
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    });

    // Dropdowns
    function toggleDropdown(dropdownId, arrowId) {
        const dropdown = document.getElementById(dropdownId);
        const arrow = document.getElementById(arrowId);
        if (!dropdown || !arrow) return;
        dropdown.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }
    </script>
</body>

</html>