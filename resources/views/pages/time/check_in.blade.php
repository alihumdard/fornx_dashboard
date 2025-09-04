@extends('layouts.main')
@section('title', 'Time Track')
<style>
    /* Custom scrollbar for the Recent Activity section */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background-color: #f1f5f9;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #94a3b8;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #64748b;
    }
</style>
@section('content')
<div class="container mx-auto max-w-7xl flex flex-col lg:flex-row gap-6">

    <div class="w-full sm:w-[80%] md:w-[60%] lg:w-[40%] space-y-4 mx-auto">
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-2 text-gray-700 font-medium">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Today's Attendance</span>
                </div>
                {{-- Dynamic Status --}}
                @if ($currentAttendance)
                @if ($currentAttendance->status === 'In Progress')
                <span class="bg-blue-50 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">In Progress</span>
                @elseif ($currentAttendance->status === 'Completed')
                <span class="bg-green-50 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Completed</span>
                @else
                <span class="bg-red-50 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">Not Started</span>
                @endif
                @else
                <span class="bg-red-50 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">Not Started</span>
                @endif
            </div>

            <div class="text-center my-8">
                {{-- Dynamic Time --}}
                @if ($currentAttendance && $currentAttendance->status === 'In Progress')
                <h1 class="text-5xl font-bold text-gray-800 tracking-tight" id="live-time">
                    {{ \Carbon\Carbon::parse($currentAttendance->check_in_time)->format('H:i:s') }}
                </h1>
                @else
                <h1 class="text-5xl font-bold text-gray-800 tracking-tight" id="live-time">
                    {{ now()->format('H:i:s') }}
                </h1>
                @endif
                <p class="text-sm text-gray-500 mt-2">{{ now()->format('l, F d, Y') }}</p>
            </div>
            <p class="text-center text-sm text-gray-500 mb-6">
                @if ($currentAttendance && $currentAttendance->status === 'In Progress')
                You are currently checked in.
                @elseif ($currentAttendance && $currentAttendance->status === 'Completed')
                You have completed your workday.
            <div class="space-y-4 mt-4">
                <div class="bg-lime-50 p-4 rounded-xl flex justify-between items-center">
                    <p class="text-gray-700 font-medium">Check-in Time</p>
                    <p class="text-gray-900 font-bold">{{ $currentAttendance->check_in_time->format('h:i A') }}</p>
                </div>
                <div class="bg-lime-50 p-4 rounded-xl flex justify-between items-center">
                    <p class="text-gray-700 font-medium">Hours Today</p>
                    <p class="text-lime-500 font-bold">
                        {{ floor($currentAttendance->total_minutes / 60) }}:{{ str_pad($currentAttendance->total_minutes % 60, 2, '0', STR_PAD_LEFT) }}
                    </p>
                </div>
            </div>
            @else
            Ready to start your workday?
            @endif
            </p>
            {{-- Dynamic Button --}}
            <form action="{{ route('time.check_in') }}" method="POST" id="attendance-form">
                @csrf
                <button type="submit"
                    class="w-full text-white font-medium py-3 rounded-xl shadow-lg transition-transform transform hover:scale-105
                    @if ($currentAttendance && $currentAttendance->status === 'In Progress')
                        bg-red-500 hover:bg-red-600
                    @elseif ($currentAttendance && $currentAttendance->status === 'Completed')
                        bg-red-300 cursor-not-allowed
                    @else
                        bg-blue-500 hover:bg-blue-600
                    @endif
                ">
                    @if ($currentAttendance && $currentAttendance->status === 'In Progress')
                    Check out
                    @elseif ($currentAttendance && $currentAttendance->status === 'Completed')
                    Checked out
                    @else
                    Check in
                    @endif
                </button>
            </form>
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

    <div id="leave-modal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-lg mx-4">
            <form action="{{ route('time.leave.submit') }}" method="POST">
                @csrf
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Request Time off</h2>
                    <button type="button" id="close-modal-btn" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="start-date" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                            <input type="date" id="start-date" name="start_date" required
                                class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                        </div>

                        <div>
                            <label for="end-date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                            <input type="date" id="end-date" name="end_date" required
                                class="w-full pl-4 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
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
                        <textarea id="reason" name="reason" rows="4" required
                            class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors resize-none"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="mt-6 w-full text-white font-medium py-3 rounded-xl shadow-lg transition-transform transform hover:scale-105 flex items-center justify-center space-x-2"
                    style="background-image: linear-gradient(to right, #6b46c1, #805ad5, #a361e6);">
                    <svg class="w-5 h-5 text-white transform -rotate-45" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    <span>Submit Request</span>
                </button>
            </form>
        </div>
    </div>

    <div class="flex-1 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- This Month Card --}}
            <div class="bg-white p-4 rounded-2xl shadow-md flex items-center justify-between border border-gray-200">
                <div>
                    <p class="text-sm text-gray-500 pb-5">This Month</p>
                    <p class="text-xl font-bold text-gray-800">{{ $presentDays }} days</p>
                    <div class="flex gap-10">
                        <p class="text-xs text-gray-400">Present days </p>
                        <p class="text-xs text-gray-400">
                            <span class="{{ $presentDaysDifference >= 0 ? 'text-green-500' : 'text-red-500' }}">{{ $presentDaysDifference > 0 ? '+' : '' }}{{ $presentDaysDifference }} days</span> from last month
                        </p>
                    </div>
                </div>
                <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>

            {{-- Total Hours Card --}}
            <div class="bg-white p-4 rounded-2xl shadow-md flex items-center justify-between border border-gray-200">
                <div>
                    <p class="text-sm text-gray-500 pb-5">Total Hours</p>
                    <p class="text-xl font-bold text-gray-800">{{ $totalMonthlyFormatted }}</p>
                    <div class="flex gap-10">
                        <p class="text-xs text-gray-400">This month</p>
                        <p class="text-xs text-gray-400">
                            <span class="{{ $hoursDifference >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                {{ $hoursDifference > 0 ? '+' : '' }}{{ round($hoursDifference, 1) }} hrs
                            </span> from last month
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

            {{-- Average Daily Card --}}
            <div class="bg-white p-4 rounded-2xl shadow-md flex items-center justify-between border border-gray-200">
                <div>
                    <p class="text-sm text-gray-500 pb-5">Average Daily</p>
                    <p class="text-xl font-bold text-gray-800">{{ $averageDailyFormatted }}</p>
                    <div class="flex gap-10">
                        <p class="text-xs text-gray-400">Hours per day</p>
                        <p class="text-xs text-gray-400"><span class="text-green-500">+0:15</span>from last month</p>
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

            {{-- Expected Salary Card (Placeholder) --}}
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

                {{-- Today's Attendance --}}
                @if ($currentAttendance)
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Today</p>
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($currentAttendance->check_in_time)->format('h:i A') }}</span>
                            @if ($currentAttendance->check_out_time)
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($currentAttendance->check_out_time)->format('h:i A') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        @if ($currentAttendance->status === 'In Progress')
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">In Progress</span>
                        <span class="text-gray-600 font-medium" id="current-duration"></span>
                        <span class="text-xs text-gray-400">hours</span>
                        @else
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">Completed</span>
                        <span class="text-gray-600 font-medium">{{ floor($currentAttendance->total_minutes / 60) }}:{{ str_pad($currentAttendance->total_minutes % 60, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="text-xs text-gray-400">hours</span>
                        @endif
                    </div>
                </div>
                @endif

                {{-- Recent Attendance History --}}
                @foreach ($recentActivity as $activity)
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($activity->date)->format('M d, Y') }}</p>
                        @if ($activity->status === 'Completed')
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($activity->check_in_time)->format('h:i A') }}</span>
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($activity->check_out_time)->format('h:i A') }}</span>
                        </div>
                        @else
                        <p class="text-sm text-gray-500 mt-1">No attendance recorded</p>
                        @endif
                    </div>
                    <div class="flex items-center space-x-2">
                        @if ($activity->status === 'Completed')
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full">Completed</span>
                        <span class="text-gray-600 font-medium">{{ floor($activity->total_minutes / 60) }}:{{ str_pad($activity->total_minutes % 60, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="text-xs text-gray-400">hours</span>
                        @else
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded-full">Absent</span>
                        <span class="text-gray-600 font-medium">00:00</span>
                        <span class="text-xs text-gray-400">hours</span>
                        @endif
                    </div>
                </div>
                @endforeach

                {{-- Recent Leave History --}}
                @foreach ($leaves as $leave)
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-medium text-gray-800">
                            {{ \Carbon\Carbon::parse($leave->start_date)->format('M d, Y') }}
                            @if ($leave->start_date !== $leave->end_date)
                            - {{ \Carbon\Carbon::parse($leave->end_date)->format('M d, Y') }}
                            @endif
                        </p>
                        <p class="text-sm text-gray-500 mt-1">{{ $leave->reason }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        @if ($leave->status === 'Approved')
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded-full">Approved Leave</span>
                        <span class="text-gray-400">---</span>
                        <span class="text-xs text-gray-400">Paid</span>
                        @elseif ($leave->status === 'Pending')
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded-full">Pending</span>
                        <span class="text-gray-400">---</span>
                        <span class="text-xs text-gray-400"></span>
                        @else
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-1 rounded-full">Rejected</span>
                        <span class="text-gray-400">---</span>
                        <span class="text-xs text-gray-400"></span>
                        @endif
                    </div>
                </div>
                @endforeach

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
        const attendanceForm = document.getElementById('attendance-form');
        const attendanceBtn = attendanceForm.querySelector('button');

        // Dynamically change form action and button text
        const updateAttendanceForm = () => {
            const status = "{{ $currentAttendance ? $currentAttendance->status : 'Not Started' }}";
            if (status === 'In Progress') {
                attendanceForm.action = "{{ route('time.check_out') }}";
                attendanceBtn.textContent = 'Check out';
            } else if (status === 'Completed') {
                attendanceForm.action = "{{ route('time.check_in') }}";
                attendanceBtn.textContent = 'Check out';
            } else {
                attendanceForm.action = "{{ route('time.check_in') }}";
                attendanceBtn.textContent = 'Check in';
            }
        };

        // Live timer for current attendance duration
        const updateLiveDuration = () => {
            const status = "{{ $currentAttendance ? $currentAttendance->status : 'Not Started' }}";
            if (status === 'In Progress') {
                const checkInTime = new Date("{{ $currentAttendance ? $currentAttendance->check_in_time : '' }}");
                const now = new Date();
                const diffInSeconds = Math.floor((now - checkInTime) / 1000);
                const hours = Math.floor(diffInSeconds / 3600);
                const minutes = Math.floor((diffInSeconds % 3600) / 60);
                const seconds = diffInSeconds % 60;

                const durationElement = document.getElementById('current-duration');
                if (durationElement) {
                    durationElement.textContent = `${hours}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                }
            }
        };

        // Live timer for display time
        const updateLiveTime = () => {
            const timeElement = document.getElementById('live-time');
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            const formattedHours = hours % 12 === 0 ? 12 : hours % 12;

            const timeString = `${formattedHours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            timeElement.textContent = timeString;
        };

        // Initial setup
        updateAttendanceForm();
        setInterval(updateLiveDuration, 1000); // Update duration every second
        setInterval(updateLiveTime, 1000); // Update display time every second

        // Leave Modal functionality
        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        });

        // Function to calculate and display leave duration
        const calculateDuration = () => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (startDateInput.value && endDateInput.value && startDate <= endDate) {
                const timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
                const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
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