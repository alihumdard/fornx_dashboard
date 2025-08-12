@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-form-box">
            <h3>Add New Access</h3>
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="transaction-form-content">
                        <form action="{{ route('access.store') }}" method="POST">
                            @csrf
                            @include('dashboard.access.partials.form')

                            <div class="transaction-form-butn d-flex justify-content-between align-items-center">
                                <button type="submit" class="custom-btn">Add New Role</button>
                                <a href="{{ route('roles.index') }}" class=" btn text-secondary">Back to List</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- main content end --}}
@endsection
