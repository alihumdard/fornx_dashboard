@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
body {
    font-family: 'Inter', -apple-system, sans-serif;
    background-color: #f0f2f5;
}
/* Mobile-specific styles */
@media (max-width: 767px) {
    .chat-container {
        height: 100vh;
        max-height: 100vh;
    }
    .chat-list {
        width: 100%;
    }
    .chat-window {
        width: 100%;
    }
    .chat-item {
        padding: 12px;
    }
    .chat-item img {
        width: 48px;
        height: 48px;
    }
    .message-bubble {
        max-width: 80%;
    }
    .nav-tabs span {
        font-size: 13px;
        padding: 8px 12px;
    }
}
</style>
<div class="flex flex-col h-[100vh] md:h-[85vh] bg-white rounded-lg shadow overflow-hidden chat-container">
    <!-- Mobile Header -->
    <div class="md:hidden p-4 bg-gray-100 flex justify-between items-center border-b">
        <h1 class="text-lg font-semibold text-gray-800">Messages</h1>
        <i class="fas fa-comment-dots text-gray-600"></i>
    </div>
    
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar (Chats List) -->
        <div id="chatList" class="w-full md:w-1/3 border-r border-gray-200 flex flex-col chat-list">
            <!-- Header (hidden on mobile) -->
            <div class="hidden md:flex p-4 bg-gray-100 justify-between items-center">
                <h1 class="text-lg font-semibold text-gray-800">Messages</h1>
                <i class="fas fa-comment-dots text-gray-600"></i>
            </div>
            
            <!-- Search -->
            <div class="p-3">
                <input type="text" placeholder="Search or start new chat"
                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-full focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            
            <!-- Navigation Tabs -->
            <div class="bg-white p-3 md:p-4 rounded-lg shadow-sm w-full max-w-md mx-3">
                <div class="flex justify-between">
                    <div class="text-center flex-1">
                        <span class="nav-tabs text-[15px] bg-gray-100 p-3 rounded-full font-medium">Unread</span>
                    </div>
                    <div class="text-center flex-1">
                        <span class="nav-tabs text-[15px] font-medium">Groups</span>
                    </div>
                    <div class="text-center flex-1">
                        <span class="nav-tabs text-[15px] font-medium">Archive</span>
                    </div>
                </div>
            </div>
            
            <!-- Chat List -->
            <div class="flex-1 overflow-y-auto">
                <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 " onclick="openChat()">
                    <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                        class="w-10 h-10 md:w-12 md:h-12 rounded-lg object-contain">
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <p class="font-medium text-gray-900 text-sm truncate">Elmer Laverty</p>
                            <span class="text-xs text-gray-500">10:30 AM</span>
                        </div>
                        <p class="text-gray-600 text-xs truncate">Haha oh man 😊</p>
                    </div>
                </div>
                <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 " onclick="openChat()">
                    <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                        class="w-10 h-10 md:w-12 md:h-12 rounded-lg object-contain">
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <p class="font-medium text-gray-900 text-sm truncate">Elmer Laverty</p>
                            <span class="text-xs text-gray-500">9:15 AM</span>
                        </div>
                        <p class="text-gray-600 text-xs truncate">Haha oh man 😊</p>
                    </div>
                </div>
                <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 " onclick="openChat()">
                    <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                        class="w-10 h-10 md:w-12 md:h-12 rounded-lg object-contain">
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <p class="font-medium text-gray-900 text-sm truncate">Elmer Laverty</p>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-gray-600 text-xs truncate">Haha oh man 😊</p>
                    </div>
                </div>
                <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 " onclick="openChat()">
                    <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                        class="w-10 h-10 md:w-12 md:h-12 rounded-lg object-contain">
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <p class="font-medium text-gray-900 text-sm truncate">Elmer Laverty</p>
                            <span class="text-xs text-gray-500">Yesterday</span>
                        </div>
                        <p class="text-gray-600 text-xs truncate">Haha oh man 😊</p>
                    </div>
                </div>
                <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3 " onclick="openChat()">
                    <img src="{{ asset('assets/images/image.png') }}" alt="Image"
                        class="w-10 h-10 md:w-12 md:h-12 rounded-lg object-contain">
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between">
                            <p class="font-medium text-gray-900 text-sm truncate">Elmer Laverty</p>
                            <span class="text-xs text-gray-500">12/05/2023</span>
                        </div>
                        <p class="text-gray-600 text-xs truncate">Haha oh man 😊</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Chat Window -->
        <div id="chatWindow" class="hidden md:flex md:w-2/3 flex-col chat-window">
            <!-- Chat Header -->
            <div class="p-4 bg-gray-100 flex justify-between items-center border-b">
                <div class="flex items-center">
                    <button class="md:hidden mr-3 text-gray-600" onclick="closeChat()">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <img src="{{ asset('assets/images/image.png') }}" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                    <div>
                        <p class="font-semibold text-gray-800">Elmer Laverty</p>
                        <p class="text-xs text-gray-500">Online</p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button class="p-2 rounded-full hover:bg-indigo-100 transition">
                        <i class="fas fa-phone text-indigo-600 text-lg"></i>
                    </button>
                    <button class="p-2 rounded-full hover:bg-indigo-100 transition">
                        <i class="fas fa-video text-indigo-600 text-lg"></i>
                    </button>
                    <button class="p-2 rounded-full hover:bg-indigo-100 transition">
                        <i class="fas fa-ellipsis-v text-indigo-600 text-lg"></i>
                    </button>
                </div>
            </div>
            
            <!-- Messages Area -->
            <div class="flex-1 p-4 overflow-y-auto bg-gray-50">
                <div class="mb-4 flex justify-start">
                    <div class="message-bubble bg-white px-4 py-2 rounded-lg shadow text-sm text-gray-800">
                        Hey! How are you?
                    </div>
                </div>
                <div class="mb-4 flex justify-end">
                    <div class="message-bubble bg-blue-500 text-white px-4 py-2 rounded-lg shadow text-sm">
                        I'm good, what about you? 😊
                    </div>
                </div>
                <div class="mb-4 flex justify-start">
                    <div class="message-bubble bg-white px-4 py-2 rounded-lg shadow text-sm text-gray-800">
                        Haha oh man!
                    </div>
                </div>
                <div class="mb-4 flex justify-end">
                    <div class="message-bubble bg-blue-500 text-white px-4 py-2 rounded-lg shadow text-sm">
                        Did you see the latest project updates?
                    </div>
                </div>
                <div class="mb-4 flex justify-start">
                    <div class="message-bubble bg-white px-4 py-2 rounded-lg shadow text-sm text-gray-800">
                        Not yet, I'll check them out now.
                    </div>
                </div>
            </div>
            
            <!-- Message Input -->
            <div class="p-3 flex items-center bg-gray-100 border-t">
                <button class="p-2 text-gray-500 hover:text-gray-700">
                    <i class="fas fa-paperclip"></i>
                </button>
                <input type="text" placeholder="Type a message"
                    class="flex-1 mx-2 px-3 py-2 text-sm border border-gray-300 rounded-full focus:ring focus:ring-blue-300 focus:outline-none">
                <button class="p-2 text-gray-500 hover:text-gray-700">
                    <i class="fas fa-smile"></i>
                </button>
                <button class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-full shadow hover:bg-blue-600">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
function openChat() {
    // On mobile, hide chat list and show chat window
    if (window.innerWidth < 768) {
        document.getElementById('chatList').classList.add('hidden');
        document.getElementById('chatWindow').classList.remove('hidden');
        document.getElementById('chatWindow').classList.add('flex');
        // Scroll to bottom of messages
        const messagesArea = document.querySelector('#chatWindow .flex-1');
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }
}

function closeChat() {
    // On mobile, show chat list and hide chat window
    if (window.innerWidth < 768) {
        document.getElementById('chatList').classList.remove('hidden');
        document.getElementById('chatWindow').classList.add('hidden');
        document.getElementById('chatWindow').classList.remove('flex');
    }
}

// Handle window resize
window.addEventListener('resize', function() {
    if (window.innerWidth >= 768) {
        // On desktop, always show both
        document.getElementById('chatList').classList.remove('hidden');
        document.getElementById('chatWindow').classList.remove('hidden');
        document.getElementById('chatWindow').classList.add('flex');
    } else {
        // On mobile, show chat list by default
        document.getElementById('chatList').classList.remove('hidden');
        document.getElementById('chatWindow').classList.add('hidden');
        document.getElementById('chatWindow').classList.remove('flex');
    }
});

// Initialize the page based on screen size
document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth < 768) {
        document.getElementById('chatWindow').classList.add('hidden');
        document.getElementById('chatWindow').classList.remove('flex');
    }
});
</script>
@endpush