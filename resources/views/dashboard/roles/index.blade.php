@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-table-box">
            <div class="transaction-table-box-head">
                <h3>Roles</h3>
                <div class="add-user-butn">
                    <a href="{{ route('roles.create') }}">Add Role</a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this role?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No roles found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="transaction-table-footer">
                <div class="content">
                    <p>{{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} roles</p>
                </div>
                <div class="pagination-box">
                    @if ($roles->onFirstPage())
                        <a class="prev" disabled>
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @else
                        <a href="{{ $roles->previousPageUrl() }}" class="prev">
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @endif
                    @foreach ($roles->getUrlRange(1, $roles->lastPage()) as $page => $url)
                        @if ($page == $roles->currentPage())
                            <a class="page-num active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="page-num">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($roles->hasMorePages())
                        <a href="{{ $roles->nextPageUrl() }}" class="next">
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
    {{-- main content end --}}
@endsection
