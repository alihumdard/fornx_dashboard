<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $header_title ?? 'Dashboard' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon (1).jpg') }}">
    {{-- Arsalan --}}
    <link rel="stylesheet" href="{{ asset('assets/css/arsalan.css') }}">
</head>

<body>
    <!-- Dashboard Transition -->
    <div class="dashboard-main-box">
        <div class="dashboard-sidebar">
            <div class="create-project-box">
                <a href="javascript:;">
                    <div class="img-wrap"> <img src="{{ asset('assets/images/plus-icon.png') }}" alt="icon" /></div>
                    <p>Create new project</p>
                </a>
            </div>
            <div class="sidebar-navlist">
                <nav>
                    <ul class="list-unstyled">
                        <li>
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Dashboard</p>
                                </div>
                            </a>

                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Pages</p>
                                </div>
                                <div class="rightcontent">
                                    <img src="{{ asset('assets/images/arrow-down-icon.png') }}" alt="icon" />
                                </div>
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Header</a>
                                </li>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">Footer</a>
                                </li>
                                <li>
                                    <a href="#">Services</a>
                                </li>
                                <li>
                                    <a href="#">Potfolio</a>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Blog</a>
                                </li>
                                <li>
                                    <a href="#">Blog Detail</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Transaction</p>
                                </div>
                                <div class="rightcontent">
                                    <img src="{{ asset('assets/images/arrow-down-icon.png') }}" alt="icon" />
                                </div>
                            </a>
                        </li>
                        <li
                            class="{{ request()->routeIs('roles.*') || request()->routeIs('users.*') || request()->routeIs('access.*') ? 'active' : '' }}">
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Users</p>
                                </div>
                                <div class="rightcontent">
                                    <img src="{{ asset('assets/images/arrow-down-icon.png') }}" alt="icon" />
                                </div>
                            </a>
                            <ul>
                                {{-- rolee --}}
                                <li class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}">Roles</a>
                                </li>
                                {{-- users --}}
                                <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                                    <a href="{{ route('users.index') }}">Users</a>
                                </li>
                                {{-- access --}}
                                <li class="{{ request()->routeIs('access.*') ? 'active' : '' }}">
                                    <a href="{{ route('access.index') }}">Access</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('projects.*') || request()->routeIs('platforms.*') || request()->routeIs('technologies.*') ? 'active' : '' }}">
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Projects</p>
                                </div>
                                <div class="rightcontent">
                                    <img src="{{ asset('assets/images/arrow-down-icon.png') }}" alt="icon" />
                                </div>
                            </a>
                            <ul>
                                <li class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">
                                    <a href="{{ route('projects.index') }}">Projects</a>
                                </li>
                                {{-- platforms --}}
                                <li class="{{ request()->routeIs('platforms.*') ? 'active' : '' }}">
                                    <a href="{{ route('platforms.index') }}">Platforms</a>
                                </li>
                                <li class="{{ request()->routeIs('technologies.*') ? 'active' : '' }}">
                                    <a href="{{ route('technologies.index') }}">Technologies</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Clients</p>
                                </div>
                                <div class="rightcontent">
                                    <img src="{{ asset('assets/images/arrow-down-icon.png') }}" alt="icon" />
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Project Template</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="leftcontent">
                                    <img src="{{ asset('assets/images/sidebar-list-icon-1.png') }}" alt="icon" />
                                    <p>Menu Settings</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="dashboard-body">
            <div class="dashboard-header">
                <div class="left-box">
                    <h1>Dashboard</h1>
                </div>
                <div class="right-box">
                    <div class="searchbar">
                        <div class="icon-wrap">
                            <img src="{{ asset('assets/images/search-normal.png') }}" alt="icon" />
                        </div>
                        <input type="text" placeholder="Search for anything...">
                    </div>
                    <div class="noti-box">
                        <img src="{{ asset('assets/images/notification.png') }}" alt="icon" />
                    </div>
                    <div class="profile-box">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/profile-img.png') }}" alt="vector" />
                        </div>
                        <div class="content-box">
                            <div class="content">
                                <p>Alex meian</p>
                                <span>Admin</span>
                            </div>
                            <div class="icon-wrap">
                                <img src="{{ asset('assets/images/arrow-down-gray.png') }}" alt="icon" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
