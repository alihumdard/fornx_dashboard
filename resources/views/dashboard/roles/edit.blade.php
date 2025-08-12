@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-form-box">
            <h3>Edit Role</h3>
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="transaction-form-content">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('dashboard.roles.partials.form', ['role' => $role])
                            
                            <div class="transaction-form-butn d-flex justify-content-between align-items-center">
                                <button type="submit" class="custom-btn">Update Role</button>
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
