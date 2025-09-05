@extends('layouts.main')
@section('title', 'Time Track')
<style>
/* Custom scrollbar for the Recent Activity section */
.custom-scrollbar::-webkit-scrollbar {
    width: 8px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background-color: #f1f5f9;
    /* slate-100 */
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: #94a3b8;
    /* slate-400 */
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background-color: #64748b;
    /* slate-500 */
}
</style>
@section('content')
<div class="container mx-auto max-w-7xl flex flex-col lg:flex-row gap-6">

    <div class="w-full sm:w-[80%] md:w-[60%] lg:w-[40%] space-y-4">
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-2 text-gray-700 font-medium">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Today's Attendance</span>
                </div>
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">Checked In</span>
            </div>
            <div class="text-center my-8">
                <h1 class="text-5xl font-bold text-gray-800 tracking-tight">11:40:20</h1>
                <p class="text-sm text-gray-500 mt-2">Thursday, August 21, 2025</p>
            </div>

            <div class="space-y-4">
                <div class="bg-lime-50 p-4 rounded-xl flex justify-between items-center">
                    <p class="text-gray-700 font-medium">Check-in Time</p>
                    <p class="text-gray-900 font-bold">12:45</p>
                </div>

                <div class="bg-lime-50 p-4 rounded-xl flex justify-between items-center">
                    <p class="text-gray-700 font-medium">Hours Today</p>
                    <p class="text-lime-500 font-bold">00:00</p>
                </div>
            </div>

            <button
                class="mt-6 w-full text-white font-medium py-3 rounded-xl shadow-lg transition-transform transform hover:scale-105 bg-red-500 hover:bg-red-600">
                Check Out
            </button>
        </div>

        <button id="request-leave-btn"
            class="w-full bg-white text-gray-700 font-medium py-3 rounded-2xl shadow-md flex items-center justify-center space-x-2 border border-gray-200 transition-transform transform hover:scale-105">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7v1h8V7a2 2 0 00-2-2H9a2 2 0 00-2 2zm10 0v1h2V7a2 2 0 00-2-2h-1v1h-2V5h-1v1H9V5H8V6H7V5H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2z">
                </path>
            </svg>
            <span>Request Leave</span>
        </button>
    </div>

    <div id="leave-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-lg mx-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Request Time off</h2>
                <button id="close-modal-btn" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <div class="relative">
                            <input type="date" id="start-date"
                                class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                        </div>
                    </div>

                    <div>
                        <label for="end-date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                        <div class="relative">
                            <input type="date" id="end-date"
                                class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                        </div>
                    </div>
                </div>

                <div id="duration-display" class="hidden flex items-center space-x-2 text-gray-700">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p>Duration: <span id="duration-days" class="font-semibold">0 days</span></p>
                </div>

                <div>
                    <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">Reason for Leave</label>
                    <textarea id="reason" rows="4"
                        class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors resize-none"
                        placeholder=""></textarea>
                </div>
            </div>

            <button
                class="mt-6 w-full text-white font-medium py-3 rounded-xl shadow-lg transition-transform transform hover:scale-105 flex items-center justify-center space-x-2"
                style="background-image: linear-gradient(to right, #6b46c1, #805ad5, #a361e6);">
                <svg class="w-5 h-5 text-white transform -rotate-45" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <span>Submit Request</span>
            </button>
        </div>
    </div>

    <div class="flex-1 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded-2xl shadow-md flex items-center justify-between border border-gray-200">
                <div>
                    <p class="text-sm text-gray-500 pb-5">This Month</p>
                    <p class="text-xl font-bold text-gray-800">18 days</p>
                    <div class="flex gap-10">
                        <p class="text-xs text-gray-400">Present days </p>
                        <p class="text-xs text-gray-400"><span class="text-green-500">+2 days</span> from last
                            month</p>
                    </div>
                </div>
                <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>


            <div class="bg-white p-4 rounded-2xl shadow-md flex items-center justify-between border border-gray-200">
                <div>
                    <p class="text-sm text-gray-500 pb-5">Total Hours</p>
                    <p class="text-xl font-bold text-gray-800">144:30</p>
                    <div class="flex gap-10">
                        <p class="text-xs text-gray-400">This month</p>
                        <p class="text-xs text-gray-400"><span class="text-green-500">+8.5 hrs</span> from last month
                        </p>
                    </div>
                </div>
                <div class="flex-shrink-0 bg-blue-100 text-blue-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>


            <div class="bg-white p-4 rounded-2xl shadow-md flex items-center justify-between border border-gray-200">
                <div>
                    <p class="text-sm text-gray-500 pb-5">Average Daily</p>
                    <p class="text-xl font-bold text-gray-800">8:15</p>
                    <div class="flex gap-10">
                        <p class="text-xs text-gray-400">Hours per day</p>
                        <p class="text-xs text-gray-400"><span class="text-green-500">+0:15</span>from last month
                        </p>
                    </div>
                </div>
                <div class="flex-shrink-0 bg-yellow-100 text-yellow-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2zm2-11V6a2 2 0 012-2h2a2 2 0 012 2v7">
                        </path>
                    </svg>
                </div>
            </div>

            <div class="bg-white p-4 rounded-2xl shadow-md flex items-center justify-between border border-gray-200">
                <div>
                    <p class="text-sm text-gray-500 pb-5">Expected Salary</p>
                    <p class="text-xl font-bold text-gray-800">
                        45,000 <span class="text-sm font-normal text-gray-500">PKR</span>
                    </p>
                    <p class="text-xs text-gray-400">Based on attendance</p>
                </div>
                <div class="flex-shrink-0 bg-green-100 text-green-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
            <div class="space-y-4 max-h-96 overflow-y-auto custom-scrollbar">

                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Today</p>
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>09:15 AM</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">In
                            Progress</span>
                        <span class="text-gray-600 font-medium">3:45</span>
                        <span class="text-xs text-gray-400">hours</span>
                    </div>
                </div>

                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Yesterday</p>
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>09:15 AM</span>
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <span>06:30 AM</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">Completed</span>
                        <span class="text-gray-600 font-medium">9:15</span>
                        <span class="text-xs text-gray-400">hours</span>
                    </div>
                </div>

                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Nov 17, 2024 (Sunday)</p>
                        <p class="text-sm text-gray-500 mt-1">Weekly off / Holiday</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">Holiday</span>
                        <span class="text-gray-400">---</span>
                        <span class="text-xs text-gray-400">off</span>
                    </div>
                </div>

                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Nov 18 - 20, 2024</p>
                        <p class="text-sm text-gray-500 mt-1">Approved by admin</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">Approved
                            Leave</span>
                        <span class="text-gray-400">---</span>
                        <span class="text-xs text-gray-400">Paid</span>
                    </div>
                </div>

                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Nov 19, 2024</p>
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>10:00 AM</span>
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <span>04:30 PM</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded-full">Incomplete</span>
                        <span class="text-gray-600 font-medium">8:15</span>
                        <span class="text-xs text-gray-400">hours</span>
                    </div>
                </div>

                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Nov 20, 2024</p>
                        <p class="text-sm text-gray-500 mt-1">No attendance recorded</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded-full">Absent</span>
                        <span class="text-gray-600 font-medium">00:00</span>
                        <span class="text-xs text-gray-400">hours</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('leave-modal');
    const openModalBtn = document.getElementById('request-leave-btn');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');
    const durationDisplay = document.getElementById('duration-display');
    const durationDaysSpan = document.getElementById('duration-days');

    // Function to open the modal
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    // Function to close the modal
    closeModalBtn.addEventListener('click', () => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    });

    // Close the modal when clicking outside of it
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    });

    // Function to calculate and display duration
    const calculateDuration = () => {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (startDateInput.value && endDateInput.value && startDate <= endDate) {
            const timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
            const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1; // +1 to include the end day

            durationDaysSpan.textContent = `${dayDiff} days`;
            durationDisplay.classList.remove('hidden');
            durationDisplay.classList.add('flex');
        } else {
            durationDisplay.classList.add('hidden');
            durationDisplay.classList.remove('flex');
        }
    };

    startDateInput.addEventListener('change', calculateDuration);
    endDateInput.addEventListener('change', calculateDuration);
});
</script>
@endpush