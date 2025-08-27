@extends('layouts.main')
@section('title', 'Project Progress')

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
                <span class="font-semibold text-indigo-600">{{ $project->progress }}%</span>
            </div>
            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                <div class="h-2 bg-indigo-600 rounded-full" style="width:{{ $project->progress }}%"></div>
            </div>
            <p class="text-right text-sm text-gray-500 mt-2">{{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($project->end_date), false) }} days remaining</p>
        </div>


        <!-- About Project -->
        <div class="mb-5">
            <h3 class="font-semibold mb-3">About Project</h3>
            <div class="bg-gray-50 p-4 rounded-md text-sm leading-relaxed">
                {{ $project->description ?? 'No description available.' }}
            </div>
        </div>

        <div class="flex items-center border border-gray-300 rounded-lg px-4 py-2 w-full mb-20">
            <!-- Input -->
            <input type="text" placeholder="Write a message..."
                class="flex-1 outline-none text-sm px-2 bg-transparent" />

            <!-- Icons -->
            <div class="flex items-center gap-3 text-gray-500">
                <button class="py-1 px-2 rounded-full bg-indigo-500 text-white hover:bg-indigo-600 transition">
                    <i class="fa-solid fa-paper-plane text-lg"></i>
                </button>


                <button class="hover:text-indigo-500 transition">
                    <i class="fa-solid fa-paperclip text-lg"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
