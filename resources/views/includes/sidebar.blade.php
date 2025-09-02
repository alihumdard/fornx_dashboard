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
                
                <!-- Projects Dropdown -->
                <div>
                    <button onclick="toggleDropdown('projectsDropdown', 'arrow-projects')" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" /></svg>
                        Projects
                        <svg id="arrow-projects" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div id="projectsDropdown" class="hidden ml-8 mt-1 space-y-1">
                        <a href="{{ route('projects.index') }}" class="block p-2 rounded hover:bg-white/10">All Projects</a>
                        <a href="{{ route('projects.create') }}" class="block p-2 rounded hover:bg-white/10">Create Project</a>
                    </div>
                </div>

                
                        <!-- Pages Link -->
                    <div>
                        <button onclick="toggleDropdown('roles-dropdown', 'arrow-projects')" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 w-full text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                            </svg>
                            Role & Permission
                            <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Items -->
                        <div id="roles-dropdown" class="hidden pl-10 mt-1 space-y-1">
                            <a href="{{ route('roles.index') }}" class="block py-2 text-sm text-gray-300 hover:text-white">Roles</a>
                            <a href="{{ route('permissions.index') }}" class="block py-2 text-sm text-gray-300 hover:text-white">Permission</a>
                        </div>
                    </div>
            
                    <!-- Pages Link -->
                    
                    <div>
                        <button onclick="toggleDropdown('pages-dropdown', 'arrow-projects')" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10 w-full text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                            </svg>
                            Pages
                            <svg id="arrow-icon" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown Items -->
                        <div id="pages-dropdown" class="hidden pl-10 mt-1 space-y-1">
                            <a href="{{ route('project.progress1', ['project' => 1]) }}" class="block py-2 text-sm text-gray-300 hover:text-white">Project Progress 1</a>
                            <a href="{{ route('project.progress2', ['project' => 1]) }}" class="block py-2 text-sm text-gray-300 hover:text-white">Project Progress 2</a>
                            <a href="{{ route('project.progress3', ['project' => 1]) }}" class="block py-2 text-sm text-gray-300 hover:text-white">Project Progress 3</a>
                        </div>
                    </div>
                <div>
                    <button onclick="toggleDropdown('transactionDropdown1', 'arrowIcon1')" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                        </svg>
                        Transaction
                        <svg id="arrowIcon1" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="transactionDropdown1" class="hidden ml-8 mt-1 space-y-1">
                        <a href="{{ route('transactions.index') }}" class="block p-2 rounded hover:bg-white/10">All Transactions</a>
                        <a href="{{ route('transactions.create') }}" class="block p-2 rounded hover:bg-white/10">Add Transaction</a>
                    </div>
                </div>
                <div>
                    <button onclick="toggleDropdown('usersDropdown', 'arrow-users')" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        Users
                        <svg id="arrow-users" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="usersDropdown" class="hidden ml-8 mt-1 space-y-1">
                        <a href="{{ route('users.all') }}" class="block p-2 rounded hover:bg-white/10">All users</a>
                        <a href="{{ route('users.add') }}" class="block p-2 rounded hover:bg-white/10">Add new users</a>
                        <a href="{{ route('users.myprofile') }}" class="block p-2 rounded hover:bg-white/10">Profile</a>
                        <a href="{{ route('teams.index') }}" class="block p-2 rounded hover:bg-white/10">Teams Dasboar</a>
                          <a href="{{ route('teams.indexs') }}" class="block p-2 rounded hover:bg-white/10">Teams</a>
                    </div>
                </div>
                <div>
                    <button onclick="toggleDropdown('ClientsDropdown', 'arrow-Clients')" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-5M7 4H2v5M2 20h5v-5M22 4h-5v5" />
                        </svg>
                        Clients
                        <svg id="arrow-Clients" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-auto transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="ClientsDropdown" class="hidden ml-8 mt-1 space-y-1">
                        <a href="{{ route('clients.index') }}" class="block p-2 rounded hover:bg-white/10">All Clients</a>
                        <a href="{{ route('clients.add') }}" class="block p-2 rounded hover:bg-white/10">Add new Clients</a>
                    </div>
                </div>
                <a href="{{ route('resource.management') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 6h6m-6-12h6" />
                    </svg>
                    Resource mgmt
                </a>
                <a href="{{ route('project.template') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 16h10" />
                    </svg>
                    Project template
                </a>
                <a href="{{ route('menu.settings') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15l-4-4m0 0l4-4m-4 4h12" />
                    </svg>
                    Menu settings
                </a>
            </nav>
        </aside>
