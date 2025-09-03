@extends('layouts.main')
@section('title', 'Leave Requests')

@section('content')

<div class="py-4">
    <h1 class="text-2xl font-semibold text-gray-800">Leave Requests</h1>
</div>
<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Reason
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Dates
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Requested At
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($leaves as $leave)
                <tr id="leave-row-{{ $leave->id }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $leave->user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $leave->user->email }}</div>
                                <div class="text-xs text-gray-400">
                                    @foreach($leave->user->roles as $role)
                                    {{ $role->name }} {{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $leave->reason }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($leave->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($leave->end_date)->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <span id="status-badge-{{ $leave->id }}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            @if($leave->status == 'Approved') bg-green-100 text-green-800
                            @elseif($leave->status == 'Rejected') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ $leave->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($leave->created_at)->format('Y-m-d') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <select class="status-dropdown block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                            data-leave-id="{{ $leave->id }}">
                            <option value="Pending" {{ $leave->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Approved" {{ $leave->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                            <option value="Rejected" {{ $leave->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-sm text-gray-500">No leave requests found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.status-dropdown').on('change', function() {
            const leaveId = $(this).data('leave-id');
            const newStatus = $(this).val();
            const token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: `/leaves/${leaveId}/status`,
                method: 'POST',
                data: {
                    _token: token,
                    status: newStatus
                },
                success: function(response) {
                    // Update the status badge on the page
                    const badge = $(`#status-badge-${leaveId}`);
                    badge.text(newStatus);
                    badge.removeClass('bg-green-100 bg-red-100 bg-yellow-100 text-green-800 text-red-800 text-yellow-800');
                    if (newStatus === 'Approved') {
                        badge.addClass('bg-green-100 text-green-800');
                    } else if (newStatus === 'Rejected') {
                        badge.addClass('bg-red-100 text-red-800');
                    } else {
                        badge.addClass('bg-yellow-100 text-yellow-800');
                    }
                    console.log(response.message);
                },
                error: function(xhr) {
                    console.error('Error updating status:', xhr.responseText);
                }
            });
        });
    });
</script>
@endpush