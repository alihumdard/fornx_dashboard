@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-table-box">
            <div class="transaction-table-box-head">
                <h3>Platforms</h3>
                <div class="add-user-butn">
                    <a href="{{ route('platforms.create') }}">Add Platform</a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($platforms as $platform)
                            <tr>
                                <td>{{ $platform->name }}</td>
                                <td>{{ $platform->slug }}</td>
                                <td>
                                    <a href="{{ route('platforms.edit', $platform->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('platforms.destroy', $platform->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this platform?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No platforms found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="transaction-table-footer">
                <div class="content">
                    <p>{{ $platforms->firstItem() }} to {{ $platforms->lastItem() }} of {{ $platforms->total() }} platforms</p>
                </div>
                <div class="pagination-box">
                    @if ($platforms->onFirstPage())
                        <a class="prev" disabled>
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @else
                        <a href="{{ $platforms->previousPageUrl() }}" class="prev">
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" class="mx-2" alt="icon" />
                            Back
                        </a>
                    @endif
                    @foreach ($platforms->getUrlRange(1, $platforms->lastPage()) as $page => $url)
                        @if ($page == $platforms->currentPage())
                            <a class="page-num active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="page-num">{{ $page }}</a>
                        @endif
                    @endforeach
                    @if ($platforms->hasMorePages())
                        <a href="{{ $platforms->nextPageUrl() }}" class="next">
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
