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
                        <span class="nav-tabs text-[15px] bg-gray-100 p-3 rounded-full font-medium cursor-pointer"
                            onclick="loadConversations('clients')">Clients</span>
                    </div>
                    <div class="text-center flex-1">
                        <span class="nav-tabs text-[15px] font-medium cursor-pointer"
                            onclick="loadConversations('users')">Users</span>
                    </div>
                    <div class="text-center flex-1">
                        <span class="nav-tabs text-[15px] font-medium cursor-pointer"
                            onclick="loadConversations('teams')">Teams</span>
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
                <img src="{{ asset('assets/images/image.png') }}" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                <div>
                    <p class="font-semibold text-gray-800">Select a chat</p>
                    <p class="text-xs text-gray-500">Online</p>
                </div>
            </div>
        </div>

            <!-- Messages Area -->
            <div id="messagesArea" class="flex-1 p-4 overflow-y-auto bg-gray-50">
                {{-- <div class="mb-4 flex justify-start">
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
                </div> --}}
            </div>
            
            <!-- Message Input -->
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


<script src="https://js.pusher.com/8.0/pusher.min.js"></script>
<script>
    let currentConversation = null;
    const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
    });

    // Load conversations by type (clients/users/teams)
    function loadConversations(type) {
        const typeMap = {
            users: 'App\\Models\\User',
            clients: 'App\\Models\\Client',
            teams: 'App\\Models\\Team'
        };

        fetch(`/chats/${type}`)
            .then(res => res.json())
            .then(data => {
                let html = '';

                // Show existing conversations, skip Unknown participants
                data.conversations.forEach(conv => {
                    const otherParticipants = conv.participants.filter(
                        p => !(p.user_type === "{{ get_class(auth()->user()) }}" && p.id === {{ auth()->id() }})
                    );

                    // Skip if no valid participants
                    if (!otherParticipants.length) return;

                    otherParticipants.forEach(participant => {
                        if (!participant.name || participant.name === "Unknown") return;

                        html += `
                        <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3"
                            onclick="openConversation(${conv.id}, '${participant.name.replace(/'/g, "\\'")}')">
                            <img src="http://127.0.0.1:8000/assets/images/image.png" class="w-10 h-10 rounded-lg object-contain">
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between">
                                    <p class="font-medium text-gray-900 text-sm truncate">${participant.name}</p>
                                </div>
                                <p class="text-gray-600 text-xs truncate">Click to chat</p>
                            </div>
                        </div>`;
                    });
                });


                // Get list of existing entities to avoid duplicates
                const existingEntities = data.conversations.flatMap(conv =>
                    conv.participants
                        .filter(p => !(p.id === {{ auth()->id() }} && p.user_type === "{{ get_class(auth()->user()) }}"))
                        .map(p => `${p.user_type}-${p.id}`)
                );

                // Show entities (clients/users/teams without conversation)
                data.entities
                    .filter(entity => !existingEntities.includes(`${typeMap[type]}-${entity.id}`))
                    .forEach(entity => {
                        const displayName = entity.name || "No Name"; // fallback
                        html += `
                        <div class="chat-item p-3 hover:bg-gray-100 cursor-pointer border-b flex gap-3"
                            onclick="startConversation(${entity.id}, '${type}', '${displayName.replace(/'/g, "\\'")}')">
                            <img src="{{ asset('assets/images/image.png') }}" class="w-10 h-10 rounded-lg object-contain">
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between">
                                    <p class="font-medium text-gray-900 text-sm truncate">${displayName}</p>
                                </div>
                                <p class="text-gray-600 text-xs truncate">Start new chat</p>
                            </div>
                        </div>`;
                    });


                document.getElementById('conversationList').innerHTML = html;
            });
    }



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
        });
    }




    // Open conversation and load messages
    function openConversation(id, name) {
        currentConversation = id;
        document.querySelector("#chatWindow .font-semibold").innerText = name;

        fetch(`/chat/${id}`)
            .then(res => res.json())
            .then(messages => {
                renderMessages(messages);
            });

        // Subscribe to Pusher channel
        const channel = pusher.subscribe(`chat.${id}`);
        channel.bind('message.sent', function(data) {
            appendMessage(data.message);
        });

        openChat(); // mobile toggle
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