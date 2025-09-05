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
    .nav-tabs.active {
        background-color: #3b82f6; /* Blue bg */
        color: white;
    }

    
    .chat-item.active, .chat-item.bg-blue-100 {
    background-color: #e0f2fe; /* light blue */
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
                        <span id="tab-clients"
                            class="nav-tabs text-[15px] p-3 rounded-full font-medium cursor-pointer active"
                            onclick="loadConversations('clients', true)">Clients</span>
                    </div>
                    <div class="text-center flex-1">
                        <span id="tab-users"
                            class="nav-tabs text-[15px] p-3 rounded-full font-medium cursor-pointer"
                            onclick="loadConversations('users', true)">Users</span>
                    </div>
                    <div class="text-center flex-1">
                        <span id="tab-teams"
                            class="nav-tabs text-[15px] p-3 rounded-full font-medium cursor-pointer"
                            onclick="loadConversations('teams', true)">Teams</span>
                    </div>
                </div>

            </div>

            
            <!-- Chat List -->
           <div id="conversationList" class="flex-1 overflow-y-auto">
                <!-- Conversations will be injected here -->
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
                    <img id="chatHeaderAvatar" src="{{ asset('assets/images/image.png') }}" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                    <div>
                        <p id="chatHeaderName" class="font-semibold text-gray-800">Select a chat</p>
                        <p class="text-xs text-gray-500">Online</p>
                    </div>
                </div>
                <div class="flex gap-4 text-gray-600">
                    <i class="fas fa-phone cursor-pointer hover:text-blue-500" title="Voice Call"></i>
                    <i class="fas fa-video cursor-pointer hover:text-blue-500" title="Video Call"></i>
                    <i class="fas fa-paperclip cursor-pointer hover:text-blue-500" title="Attach File"></i>
                </div>
        </div>


            <div id="messagesArea" class="flex-1 p-4 overflow-y-auto bg-gray-50">
              
            </div>
            
            <div class="p-3 flex items-center bg-gray-100 border-t">
                <input id="messageInput" type="text" placeholder="Type a message"
                    class="flex-1 mx-2 px-3 py-2 text-sm border border-gray-300 rounded-full focus:ring focus:ring-blue-300 focus:outline-none">
                <button class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-full shadow hover:bg-blue-600"
                        onclick="sendMessage()">Send</button>
            </div>

        </div>
    </div>
</div>

<button class="md:hidden mr-3 text-gray-600" onclick="closeChat()">
    <i class="fas fa-arrow-left"></i>
</button>

@endsection
@push('scripts')


<script>

let currentConversation = null;
    

    let subscribedChannels = {};

    function setActiveTab(tabId) {
        document.querySelectorAll('.nav-tabs').forEach(tab => {
            tab.classList.remove('active', 'bg-blue-500', 'text-white');
        });

        const tab = document.getElementById(tabId);
        tab.classList.add('active', 'bg-blue-500', 'text-white');
    }
   function loadConversations(type, autoOpenFirst = true) {
    setActiveTab(`tab-${type}`);
    const typeMap = {
        users: 'App\\Models\\User',
        clients: 'App\\Models\\Client',
        teams: 'App\\Models\\Team'
    };

    fetch(`/chats/${type}`)
        .then(res => res.json())
        .then(data => {
            let html = '';
            let firstConversationId = null;
            let firstParticipantName = null;

            data.conversations.forEach(conv => {
                const otherParticipants = conv.participants.filter(
                    p => !(p.user_type === "{{ get_class(auth()->user()) }}" && p.id === {{ auth()->id() }})
                );

                if (!otherParticipants.length) return;

                otherParticipants.forEach((participant, index) => {
                    if (!participant.name || participant.name === "Unknown") return;

                    if (!firstConversationId) {
                        firstConversationId = conv.id;
                        firstParticipantName = participant.name;
                    }

                    html += `
                    <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3"
                    data-conversation-id="${conv.id}" 
                        onclick="openConversation(${conv.id}, '${participant.name.replace(/'/g, "\\'")}')">
                        <img src="/assets/images/image.png" class="w-10 h-10 rounded-lg object-contain">
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between">
                                <p class="font-medium text-gray-900 text-sm truncate">${participant.name}</p>
                            </div>
                            <p class="text-gray-600 text-xs truncate">Click to chat</p>
                        </div>
                    </div>`;

                    // Subscribe to channel
                    if (!subscribedChannels[conv.id]) {
                        subscribedChannels[conv.id] = Echo.private(`chat.${conv.id}`)
                            .listen('message.sent', (data) => {
                                if (currentConversation === conv.id) appendMessage(data.message);
                            });
                    }
                });
            });

            // Render new conversation entities (optional)
            data.entities
                .filter(entity => !data.conversations.flatMap(c => c.participants.map(p => p.id)).includes(entity.id))
                .forEach(entity => {
                    const displayName = entity.name || "No Name";
                    html += `
                    <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3"
                        onclick="startConversation(${entity.id}, '${type}', '${displayName.replace(/'/g, "\\'")}')">
                        <img src="/assets/images/image.png" class="w-10 h-10 rounded-lg object-contain">
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between">
                                <p class="font-medium text-gray-900 text-sm truncate">${displayName}</p>
                            </div>
                            <p class="text-gray-600 text-xs truncate">Start new chat</p>
                        </div>
                    </div>`;
                });

            document.getElementById('conversationList').innerHTML = html;

            // Auto-open first conversation
            if (autoOpenFirst && firstConversationId) {
                openConversation(firstConversationId, firstParticipantName);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        loadConversations('clients'); // Automatically loads clients tab
    });


    // Start a new conversation
    function startConversation(entityId, type, name) {
        fetch(`/chat/start`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ entity_id: entityId, type })
        })
        .then(res => res.json())
        .then(data => {
            currentConversation = data.conversation.id;
            document.querySelector("#chatWindow .font-semibold").innerText = name;

            renderMessages(data.messages);
            openChat();

            // reload list so new conversation appears
            loadConversations(type);
        });

    }


       function openConversation(id, name) {
            currentConversation = id;

            document.querySelector("#chatHeaderName").innerText = name;

            // Highlight active conversation
            document.querySelectorAll('#conversationList .chat-item').forEach(item => {
                item.classList.remove('bg-blue-100');
            });
            const activeItem = document.querySelector(`#conversationList .chat-item[data-conversation-id='${id}']`);
            if (activeItem) activeItem.classList.add('bg-blue-100');

            fetch(`/chat/${id}`)
                .then(res => res.json())
                .then(messages => renderMessages(messages));

            if (!subscribedChannels[id]) {
                subscribedChannels[id] = Echo.private(`chat.${id}`)
                    .listen('message.sent', (data) => {
                        if (currentConversation === id) appendMessage(data.message);
                    });
            }

            openChat();
        }




    // Render messages in chat window
    function renderMessages(messages) {
        let html = '';
        messages.forEach(msg => {
            const isMine = msg.sender_id === {{ auth()->id() }};
            html += `
                <div class="mb-4 flex ${isMine ? 'justify-end' : 'justify-start'}">
                    <div class="message-bubble ${isMine ? 'bg-blue-500 text-white' : 'bg-white text-gray-800'} 
                                px-4 py-2 rounded-lg shadow text-sm">
                        ${msg.body}
                    </div>
                </div>`;
        });
        const messagesArea = document.getElementById('messagesArea');
        messagesArea.innerHTML = html;
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    // Append new incoming message
    function appendMessage(msg) {
        const isMine = msg.sender_id === {{ auth()->id() }};
        const bubble = `
            <div class="mb-4 flex ${isMine ? 'justify-end' : 'justify-start'}">
                <div class="message-bubble ${isMine ? 'bg-blue-500 text-white' : 'bg-white text-gray-800'} 
                            px-4 py-2 rounded-lg shadow text-sm">
                    ${msg.body}
                </div>
            </div>`;
        const messagesArea = document.getElementById('messagesArea');
        messagesArea.innerHTML += bubble;
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    // Send message
    function sendMessage() {
        const input = document.getElementById('messageInput');
        if (!input.value.trim() || !currentConversation) return;

        fetch(`/chat/${currentConversation}/message`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ body: input.value })
        }).then(res => res.json())
        .then(msg => {
            appendMessage(msg);
            input.value = '';
        });
    }


    // Show chat window (used for mobile toggle)
    function openChat() {
        if (window.innerWidth < 768) { // mobile only
            document.getElementById('chatList').classList.add('hidden');
            document.getElementById('chatWindow').classList.remove('hidden');
        }
    }

    // Close chat window (go back to list on mobile)
    function closeChat() {
        if (window.innerWidth < 768) { // mobile only
            document.getElementById('chatList').classList.remove('hidden');
            document.getElementById('chatWindow').classList.add('hidden');
        }
    }





</script>



@endpush