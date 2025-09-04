        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-transition sidebar-mobile w-64 pt-20 bg-black text-white flex flex-col lg:static lg:transform-none">
            <!-- Create new project button -->
            <div class="p-4">
                <a href="{{ route('projects.create') }}" class="w-full bg-gradient-to-r from-purple-500 to-blue-500 text-white py-3 px-4 rounded-xl flex items-center justify-center gap-2 font-medium">
                    <span class="text-3xl text-blue-600 rounded-lg bg-white px-2 py-1">＋</span> Create new project
                </a>
            </div>

            <!-- Menu -->
            <nav class="flex-1 px-3 space-y-2 text-sm overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white text-blue-600' : 'hover:bg-white/10' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8h7V3H3v5zM14 8h7V3h-7v5zM14 21h7v-5h-7v5zM3 21h7v-5H3v5z" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('dashboard.hr') }}" class="flex items-center gap-3 p-3 rounded-lg {{ request()->routeIs('dashboard.hr') ? 'bg-white text-blue-600' : 'hover:bg-white/10' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8h7V3H3v5zM14 8h7V3h-7v5zM14 21h7v-5h-7v5zM3 21h7v-5H3v5z" />
                    </svg>
                    Dashboard HR/Other
                </a>

                <!-- Transaction Dropdown -->
                <div @if(request()->routeIs('transactions.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('transactionDropdown1', 'arrowIcon1')" class="dropdown-button w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 text-left @if(request()->routeIs('transactions.')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                        </svg>
                        Transaction
                        <svg id="arrowIcon1" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('transactions.')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="transactionDropdown1" class="ml-8 mt-1 space-y-1 @if(!request()->routeIs('transactions.*')) hidden @endif">
                        <a href="{{ route('transactions.index') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('transactions.index')) bg-white/10 @endif">All Transactions</a>
                        <a href="{{ route('transactions.create') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('transactions.create')) bg-white/10 @endif">Add Transaction</a>
                    </div>
                </div>

                <!-- Clients Dropdown -->
                <div @if(request()->routeIs('clients.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('ClientsDropdown', 'arrow-Clients')" class="dropdown-button w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 text-left @if(request()->routeIs('clients.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        Clients
                        <svg id="arrow-Clients" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('clients.*')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="ClientsDropdown" class="ml-8 mt-1 space-y-1 @if(!request()->routeIs('clients.*')) hidden @endif">
                        <a href="{{ route('clients.index') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('clients.index')) bg-white/10 @endif">All Clients</a>
                        <a href="{{ route('clients.add') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('clients.add')) bg-white/10 @endif">Add new Clients</a>
                    </div>
                </div>

                <!-- Users Dropdown -->
                <div @if(request()->routeIs('users.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('usersDropdown', 'arrow-users')" class="dropdown-button w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 text-left @if(request()->routeIs('users.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        Users
                        <svg id="arrow-users" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('users.*')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="usersDropdown" class="ml-8 mt-1 space-y-1 @if(!request()->routeIs('users.*')) hidden @endif">
                        <a href="{{ route('users.all') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('users.all')) bg-white/10 @endif">All users</a>
                        <a href="{{ route('users.add') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('users.add')) bg-white/10 @endif">Add new users</a>
                        <a href="{{ route('users.myprofile') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('users.myprofile')) bg-white/10 @endif">Profile</a>
                    </div>
                </div>

                <!-- Teams Dropdown -->
                <div @if(request()->routeIs('teams.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('teamsDropdown', 'arrow-teams')" class="dropdown-button w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 text-left @if(request()->routeIs('teams.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        Teams
                        <svg id="arrow-teams" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('teams.*')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="teamsDropdown" class="ml-8 mt-1 space-y-1 @if(!request()->routeIs('teams.*')) hidden @endif">
                        <a href="{{ route('teams.dashboard') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('teams.dashboard')) bg-white/10 @endif">Dashboard</a>
                        <a href="{{ route('teams.index') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('teams.index')) bg-white/10 @endif">Create & Assign</a>
                    </div>
                </div>

                <!-- Projects Dropdown -->
                <div @if(request()->routeIs('projects.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('projectsDropdown', 'arrow-projects')" class="dropdown-button w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 text-left @if(request()->routeIs('projects.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Projects
                        <svg id="arrow-projects" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('projects.*')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="projectsDropdown" class="ml-8 mt-1 space-y-1 @if(!request()->routeIs('projects.*')) hidden @endif">
                        <a href="{{ route('projects.index') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('projects.index')) bg-white/10 @endif">All Projects</a>
                        <a href="{{ route('projects.create') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('projects.create')) bg-white/10 @endif">Create Project</a>
                    </div>
                </div>

                <!-- Invoices Dropdown -->
                <div @if(request()->routeIs('invoices.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('invoicesDropdown', 'arrow-invoices')" class="dropdown-button w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 text-left @if(request()->routeIs('invoices.*')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        invoices
                        <svg id="arrow-invoices" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('invoices.*')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="invoicesDropdown" class="ml-8 mt-1 space-y-1 @if(!request()->routeIs('invoices.*')) hidden @endif">
                        <a href="{{ route('invoices.users') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('invoices.users')) bg-white/10 @endif">Generated</a>
                        <a href="{{ route('invoices.template') }}" class="sidebar-link block p-2 rounded hover:bg-white/10 @if(request()->routeIs('invoices.index')) bg-white/10 @endif">Create & Send</a>
                    </div>
                </div>

                <!-- Check In/Out -->
                <div @if(request()->routeIs('time.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('time-dropdown', 'arrow-time')" class="dropdown-button flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 w-full text-left @if(request()->routeIs('time.')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                        </svg>
                        Time & Attendance
                        <svg id="arrow-time" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('time.*')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="time-dropdown" class="pl-10 mt-1 space-y-1 @if(!request()->routeIs('time.*')) hidden @endif">
                        <a href="{{ route('time.dashboard') }}" class="sidebar-link block py-2 text-sm text-gray-300 hover:text-white @if(request()->routeIs('time.dashboard')) bg-white/10 @endif">Check In/Out</a>
                        <a href="{{ route('time.leaves') }}" class="sidebar-link block py-2 text-sm text-gray-300 hover:text-white @if(request()->routeIs('time.leaves')) bg-white/10 @endif">Leaves</a>
                    </div>
                </div>

                <!-- Chat Module -->
                <a href="{{ route('chat.view') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 @if(request()->routeIs('chat')) bg-white/10 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15l-4-4m0 0l4-4m-4 4h12" />
                    </svg>
                    Messages
                </a>

                <!-- Role & Permission Dropdown -->
                <div @if(request()->routeIs('roles.*') || request()->routeIs('permissions.*')) data-open="true" @endif>
                    <button onclick="toggleDropdown('roles-dropdown', 'arrow-roles')" class="dropdown-button flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 w-full text-left @if(request()->routeIs('roles.') || request()->routeIs('permissions.')) active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                        </svg>
                        Role & Permission
                        <svg id="arrow-roles" class="dropdown-arrow w-4 h-4 ml-auto transition-transform duration-200 @if(request()->routeIs('roles.*') || request()->routeIs('permissions.*')) rotated @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="roles-dropdown" class="pl-10 mt-1 space-y-1 @if(!request()->routeIs('roles.*') && !request()->routeIs('permissions.*')) hidden @endif">
                        <a href="{{ route('roles.index') }}" class="sidebar-link block py-2 text-sm text-gray-300 hover:text-white @if(request()->routeIs('roles.index')) bg-white/10 @endif">Roles</a>
                        <a href="{{ route('permissions.index') }}" class="sidebar-link block py-2 text-sm text-gray-300 hover:text-white @if(request()->routeIs('permissions.index')) bg-white/10 @endif">Permission</a>
                    </div>
                </div>

                <!-- Single Links -->
                <!-- <a href="{{ route('menu.settings') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 @if(request()->routeIs('menu.settings')) bg-white/10 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15l-4-4m0 0l4-4m-4 4h12" />
                    </svg>
                    Menu settings
                </a> -->
            </nav>
        </aside>