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
                            onclick="loadConversations('clients', true)">
                            Clients <span id="count-clients" class="ml-1 text-xs bg-red-500 text-white px-2 py-0.5 rounded-full">0</span>
                        </span>
                    </div>
                    <div class="text-center flex-1">
                        <span id="tab-users"
                            class="nav-tabs text-[15px] p-3 rounded-full font-medium cursor-pointer"
                            onclick="loadConversations('users', true)">
                            Users <span id="count-users" class="ml-1 text-xs bg-red-500 text-white px-2 py-0.5 rounded-full">0</span>
                        </span>
                    </div>
                    <div class="text-center flex-1">
                        <span id="tab-teams"
                            class="nav-tabs text-[15px] p-3 rounded-full font-medium cursor-pointer"
                            onclick="loadConversations('teams', true)">
                            Teams <span id="count-teams" class="ml-1 text-xs bg-red-500 text-white px-2 py-0.5 rounded-full">0</span>
                        </span>
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
                    <i class="fas fa-phone cursor-pointer hover:text-green-500" 
                    onclick="startVoiceMeeting()" 
                    title="Start Voice Meeting"></i>
                    <i class="fas fa-video cursor-pointer hover:text-blue-500" title="Start Video Meeting"
                    onclick="startMeeting()"></i>
                </div>
        </div>


            <div id="messagesArea" class="flex-1 p-4 overflow-y-auto bg-gray-50">
              
            </div>
            
            <div class="p-3 flex items-center bg-gray-100 border-t">
                <input id="messageInput" type="text" placeholder="Type a message"
                    class="flex-1 mx-2 px-3 py-2 text-sm border border-gray-300 rounded-full focus:ring focus:ring-blue-300 focus:outline-none">
                     
                    <input type="file" id="fileInput" class="hidden" onchange="sendDocument(this)">
                    <button onclick="document.getElementById('fileInput').click()" 
                            class="p-2 bg-gray-500 text-white rounded-full shadow hover:bg-gray-600 mr-2">
                        <i class="fas fa-paperclip"></i>
                    </button>

                    <!-- 🎤 Audio Record -->
                    <button id="recordBtn" class="p-2 bg-red-500 text-white rounded-full shadow hover:bg-red-600">
                        <i class="fas fa-microphone"></i>
                    </button>
                <button class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-full shadow hover:bg-blue-600"
                        onclick="sendMessage()">Send</button>
            </div>

        </div>
    </div>
</div>

<button class="md:hidden mr-3 text-gray-600" onclick="closeChat()">
    <i class="fas fa-arrow-left"></i>
</button>


<!-- Jitsi Modal -->
<div id="jitsiModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40">
  <div class="bg-white rounded-lg w-[95%] md:w-3/4 h-[80%] md:h-[70%] flex flex-col overflow-hidden">
    <div class="flex items-center justify-between p-3 border-b">
      <div class="flex items-center gap-3">
        <h3 id="jitsiTitle" class="font-semibold">Meeting</h3>
        <span id="jitsiRoom" class="text-xs text-gray-500"></span>
      </div>
      <div>
        <button class="px-3 py-1 rounded-md bg-gray-200 hover:bg-gray-300" onclick="closeJitsiModal()">Close</button>
      </div>
    </div>
    <div class="flex-1">
      <iframe id="jitsiFrame" src="" allow="camera; microphone; fullscreen; display-capture" class="w-full h-full border-0"></iframe>
    </div>
  </div>
</div>


@endsection
@push('scripts')


<script>
    let currentConversation = null;
    let subscribedChannels = {};


    let mediaRecorder;
    let audioChunks = [];

    document.getElementById("recordBtn").addEventListener("click", async () => {
        if (!mediaRecorder || mediaRecorder.state === "inactive") {
            // Start recording
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.start();
                audioChunks = [];

                mediaRecorder.addEventListener("dataavailable", event => {
                    audioChunks.push(event.data);
                });

                mediaRecorder.addEventListener("stop", () => {
                    const audioBlob = new Blob(audioChunks, { type: "audio/webm" });
                    sendAudioMessage(audioBlob);
                });

                document.getElementById("recordBtn").classList.add("bg-green-500");
                document.getElementById("recordBtn").innerHTML = '<i class="fas fa-stop"></i>';

            } catch (err) {
                alert("Microphone access denied!");
                console.error(err);
            }
        } else {
            // Stop recording
            mediaRecorder.stop();
            document.getElementById("recordBtn").classList.remove("bg-green-500");
            document.getElementById("recordBtn").innerHTML = '<i class="fas fa-microphone"></i>';
        }
    });

    function sendAudioMessage(audioBlob) {
        if (!currentConversation) return;

        const formData = new FormData();
        formData.append("audio", audioBlob, "voice_message.webm");

        fetch(`/chat/${currentConversation}/audio-message`, {
            method: "POST",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            body: formData
        })
        .then(res => res.json())
        .then(msg => {
            // appendMessage(msg);
        });
    }




    function subscribeToConversation(id) {
        if (!subscribedChannels[id]) {
            console.log(`📡 Subscribing to chat.${id}`);

            subscribedChannels[id] = Echo.private(`chat.${id}`)
                .subscribed(() => {
                    console.log(`✅ Subscribed to chat.${id}`);
                })
                .error(error => {
                    console.error(`❌ Subscription error on chat.${id}`, error);
                })
                .listen('.message.sent', (data) => {
                    console.log('🔔 Message received on conversation', id, data);

                    if (currentConversation === id) {
                        appendMessage(data.message);

                        // mark message as read immediately (optional)
                        fetch(`/chat/${id}/mark-read`, { method: 'POST', headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" } });
                    } else {
                        // increase unread badge on that conversation
                        const badge = document.querySelector(`#conversationList .chat-item[data-conversation-id='${id}'] .unread-badge`);
                        if (badge) {
                            badge.innerText = parseInt(badge.innerText || 0) + 1;
                            badge.classList.remove('hidden');
                        }

                        // also update tab total
                        const activeTab = document.querySelector('.nav-tabs.active').id.replace('tab-', '');
                        const totalBadge = document.getElementById(`count-${activeTab}`);
                        if (totalBadge) {
                            totalBadge.innerText = parseInt(totalBadge.innerText || 0) + 1;
                        }
                    }
                });

        }
    }

    function setActiveTab(tabId) {
        document.querySelectorAll('.nav-tabs').forEach(tab => {
            tab.classList.remove('active', 'bg-blue-500', 'text-white');
        });

        const tab = document.getElementById(tabId);
        tab.classList.add('active', 'bg-blue-500', 'text-white');
    }

    function loadConversations(type, autoOpenFirst = true) {
        setActiveTab(`tab-${type}`);

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

                    otherParticipants.forEach((participant) => {
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
                                <div class="flex justify-between items-center">
                                    <p class="font-medium text-gray-900 text-sm truncate">${participant.name}</p>
                                    ${conv.unread_count > 0 
                                        ? `<span class="unread-badge ml-2 text-xs bg-red-500 text-white px-2 py-0.5 rounded-full">${conv.unread_count}</span>` 
                                        : `<span class="unread-badge hidden ml-2 text-xs bg-red-500 text-white px-2 py-0.5 rounded-full">0</span>`}

                                </div>
                                <p class="text-gray-600 text-xs truncate">Click to chat</p>
                            </div>
                        </div>`;


                        // Subscribe to channel
                        if (!subscribedChannels[conv.id]) {
                            subscribedChannels[conv.id] = Echo.private(`chat.${conv.id}`)
                                .listen('.message.sent', (data) => {
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
                document.getElementById(`count-${type}`).innerText = data.total_unread;

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

            // Subscribe to the new conversation
            subscribeToConversation(data.conversation.id);

            // reload list so new conversation appears
            loadConversations(type);
        });
    }

    function openConversation(id, name) {
        currentConversation = id;
        document.querySelector("#chatHeaderName").innerText = name;

        // reset unread badge for this conversation
        const badge = document.querySelector(`#conversationList .chat-item[data-conversation-id='${id}'] .unread-badge`);
        if (badge) {
            const count = parseInt(badge.innerText || 0);
            badge.innerText = 0;
            badge.classList.add('hidden');

            // also decrease tab total
            const activeTab = document.querySelector('.nav-tabs.active').id.replace('tab-', '');
            const totalBadge = document.getElementById(`count-${activeTab}`);
            if (totalBadge) {
                totalBadge.innerText = Math.max(0, parseInt(totalBadge.innerText) - count);
            }
        }

        fetch(`/chat/${id}/mark-read`, { method: 'POST', headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" } });

        fetch(`/chat/${id}`)
            .then(res => res.json())
            .then(messages => renderMessages(messages));

        openChat();
    }


    // Render messages in chat window
    function renderMessages(messages) {
    let html = '';
    messages.forEach(msg => {
        const isMine = msg.sender_id === {{ auth()->id() }};
        let content = msg.body ? linkify(msg.body) : "";

        if (msg.audio_path) {
            content = `<audio controls src="/storage/${msg.audio_path}" class="mt-2"></audio>`;
        }

        if (msg.document_path) {
            const fileName = msg.document_path.split('/').pop();
            content = `
                <a href="/storage/${msg.document_path}" target="_blank" 
                class="text-blue-600 underline flex items-center gap-2">
                    <i class="fas fa-file-alt"></i> ${fileName}
                </a>`;
        }


        html += `
            <div class="mb-4 flex ${isMine ? 'justify-end' : 'justify-start'}">
                <div class="message-bubble ${isMine ? 'bg-blue-500 text-white' : 'bg-white text-gray-800'} 
                            px-4 py-2 rounded-lg shadow text-sm">
                    ${content}
                </div>
            </div>`;
    });
    const messagesArea = document.getElementById('messagesArea');
    messagesArea.innerHTML = html;
    messagesArea.scrollTop = messagesArea.scrollHeight;

    enhanceAudioDurations();

}


    // Append new incoming message
    function appendMessage(msg) {
        const isMine = msg.sender_id === {{ auth()->id() }};
        let content = msg.body ? linkify(msg.body) : "";

        if (msg.audio_path) {
            content = `<audio controls src="/storage/${msg.audio_path}" class="mt-2"></audio>`;
        }

        if (msg.document_path) {
            const fileName = msg.document_path.split('/').pop();
            content = `
                <a href="/storage/${msg.document_path}" target="_blank" 
                class="text-blue-600 underline flex items-center gap-2">
                    <i class="fas fa-file-alt"></i> ${fileName}
                </a>`;
        }


        const bubble = `
            <div class="mb-4 flex ${isMine ? 'justify-end' : 'justify-start'}">
                <div class="message-bubble ${isMine ? 'bg-blue-500 text-white' : 'bg-white text-gray-800'} 
                            px-4 py-2 rounded-lg shadow text-sm">
                    ${content}
                </div>
            </div>`;
        
        const messagesArea = document.getElementById('messagesArea');
        messagesArea.innerHTML += bubble;
        messagesArea.scrollTop = messagesArea.scrollHeight;

        enhanceAudioDurations();

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
            // appendMessage(msg);
            // input.value = '';
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


    function formatTime(seconds) {
        if (!isFinite(seconds) || isNaN(seconds)) {
            return "00:00"; // fallback
        }
        const m = Math.floor(seconds / 60).toString().padStart(2, '0');
        const s = Math.floor(seconds % 60).toString().padStart(2, '0');
        return `${m}:${s}`;
    }

    function enhanceAudioDurations() {
        document.querySelectorAll("audio").forEach(audio => {
            // Show duration
            audio.addEventListener("loadedmetadata", () => {
                if (isFinite(audio.duration) && !isNaN(audio.duration)) {
                    const duration = formatTime(audio.duration);

                    if (!audio.nextSibling || !audio.nextSibling.classList?.contains("audio-duration")) {
                        const span = document.createElement("span");
                        span.textContent = duration;
                        span.className = "ml-2 text-xs text-gray-500 audio-duration";
                        audio.insertAdjacentElement("afterend", span);
                    }
                }
            });

            // 🔔 When audio is played, mark that message as read
            audio.addEventListener("play", () => {
                const messageId = audio.dataset.messageId; // 👈 get msg.id here
                if (messageId) {
        fetch(`/chat/${currentConversation}/mark-read`, {
                        method: "POST",
                        headers: { 
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ message_id: messageId })
                    });
                }
            }, { once: true }); // only once per audio
        });
    }

    function sendDocument(input) {
        if (!currentConversation || !input.files.length) return;

        const formData = new FormData();
        formData.append("document", input.files[0]);

        fetch(`/chat/${currentConversation}/document-message`, {
            method: "POST",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
            body: formData
        })
        .then(res => res.json())
        .then(msg => {
            appendMessage(msg);
            input.value = ""; // reset input
        });
    }


    // ----------------- Meeting helpers -----------------

    // Open modal
    function openJitsiModal(meetingUrl, title = 'Meeting', room = '') {
        document.getElementById('jitsiFrame').src = meetingUrl;
        document.getElementById('jitsiTitle').innerText = title;
        document.getElementById('jitsiRoom').innerText = room ? ` • ${room}` : '';
        document.getElementById('jitsiModal').classList.remove('hidden');
        document.getElementById('jitsiModal').classList.add('flex');
    }

    // Close modal and stop iframe (release camera/mic)
    function closeJitsiModal() {
        const iframe = document.getElementById('jitsiFrame');
        iframe.src = ''; // this helps free camera/mic
        document.getElementById('jitsiModal').classList.add('hidden');
        document.getElementById('jitsiModal').classList.remove('flex');
    }

    // Create meeting (saves record) and send link to chat + open modal
    async function startMeeting() {
        if (!currentConversation) {
            alert('Select a conversation first.');
            return;
        }

        // Optionally ask for a meeting title
        const title = prompt('Enter meeting title (optional):', '') || '';

        try {
            const res = await fetch('/meetings', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    conversation_id: currentConversation,
                    title
                })
            });

            const payload = await res.json();
            if (!payload.success) throw new Error('Failed to create meeting');

            const meeting = payload.meeting;
            const meetingUrl = meeting.meeting_url;
            const roomName = meeting.room_name;

            // Send the meeting link as a chat message to the conversation
            sendSystemMessage(`🔗 Join Meeting: ${meetingUrl}`);

            // Open modal with the Jitsi room
            openJitsiModal(meetingUrl, title || 'Meeting', roomName);

        } catch (err) {
            console.error(err);
            alert('Could not start meeting — try again.');
        }
    }

    // Send a system message into current conversation (uses existing chat /message endpoint)
    function sendSystemMessage(text) {
        if (!currentConversation) return;
        fetch(`/chat/${currentConversation}/message`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ body: text })
        })
        .then(res => res.json())
        .then(msg => {
            // ensure message shows in UI
            appendMessage(msg);
        })
        .catch(err => console.error(err));
    }

    // make links clickable inside message content
    function linkify(text) {
        if (!text) return text;
        // basic URL regex
        const urlRegex = /((https?:\/\/)[\w\-_@:%#\+~.;\/?&=(),!\\[\]\$'~]+)/g;
        return text.replace(urlRegex, function(url) {
            return `<a href="${url}" target="_blank" class="text-blue-600 underline">${url}</a>`;
        });
    }


    function startVoiceMeeting() {
        if (!currentConversation) return;

        const roomName = `chat-voice-${currentConversation}`;
        const meetUrl = `https://meet.jit.si/${roomName}#config.startWithVideoMuted=true`;

        // Send the link in chat
        sendMessage({ body: `🔗 Join Voice Meeting: ${meetUrl}` });

        // Optionally open in new tab
        window.open(meetUrl, "_blank");
    }


</script>




@endpush