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
                    <span class="font-semibold text-indigo-600">
                        {{ isset($project->progress) && is_numeric($project->progress) ? intval($project->progress) : 0 }}%
                    </span>
            </div>
            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-2 bg-indigo-600 rounded-full" style="width: {{ isset($project->progress) && is_numeric($project->progress) ? min(max(intval($project->progress),0),100) : 0 }}%"></div>
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
                    <input type="text" placeholder="Enter login"
                        class="w-full px-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>

                <!-- Password -->
                <div class="w-1/2">
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" placeholder="Enter password"
                        class="w-full px-4 py-2 border rounded-md text-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>
        </div>


        <!-- Buttons -->
        <div class="flex justify-end gap-4 mb-8">
            <button class="px-5 py-2 bg-gray-100 rounded-md text-gray-700 hover:bg-gray-200 font-medium">Cancel</button>
            <button class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-medium">Save</button>
        </div>

        <!-- About Project -->
        <div class="mb-5">
            <h3 class="font-semibold mb-3">About Project</h3>
            <div class="bg-gray-50 p-4 rounded-md text-sm leading-relaxed">
                {{ $project->description ?? 'No description available.' }}
            </div>
        </div>

    </div>
</div>

@endsection
