@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-table-box">
            <div class="transaction-table-box-head">
                <h3>Accesses</h3>
                <div class="add-user-butn">
                    <a href="{{ route('access.create') }}">Add Access</a>
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
                        @forelse ($accesses as $access)
                            <tr>
                                <td>{{ $access->name }}</td>
                                <td>
                                    <a href="{{ route('access.edit', $access->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('access.destroy', $access->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this access?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No accesses found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="transaction-table-footer">
                <div class="content">
                    <p>{{ $accesses->firstItem() }} to {{ $accesses->lastItem() }} of {{ $accesses->total() }} roles</p>
                </div>
                <div class="pagination-box">
                    @if ($accesses->onFirstPage())
                        <a class="prev" disabled>
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @else
                        <a href="{{ $accesses->previousPageUrl() }}" class="prev">
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @endif
                    @foreach ($accesses->getUrlRange(1, $accesses->lastPage()) as $page => $url)
                        @if ($page == $accesses->currentPage())
                            <a class="page-num active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="page-num">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($accesses->hasMorePages())
                        <a href="{{ $accesses->nextPageUrl() }}" class="next">
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
