@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-form-box">
            <h3>Edit Project</h3>
            <div class="row">
                <div class="col-12">
                    <div class="transaction-form-content">
                        <form action="{{ route('projects.update',$project->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('dashboard.projects.partials.form',['project' => $project])

                            <div class="transaction-form-butn d-flex justify-content-between align-items-center">
                                <button type="submit" class="custom-btn">Update Project</button>
                                <a href="{{ route('projects.index') }}" class=" btn text-secondary">Back to List</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- main content end --}}
@endsection
