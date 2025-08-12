<div class="row">
    {{-- name --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label my-2">Project Name</label>
            <input type="text" name="project_name" class="form-control"
                value="{{ old('project_name', $project->project_name ?? '') }}" placeholder="Enter Project Name">
            @if ($errors->has('project_name'))
                <small class="text-danger">{{ $errors->first('project_name') }}</small>
            @endif
        </div>
    </div>
    {{-- client_name --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <label class="form-label my-2">Client Name</label>
            <input type="text" class="form-control" name="client_name"
                value="{{ old('client_name', $project->clint_name ?? '') }}" placeholder="Enter Client Name">
            @if ($errors->has('client_name'))
                <small class="text-danger">{{ $errors->first('client_name') }}</small>
            @endif
        </div>
    </div>
    {{-- country --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group" id="role-selec-dropdown">
            <label>Country</label>
            <select name="country_id" class="form-control" id="">
                <option value="">Select country</option>
                @foreach ($countries as $country)
                    @php
                        $selected = '';
                        if (isset($project)) {
                            $selected = $project->country == $country->id ? 'selected' : '';
                        }
                    @endphp
                    <option {{ $selected }} value="{{ $country->id }}"
                        {{ old('country_id', $project->country_id ?? '') == $country->id ? 'selected' : '' }}>
                        {{ $country->country_name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('country_id'))
                <small class="text-danger">{{ $errors->first('country_id') }}</small>
            @endif
        </div>
    </div>
    {{-- platform --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group" id="platform-selec-dropdown">
            <label>Platform</label>
            <select name="platform_id" class="form-control" id="">
                <option value="">Select platform</option>
                @foreach ($platforms as $platform)
                    <option value="{{ $platform->id }}"
                        {{ old('platform_id', $project->platform_id ?? '') == $platform->id ? 'selected' : '' }}>
                        {{ $platform->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('platform_id'))
                <small class="text-danger">{{ $errors->first('platform_id') }}</small>
            @endif
        </div>
    </div>
    {{-- priority --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group" id="priority-selec-dropdown">
            <label>Priority</label>
            <select name="priority_id" class="form-control">
                <option value="">Select priority</option>
                <option value="low" {{ isset($project) && $project->priority == 'low' ? 'selected' : '' }}>Low
                </option>
                <option value="medium" {{ isset($project) && $project->priority == 'medium' ? 'selected' : '' }}>Medium
                </option>
                <option value="high" {{ isset($project) && $project->priority == 'high' ? 'selected' : '' }}>High
                </option>
                <option value="urgent" {{ isset($project) && $project->priority == 'urgent' ? 'selected' : '' }}>Urgent
                </option>
            </select>

            @if ($errors->has('priority_id'))
                <small class="text-danger">{{ $errors->first('priority_id') }}</small>
            @endif
        </div>
    </div>
    {{-- technology --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group" id="technology-selec-dropdown">
            <label>Technology</label>
            <select name="technology_id" class="form-control" id="">
                <option value="">Select technology</option>
                @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}"
                        {{ old('technology_id', $project->technology_id ?? '') == $technology->id ? 'selected' : '' }}>
                        {{ $technology->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('technology_id'))
                <small class="text-danger">{{ $errors->first('technology_id') }}</small>
            @endif
        </div>

    </div>
    {{-- start date --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control"
                value="{{ old('start_date', $project->start_date ?? '') }}" placeholder="Enter Start Date">
        </div>
        @if ($errors->has('start_date'))
            <small class="text-danger">{{ $errors->first('start_date') }}</small>
        @endif
    </div>
    {{-- end date --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control"
                value="{{ old('end_date', $project->end_date ?? '') }}" placeholder="Enter End Date">
        </div>
        @if ($errors->has('end_date'))
            <small class="text-danger">{{ $errors->first('end_date') }}</small>
        @endif
    </div>
    {{-- earn from project --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group">
            <label>Earn From Project</label>
            <input type="number" name="earn_from_project" class="form-control"
                value="{{ old('earn_from_project', $project->earn_from_project ?? '') }}"
                placeholder="Enter Earn From Project">
        </div>
        @if ($errors->has('earn_from_project'))
            <small class="text-danger">{{ $errors->first('earn_from_project') }}</small>
        @endif
    </div>
    {{-- paid to outside --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group">
            <label>Paid To Outside</label>
            <input type="number" name="paid_to_outside" class="form-control"
                value="{{ old('paid_to_outside', $project->paid_to_outside ?? '') }}"
                placeholder="Enter Paid To Outside">
        </div>
        @if ($errors->has('paid_to_outside'))
            <small class="text-danger">{{ $errors->first('paid_to_outside') }}</small>
        @endif

    </div>
    {{-- work done by --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group">
            <label>Work Done By</label>
            <select name="work_done_by[]" class="form-control" id="work_done_by" multiple>
                @foreach ($workers as $worker)
                    @php
                        if (isset($project) && $project) {
                            $selected = $worker->id == $project->project_users->id ? 'selected' : '';
                        }
                    @endphp

                    <option value="{{ $worker->id }}" {{ $selected }}>
                        {{ $worker->name }}
                    </option>
                @endforeach

            </select>
        </div>
        @if ($errors->has('work_done_by'))
            <small class="text-danger">{{ $errors->first('work_done_by') }}</small>
        @endif
    </div>
    {{-- project guide --}}
    <div class="col-lg-6 col-sm-12-col-12">
        <div class="form-group ">
            <label for="" class="mb-2">Project Guide</label>
            <!-- Trigger Button -->
            <div class="ms-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="toggleGuideSwitch">
                    <label class="form-check-label" for="toggleGuideSwitch">Project Guide</label>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addGuideModal" tabindex="-1" aria-labelledby="addGuideModalLabel"
        aria-hidden="true">
        <div class="modal-dialog project-guide-modal">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Modal Body Content -->
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="website_url" class="form-label">Reference Website</label>
                                <input type="text" class="form-control" id="website_url" name="website_url"
                                    value="{{ $project->project_guide->website_url ?? '' }}"
                                    placeholder="Enter Website URL">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="project_description">Project Description</label>
                                <textarea name="project_description" class="form-control" id="project_description">{{ $project->project_guide->project_description ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="cpanel">CPANEL</label>
                                <input type="text" name="cpanel" id="cpanel"
                                    value="{{ $project->project_guide->cpanel ?? '' }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <h4>Credentials</h4>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                    value="{{ $project->project_guide->email ?? '' }}" id="email"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="text" name="password"
                                    value="{{ $project->project_guide->password ?? '' }}" id="password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="note">Note</label>
                                <textarea name="note" class="form-control" id="note">{{ $project->project_guide->note ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">

                    <button type="button" class="custom-btn" id="saveGuideBtn">Save</button>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggle = document.getElementById("toggleGuideSwitch");

        toggle.addEventListener("change", function() {
            if (this.checked) {
                const guideModal = new bootstrap.Modal(document.getElementById('addGuideModal'));
                guideModal.show();
                // Auto uncheck after modal opens (optional)
                setTimeout(() => toggle.checked = false, 300);
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const saveBtn = document.getElementById("saveGuideBtn");

        saveBtn.addEventListener("click", function() {
            // Close modal using Bootstrap 5 modal instance
            const guideModalEl = document.getElementById('addGuideModal');
            const modalInstance = bootstrap.Modal.getInstance(guideModalEl);
            modalInstance.hide();
        });
    });
</script>
