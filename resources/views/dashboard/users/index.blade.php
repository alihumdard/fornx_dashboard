@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-table-box">
            <div class="transaction-table-box-head">
                <h3>Users</h3>
                <div class="add-user-butn">
                    <a href="{{ route('users.create') }}">Add User</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('massage')
                </div>
            </div>
            <div class="transaction-table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Access</th>
                            <th>Status</th>
                            <th>Phone</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->access->name }}</td>
                                <td>
                                    <div class="dropdown-wrapper" data-user-id="{{ $user->id }}">
                                        
                                        <!-- Display current status text -->
                                        <span class="current-status {{ $user->status == 'active' ? 'text-success' : 'text-danger' }}">{{ $user->status == 'active' ? 'Active' : 'Inactive' }}</span>
                                        <span class="dropdown-toggle"></span>

                                        <div class="status-dropdown user-status">
                                            <ul>
                                                <li><a href="#" data-status="active">Active</a></li>
                                                <li><a href="#" data-status="inactive">Inactive</a></li>
                                            </ul>
                                        </div>
                                    </div>


                                </td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ($user->last_login_at)
                                        {{ $user->last_login_at->format('Y-m-d H:i:s') }}
                                    @else
                                        Never
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="">
                                        <i class="fa fa-eye text-info"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="">
                                        <i class="fas fa-edit text-warning"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="p-0 border-0 bg-transparent cursor-pointer"
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { this.closest('form').submit(); }">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="transaction-table-footer">
                <div class="content">
                    <p>{{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users</p>
                </div>
                <div class="pagination-box">
                    @if ($users->onFirstPage())
                        <a class="prev" disabled>
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="prev">
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @endif
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                            <a class="page-num active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="page-num">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="next">
                            Next <img src="{{ asset('assets/images/pagi-icon-2.png') }}" class="mx-2" alt="icon" />
                        </a>
                    @else
                        <a class="next" disabled>
                            Next <img src="{{ asset('assets/images/pagi-icon-2.png') }}" class="mx-2" alt="icon" />
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- main content end --}}
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                const wrapper = this.closest('.dropdown-wrapper');
                wrapper.classList.toggle('show');

                // Close others if needed
                document.querySelectorAll('.dropdown-wrapper').forEach(el => {
                    if (el !== wrapper) el.classList.remove('show');
                });

                e.stopPropagation();
            });
        });

        // Close on outside click
        document.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-wrapper').forEach(el => {
                el.classList.remove('show');
            });
        });

        // user-status

        document.querySelectorAll('.dropdown-wrapper .user-status a').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const status = this.getAttribute('data-status');
                const wrapper = this.closest('.dropdown-wrapper');
                const userId = wrapper.getAttribute('data-user-id');
                const statusSpan = wrapper.querySelector('.current-status');

                fetch(`/users/${userId}/update-status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            status: status
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // ✅ Update status text
                            statusSpan.textContent = status.charAt(0).toUpperCase() + status.slice(1);

                            // ✅ Update badge color (optional)
                            statusSpan.classList.remove('text-success', 'text-danger');
                            if (status === 'active') {
                                statusSpan.classList.add('text-success');
                            } else {
                                statusSpan.classList.add('text-danger');
                            }

                            // ✅ Show toast
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Status updated to ' + status,
                                showConfirmButton: false,
                                timer: 2000
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to update status',
                                toast: true,
                                position: 'top-end',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Something went wrong!',
                            toast: true,
                            position: 'top-end',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    });
            });
        });
    </script>
@endsection
