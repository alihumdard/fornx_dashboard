<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title' , 'Fronx Dashbaord')</title>
    @include('includes.head')
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        @include('includes.sidebar')
        <!-- Main Content -->
        <main class="flex-1 p-4 lg:p-6">
            @include('includes.topbar')
            @yield('content')
        </main>
    </div>

    <!-- Floating WhatsApp Button-->
    <style>
        @keyframes pulsing {
            to {
                box-shadow: 0 0 0 30px rgba(66, 219, 135, 0);
            }
        }
    </style>
    <div style="position: fixed; bottom: 30px; right: 30px; width: 100px; height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center; z-index: 1000;">
        <a target="_blank" href="https://wa.me/917845667204" style="text-decoration: none;">
            <div style=" background-color: #42db87; color: #fff; width: 60px; height: 60px; font-size: 30px; border-radius: 50%; text-align: center; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 0 0 #42db87; animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1); transition: all 300ms ease-in-out;">
                <i class="fab fa-whatsapp"></i>
            </div>
        </a>
        <p style="margin-top: 8px; color: #ffff; font-size: 13px;">Talk to us?</p>
    </div>

    @include('includes.footer')

    <!-- Import Js Files -->
    @include('includes.script')

    @stack('scripts')
</body>

</html>