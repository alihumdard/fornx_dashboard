@extends('layouts.main')
@section('title', 'Project Details')

@section('content')

<div class="mt-10 bg-white rounded-xl shadow-md overflow-hidden">

    <!-- Header -->
    <div class="px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold text-gray-800">Project Details</h1>
        <a href="{{ route('projects.index') }}" class="text-sm text-blue-600 hover:underline">
            <i class="fas fa-arrow-left mr-2"></i>Back to All Projects
        </a>
    </div>

    <!-- Content -->
    <div class="px-6 py-4 border-t border-gray-200">
        <!-- Project Info -->
        <div class="flex flex-col gap-2 mb-6">
            <p class="text-sm text-gray-500">Project Name:</p>
            <h2 class="text-2xl font-semibold">{{ $project->name }}</h2>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 rounded-full text-sm font-medium 
                    @if($project->status == 'Completed') bg-green-100 text-green-700
                    @elseif($project->status == 'Delayed') bg-red-100 text-red-700
                    @else bg-blue-100 text-blue-700 @endif">
                    {{ $project->status }}
                </span>
                <span class="text-sm text-gray-600">Priority: <strong>{{ $project->priority }}</strong></span>
            </div>
        </div>

        <!-- Key Details Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div>
                <p class="text-sm text-gray-500">Client</p>
                <p class="font-medium">{{ $project->client->name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Start Date</p>
                <p class="font-medium">{{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">End Date</p>
                <p class="font-medium">{{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Technology</p>
                <p class="font-medium">{{ $project->technology }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Platform</p>
                <p class="font-medium">{{ $project->platform }}</p>
            </div>
             <div>
                <p class="text-sm text-gray-500">Country</p>
                <p class="font-medium">{{ $project->country }}</p>
            </div>
        </div>

        <!-- Progress -->
        <div class="mb-8">
            <div class="flex justify-between mb-2">
                <span class="font-medium">Progress</span>
                <span class="font-semibold text-indigo-600">{{ $project->progress }}%</span>
            </div>
            <div class="w-full h-2.5 bg-gray-200 rounded-full overflow-hidden">
                <div class="h-2.5 bg-indigo-600 rounded-full" style="width:{{ $project->progress }}%"></div>
            </div>
        </div>

        <!-- Financials -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
             <div>
                <p class="text-sm text-gray-500">Total Earning</p>
                <p class="font-medium text-green-600">${{ number_format($project->earning, 2) }}</p>
            </div>
             <div>
                <p class="text-sm text-gray-500">Paid to Outside</p>
                <p class="font-medium text-red-600">${{ number_format($project->paid_outside, 2) }}</p>
            </div>
        </div>

        <!-- About Project -->
        <div class="mb-5">
            <h3 class="font-semibold mb-3">About Project</h3>
            <div class="bg-gray-50 p-4 rounded-md text-sm leading-relaxed border">
                {{ $project->description ?? 'No description available.' }}
            </div>
        </div>
    </div>
</div>

@endsection
