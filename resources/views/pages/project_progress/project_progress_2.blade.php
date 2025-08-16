@extends('layouts.main')
@section('title', 'Dashbaord')

@section('content')

<div class="mt-10 bg-white rounded-xl shadow-md overflow-hidden">

    <!-- Header -->
    <div class="px-6 py-4 font-semibold text-lg">
        Project Progress & Discussion
    </div>

    <!-- Content -->
    <div class="px-6">
        <!-- Project Info -->
        <div class="flex flex-col gap-2 mb-6">
            <p>Project Name:</p>
            <h2 class="text-xl font-semibold">Website builder development</h2>
            <span class="bg-green-100 text-green-700 w-24 px-3 py-1 rounded-full text-sm font-medium">On going</span>
        </div>

        <!-- Dates -->
        <div class="flex gap-10 mb-6">
            <div>
                <p class="text-sm text-gray-500">Start Date</p>
                <p class="font-medium">25/11/2022</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">End Date</p>
                <p class="font-medium">25/11/2022</p>
            </div>
        </div>

        <div class="pb-5">
            <p>website:</p>
            <p class="text-indigo-600">www.websiteurl.com</p>
        </div>

        <!-- Progress -->
        <div class="mb-8">
            <div class="flex justify-between mb-2">
                <span class="font-medium">Progress</span>
                <span class="font-semibold text-indigo-600">75%</span>
            </div>
            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                <div class="h-2 bg-indigo-600 rounded-full" style="width:75%"></div>
            </div>
            <p class="text-right text-sm text-gray-500 mt-2">2 days remaining</p>
        </div>


        <!-- About Project -->
        <div class="mb-5">
            <h3 class="font-semibold mb-3">About Project</h3>
            <div class="bg-gray-50 p-4 rounded-md text-sm leading-relaxed">
                This project involves the development of a comprehensive website builder that allows users to create
                professional websites without coding knowledge. The platform will feature drag-and-drop functionality,
                customizable templates, and responsive design options. The project is currently in the development phase
                with 75% completion and is expected to be finalized within the next 2 days.
            </div>
        </div>

        <div class="flex items-start gap-3 pb-5">
            <img src="{{ asset('assets/images/image.png') }}" alt="Image" class="w-10 h-10 rounded-lg object-cover">

            <div class="flex-1">
                <textarea
                    class="w-full h-[100px] px-[10px] py-[8px] text-[14px] text-[#333] border border-[#d0d0d0] rounded-[3px] placeholder-[#a0a0a0] focus:outline-none focus:border-[#a0a0a0] resize-none"
                    placeholder="Write your message here..."></textarea>
            </div>
        </div>

        <div class="flex items-center border border-gray-300 rounded-lg px-4 py-2 w-full mb-20">
            <!-- Input -->
            <input type="text" placeholder="Write a message..."
                class="flex-1 outline-none text-sm px-2 bg-transparent" />

            <!-- Icons -->
            <div class="flex items-center gap-3 text-gray-500">
                <!-- Emoji Icon -->
                <button class="py-1 px-2 rounded-full bg-indigo-500 text-white hover:bg-indigo-600 transition">
                    <i class="fa-solid fa-paper-plane text-lg"></i>
                </button>


                <!-- Attach Icon -->
                <button class="hover:text-indigo-500 transition">
                    <i class="fa-solid fa-paperclip text-lg"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Notification Script -->
<script>
const saveBtn = document.querySelector('.bg-indigo-600');
const cancelBtn = document.querySelector('.bg-gray-100');

saveBtn.addEventListener('click', () => {
    const login = document.querySelector('input[placeholder="Enter login"]').value;
    const password = document.querySelector('input[placeholder="Enter password"]').value;

    showNotification(login && password ? 'Credentials saved successfully!' :
        'Please fill in all credential fields!', login && password);
});

cancelBtn.addEventListener('click', () => {
    document.querySelector('input[placeholder="Enter login"]').value = '';
    document.querySelector('input[placeholder="Enter password"]').value = '';
});

function showNotification(message, success = true) {
    const notification = document.createElement('div');
    notification.className =
        `fixed top-5 right-5 px-5 py-3 rounded-md shadow-lg text-white ${success ? 'bg-green-600' : 'bg-red-500'}`;
    notification.textContent = message;
    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.add('opacity-0', 'transition', 'duration-500');
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}
</script>

@endpush