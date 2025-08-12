@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-form-box">
            <h3>Add New User</h3>
            <div class="row">
                <div class="col-12">
                    <div class="transaction-form-content">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            @include('dashboard.users.partials.form')

                            <div class="transaction-form-butn d-flex justify-content-between align-items-center">
                                <button type="submit" class="custom-btn">Add New User</button>
                                <a href="{{ route('users.index') }}" class=" btn text-secondary">Back to List</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- main content end --}}
@endsection
