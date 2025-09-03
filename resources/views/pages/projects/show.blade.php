@extends('layouts.main')
@section('title', 'Project Details')

@section('content')

<div class="mt-10 bg-white rounded-xl shadow-md overflow-hidden">

    <!-- Header -->
    <div class="px-6 py-4 font-semibold text-lg">
        Project Progress & Discussion
    </div>

    <!-- Content -->
    <div class="px-6 mb-10">
        <!-- Project Info -->
        <div class="flex flex-col gap-2 mb-6">
            <p>Project Name:</p>
            <h2 class="text-xl font-semibold">{{ $project->name }}</h2>
            <span class="bg-green-100 text-green-700 w-24 px-3 py-1 rounded-full text-sm font-medium">{{ $project->status }}</span>
        </div>

        <!-- Dates -->
        <div class="flex gap-10 mb-6">
            <div>
                <p class="text-sm text-gray-500">Start Date</p>
                <p class="font-medium">{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">End Date</p>
                <p class="font-medium">{{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="pb-5">
            <p>website:</p>
            <p class="text-indigo-600">{{ $project->reference_website ?? 'N/A' }}</p>
        </div>

        <!-- Progress -->
        <div class="mb-8">
            <div class="flex justify-between mb-2">
                <span class="font-medium">Progress</span>
                <span class="font-semibold text-indigo-600">
                    {{ $averageProgress }}%
                </span>
            </div>

            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                <div class="h-2 bg-indigo-600 rounded-full"
                    style="width: {{ $averageProgress }}%">
                </div>
            </div>

            <p class="text-right text-sm text-gray-500 mt-2">
                {{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($project->end_date), false) }} days remaining
            </p>
        </div>


        <!-- Website URL -->
        <div class="mb-6">
            <h3 class="font-semibold mb-3">Website URL</h3>
            <input type="text" value="{{ $project->reference_website ?? '' }}" readonly
                class="w-full px-4 py-2 border rounded-md text-sm bg-gray-50 focus:outline-none">
        </div>

        <!-- Credentials -->
        <div class="mb-6">
            <h3 class="font-semibold mb-3">Credentials</h3>
            <div class="flex gap-6">
                <!-- Login -->
                <div class="w-1/2">
                    <label class="block text-sm font-medium mb-1">Login</label>
                    <input type="text"
                        value="{{ $credentials['login'] ?? '' }}"
                        readonly
                        class="w-full px-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none bg-gray-100">
                </div>

                <!-- Password -->
                <div class="w-1/2">
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password"
                        value="{{ $credentials['password'] ?? '' }}"
                        readonly
                        class="w-full px-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none bg-gray-100">
                </div>
            </div>
        </div>


        <!-- Buttons -->
        <div class="flex justify-end gap-4 mb-8">
            <button class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-medium"
                onclick="openEditModal({{ $project->id }}, '{{ $project->reference_website }}', '{{ $credentials['login'] ?? '' }}', '{{ $credentials['password'] ?? '' }}')">
                Edit
            </button>
        </div>

        <div class="mb-8">
            <h3 class="font-semibold mb-3">Comments</h3>
            <div id="commentsContainer" class="space-y-4 max-h-[400px] overflow-y-auto">
                @foreach($comments as $comment)
                <div class="flex {{ $comment->user_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-xs px-4 py-2 rounded-lg 
                {{ $comment->user_id == auth()->id() 
                    ? 'bg-indigo-500 text-white rounded-br-none' 
                    : 'bg-gray-200 text-gray-800 rounded-bl-none' }}">
                        <p class="text-sm">{{ $comment->comment }}</p>
                        <span class="block text-xs mt-1 opacity-70">
                            {{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <form id="comment-form" action="{{ route('projects.comments.store', $project->id) }}" method="POST" class="flex items-center border border-gray-300 rounded-lg px-4 py-2 w-full">
            @csrf
            <input type="text" name="comment" id="comment-input" placeholder="Write a message..."
                class="flex-1 outline-none text-sm px-2 bg-transparent" required>
            <button type="submit" class="py-1 px-2 rounded-full bg-indigo-500 text-white hover:bg-indigo-600 transition">
                <i class="fa-solid fa-paper-plane text-lg"></i>
            </button>
        </form>
    </div>
</div>

<div id="editCredentialsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-xl font-bold mb-4">Edit Credentials</h2>

        <form id="editCredentialsForm" method="POST">
            @csrf
            @method('PUT')

            <!-- Website -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Website URL</label>
                <input type="text" name="reference_website" id="editWebsite"
                    class="w-full px-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Login -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Login</label>
                <input type="text" name="login" id="editLogin"
                    class="w-full px-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="text" name="password" id="editPassword"
                    class="w-full px-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <button type="button" onclick="closeEditModal()"
                    class="px-5 py-2 bg-gray-100 rounded-md text-gray-700 hover:bg-gray-200 font-medium">
                    Cancel
                </button>
                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-medium">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
<script src="https://js.pusher.com/8.0/pusher.min.js"></script>
<script>
    const commentsContainer = document.getElementById('commentsContainer');
    const commentForm = document.getElementById('comment-form');
    const commentInput = document.getElementById('comment-input');
    const projectId = "{{ $project->id }}";

    Pusher.logToConsole = true;

    var pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}"
    });

    // Subscribe to the channel
    const channel = pusher.subscribe('projects.' + projectId);

    // Listen for the CommentSent event
    channel.bind('App\\Events\\CommentSent', function(data) {
        appendNewComment(data.comment);
    });

    // Handle form submission with the Fetch API
    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();

        fetch(commentForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    comment: commentInput.value
                })
            })
            .then(response => response.json())
            .then(data => {
                commentInput.value = ''; // Clear input field
            })
            .catch(error => console.error('Error:', error));
    });

    // Helper function to create and add a new comment to the DOM
    function appendNewComment(comment) {
        const isSelf = comment.user_id == "{{ auth()->id() }}";
        const alignment = isSelf ? 'justify-end' : 'justify-start';
        const bubbleColor = isSelf ? 'bg-indigo-500 text-white rounded-br-none' : 'bg-gray-200 text-gray-800 rounded-bl-none';

        const newCommentHtml = `
            <div class="flex ${alignment}">
                <div class="max-w-xs px-4 py-2 rounded-lg ${bubbleColor}">
                    <p class="text-sm">${comment.comment}</p>
                    <span class="block text-xs mt-1 opacity-70">
                        ${comment.user.name} &bull; Just now
                    </span>
                </div>
            </div>
        `;
        commentsContainer.insertAdjacentHTML('beforeend', newCommentHtml);

        // This is the key change for scrolling
        commentsContainer.scrollTop = commentsContainer.scrollHeight;
    }
</script>
<script>
    function openEditModal(id, website, login, password) {
        document.getElementById('editWebsite').value = website;
        document.getElementById('editLogin').value = login;
        document.getElementById('editPassword').value = password;

        // Set form action
        document.getElementById('editCredentialsForm').action = `/credential-projects/${id}`;

        document.getElementById('editCredentialsModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editCredentialsModal').classList.add('hidden');
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let commentsDiv = document.getElementById("commentsContainer");
        if (commentsDiv) {
            commentsDiv.scrollTop = commentsDiv.scrollHeight;
        }
    });
</script>

@endsection