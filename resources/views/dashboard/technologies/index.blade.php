@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-table-box">
            <div class="transaction-table-box-head">
                <h3>Technologies</h3>
                <div class="add-user-butn">
                    <a href="{{ route('technologies.create') }}">Add Technology</a>
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
                            <th>Slug</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr>
                                <td>{{ $technology->name }}</td>
                                <td>{{ $technology->slug }}</td>
                                <td>
                                    @if ($technology->icon)
                                        <img src="{{ asset('storage/' . $technology->icon) }}" alt="{{ $technology->name }}"
                                            style="width: 50px; height: 50px;">
                                    @else
                                        <span>No Icon</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('technologies.edit', $technology->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('technologies.destroy', $technology->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this technology?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No technologies found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="transaction-table-footer">
                <div class="content">
                    <p>{{ $technologies->firstItem() }} to {{ $technologies->lastItem() }} of {{ $technologies->total() }} technologies</p>
                </div>
                <div class="pagination-box">
                    @if ($technologies->onFirstPage())
                        <a class="prev" disabled>
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @else
                        <a href="{{ $technologies->previousPageUrl() }}" class="prev">
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @endif
                    @foreach ($technologies->getUrlRange(1, $technologies->lastPage()) as $page => $url)
                        @if ($page == $technologies->currentPage())
                            <a class="page-num active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="page-num">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($technologies->hasMorePages())
                        <a href="{{ $technologies->nextPageUrl() }}" class="next">
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
