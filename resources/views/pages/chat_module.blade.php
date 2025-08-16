@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

body {
    font-family: 'Inter', -apple-system, sans-serif;
    background-color: #f0f2f5;
}
</style>

<div class="flex h-[85vh] bg-white rounded-lg shadow overflow-hidden">

    <!-- Sidebar (Chats List) -->
    <div class="w-1/3 border-r border-gray-200 flex flex-col">
        <!-- Header -->
        <div class="p-4 bg-gray-100 flex justify-between items-center">
            <h1 class="text-lg font-semibold text-gray-800">Messages</h1>
            <i class="fas fa-comment-dots text-gray-600"></i>
        </div>

        <!-- Search -->
        <div class="p-3">
            <input type="text" placeholder="Search or start new chat"
                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-full focus:ring focus:ring-blue-300 focus:outline-none">
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm w-full max-w-md">
            <div class="flex justify-between">
                <!-- Navigation Items -->
                <div class="text-center flex-1">
                    <span class="text-[15px] bg-gray-100 p-3 rounded-full font-medium">Unread</span>
                </div>
                <div class="text-center flex-1">
                    <span class="text-[15px] font-medium">Groups</span>
                </div>
                <div class="text-center flex-1">
                    <span class="text-[15px] font-medium">Archive</span>
                </div>
            </div>
        </div>

        <!-- Chat List -->
        <div class="flex-1 overflow-y-auto">
            <div class="p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 ">
                <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                    class="w-10 h-10 rounded-lg object-contain">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Elmer Laverty</p>
                    <p class="text-gray-600 text-xs">Haha oh man 😊</p>
                </div>
            </div>
            <div class="p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 ">
                <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                    class="w-10 h-10 rounded-lg object-contain">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Elmer Laverty</p>
                    <p class="text-gray-600 text-xs">Haha oh man 😊</p>
                </div>
            </div>
            <div class="p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 ">
                <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                    class="w-10 h-10 rounded-lg object-contain">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Elmer Laverty</p>
                    <p class="text-gray-600 text-xs">Haha oh man 😊</p>
                </div>
            </div>
            <div class="p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 ">
                <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                    class="w-10 h-10 rounded-lg object-contain">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Elmer Laverty</p>
                    <p class="text-gray-600 text-xs">Haha oh man 😊</p>
                </div>
            </div>
            <div class="p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 ">
                <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                    class="w-10 h-10 rounded-lg object-contain">
                <div>
                    <p class="font-medium text-gray-900 text-sm">Elmer Laverty</p>
                    <p class="text-gray-600 text-xs">Haha oh man 😊</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Window -->
    <div class="w-2/3 flex flex-col">
        <!-- Chat Header -->
        <div class="p-4 bg-gray-100 flex justify-between items-center border-b">
            <div>
                <p class="font-semibold text-gray-800">Elmer Laverty</p>
                <p class="text-xs text-gray-500">Online</p>
            </div>
            <button class="p-2 rounded-full hover:bg-indigo-100 transition">
                <i class="fas fa-video text-indigo-600 text-lg"></i>
            </button>

        </div>

        <!-- Messages Area -->
        <div class="flex-1 p-4 overflow-y-auto bg-gray-50">
            <div class="mb-3 flex justify-start">
                <div class="bg-white px-3 py-2 rounded-lg shadow text-sm text-gray-800">
                    Hey! How are you?
                </div>
            </div>
            <div class="mb-3 flex justify-end">
                <div class="bg-blue-500 text-white px-3 py-2 rounded-lg shadow text-sm">
                    I'm good, what about you? 😊
                </div>
            </div>
            <div class="mb-3 flex justify-start">
                <div class="bg-white px-3 py-2 rounded-lg shadow text-sm text-gray-800">
                    Haha oh man!
                </div>
            </div>
        </div>

        <!-- Message Input -->
        <div class="p-3 flex items-center bg-gray-100 border-t">
            <input type="text" placeholder="Type a message"
                class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-full focus:ring focus:ring-blue-300 focus:outline-none">
            <button class="ml-3 px-4 py-2 bg-blue-500 text-white rounded-full shadow hover:bg-blue-600">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
</script>
@endpush