@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}

    <div class="dashboard-body-content">
        <div class="transaction-form-box">
            <h3>Users</h3>
            <div class="user-profile-box">
                <div class="img-box text-center">
                    <img id="profileImage" src="{{ asset($user->profile) }}" alt="Profile Image" />
                    <!-- Hidden Input or use data-id -->
                    <div class="edit-butn">
                        <a href="javascript:;" id="editPhotoBtn" data-user-id="{{ $user->id }}">Edit Photo</a>
                        <input type="file" id="photoInput" style="display: none;" accept="image/*">
                    </div>

                </div>

                <div class="content-wrapper">
                    <div class="content">
                        <ul class="list-unstyled">
                            <li>
                                <span>Name</span>
                                <p>{{ $user->name }}</p>
                            </li>
                            <li>
                                <span>Gender</span>
                                <p>{{ $user->gender }}</p>
                            </li>
                            <li>
                                <span>Email</span>
                                <p>{{ $user->email }}</p>
                            </li>
                            <li>
                                <span>Phone Number</span>
                                <p>{{ $user->phone }}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="content-butn">
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    </div>
                </div>
            </div>
            <div class="projects-box">
                <h3>Projects</h3>
                <div class="projects-detail">
                    <ul class="list-unstyled">
                        <li>
                            <p>All Projects</p>
                            <div class="figr">
                                <span>{{ count($user->projects) }}</span>
                            </div>
                        </li>
                        <li>
                            <p>In Progress</p>
                            <div class="figr">
                                <span>{{ count($projects_inprogress) }}</span>
                            </div>
                        </li>
                        <li>
                            <p>Canceled</p>
                            <div class="figr">
                                <span>{{ count($projects_cancel) }}</span>
                            </div>
                        </li>
                        <li>
                            <p>Completed</p>
                            <div class="figr">
                                <span>{{ count($projects_completed) }}</span>
                            </div>
                        </li>
                    </ul>
                    <div class="projects-detail-progress">
                        <div class="inner" style="width: 12%;"></div>
                    </div>
                </div>
            </div>
            <div class="project-progress-table">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Status</th>
                            <th>Users</th>
                            <th>Progress</th>
                            <th>Preview</th>
                            <th>Due Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->projects as $project)
                            <tr>
                                <td>{{ $project->project_name }}</td>
                                <td>
                                    <span
                                        class="status {{ $project->status == 'Completed' ? 'completed' : ($project->status == 'In Progress' ? 'in-progress' : ($project->status == 'Pending' ? 'pending' : ($project->status == 'Cancel' ? 'canceled' : ''))) }}">{{ $project->status }}</span>
                                </td>
                                <td>
                                    <div class="img-wrap">
                                        @foreach ($project->project_users as $project_user)
                                            <img src="{{ asset($project_user->profile) }}" alt="vector" />
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="progress-wrap">
                                        <span>{{ $project->progress }}%</span>
                                        <div class="progress-bar">
                                            <div class="inner" style="width: {{ $project->progress }}%;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <div class="website-butn">
                                        <a href="{{ $project->project_guide->website_url }}" target="_blank">
                                            <img src="{{ asset('assets/images/external-link.png') }}" alt="icon" />
                                            <p>Website</p>
                                        </a>
                                    </div>
                                </td>
                                <td>2024-06-07</td>
                                <td class="action-icons">
                                    <a href="javascript:;" class="edit" data-id="{{ $project->id }}"
                                        data-name="{{ $project->project_name }}" data-status="{{ $project->status }}"
                                        data-progress="{{ $project->progress }}"
                                        data-url="{{ $project->project_guide->website_url }}"
                                        data-date="{{ $project->due_date ?? '2024-06-07' }}">

                                        <img src="{{ asset('assets/images/table-editicon.png') }}" alt="">
                                    </a>


                                    <a href="javascript:;" class="delete">
                                        <img src="{{ asset('assets/images/table-delete-icon.png') }}" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="project-progress-table-footer">
                <div class="content">
                    <p>
                        Showing {{ $user->projects->firstItem() }} - {{ $user->projects->lastItem() }} from
                        {{ $user->projects->total() }}
                    </p>
                </div>

                <div class="pagination-box">
                    {{-- Previous button --}}
                    @if ($user->projects->onFirstPage())
                        <button class="prev" disabled>
                            <img src="{{ asset('assets/images/pagi-icon.png') }}" alt="icon">
                            Back
                        </button>
                    @else
                        <a href="{{ $user->projects->previousPageUrl() }}">
                            <button class="prev">
                                <img src="{{ asset('assets/images/pagi-icon.png') }}" alt="icon">
                                Back
                            </button>
                        </a>
                    @endif

                    {{-- Page numbers --}}
                    @php
                        $start = max($user->projects->currentPage() - 2, 1);
                        $end = min($start + 4, $user->projects->lastPage());
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $user->projects->url($i) }}">
                            <button class="page-num {{ $user->projects->currentPage() == $i ? 'active' : '' }}">
                                {{ $i }}
                            </button>
                        </a>
                    @endfor

                    @if ($user->projects->lastPage() > $end)
                        <button class="page-num" disabled>...</button>
                        <a href="{{ $user->projects->url($user->projects->lastPage()) }}">
                            <button class="page-num">{{ $user->projects->lastPage() }}</button>
                        </a>
                    @endif

                    {{-- Next button --}}
                    @if ($user->projects->hasMorePages())
                        <a href="{{ $user->projects->nextPageUrl() }}">
                            <button class="next">
                                Next
                                <img src="{{ asset('assets/images/pagi-icon-2.png') }}" alt="icon">
                            </button>
                        </a>
                    @else
                        <button class="next" disabled>
                            Next
                            <img src="{{ asset('assets/images/pagi-icon-2.png') }}" alt="icon">
                        </button>
                    @endif
                </div>
            </div>

            <div class="project-progress-colmns">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="content-box">
                            <div class="head-content">
                                <p>Revenue</p>
                                <div class="date-box">
                                    <img src="{{ asset('assets/images/date-icon.png') }}" alt="icon" />
                                    <span>25/11/2022</span>
                                </div>
                            </div>
                            <h3>$500 <img src="{{ asset('assets/images/green-arrow.png') }}" alt="icon" /></h3>
                            <span>Total amount from all the projects</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="content-box">
                            <div class="head-content">
                                <p>Projects</p>
                                <div class="date-box">
                                    <img src="{{ asset('assets/images/date-icon.png') }}" alt="icon" />
                                    <span>25/11/2022</span>
                                </div>
                            </div>
                            <h3>$250 <img src="{{ asset('assets/images/yellow-arrow.png') }}" alt="icon" /></h3>
                            <span>Paid amount from all the projects</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="content-box">
                            <p>Overall Progress</p>
                            <div class="progress-img">
                                <img src="{{ asset('assets/images/progress-bar.png') }}" alt="vector" />
                            </div>
                            <div class="percentage">{{ $overallProgress }}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- main content end --}}
    <!-- update-user-popup -->
    <div class="update-user-popup">
        <div class="update-user-popup-box">
            <div class="update-user-table">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Status</th>
                            <th>Users</th>
                            <th>Progress</th>
                            <th>Preview</th>
                            <th>Due Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-id="">
                            <td>Web Development</td>
                            <td>
                                <div class="status-box-wrap" id="status-box-dropdown">
                                    <span class="status " id="selected-status">Completed</span>
                                    <img src="{{ asset('assets/images/arrow-down-gray.png') }}" alt="icon" />
                                </div>
                                <div class="table-status-drop" id="table-status-dropdown">
                                    <ul class="list-unstyled">
                                        <li>Pending</li>
                                        <li>Completed</li>
                                        <li>In Progress</li>
                                        <li>Canceled</li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="img-wrap">
                                    <img src="{{ asset('assets/images/table-group-img.png') }}" alt="vector" />
                                </div>
                            </td>
                            <td>
                                <div class="progress-wrap" id="progress-wrap-dropdown">
                                    <div class="progress-wrap-sub">
                                        <span id="selected-progress">75%</span>
                                        <div class="progress-bar">
                                            <div class="inner"></div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/images/arrow-down-gray.png') }}" alt="icon" />
                                </div>
                                <div class="progress-status-drop" id="progress-status-dropdown">
                                    <ul class="list-unstyled">
                                        <li>25%</li>
                                        <li>50%</li>
                                        <li>75%</li>
                                        <li>Completed</li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="website-butn">
                                    <a href="javascript:;">
                                        <img src="{{ asset('assets/images/external-link.png') }}" alt="icon" />
                                        <p>Website</p>
                                    </a>
                                </div>
                            </td>
                            <td>2024-06-07</td>
                            <td class="action-icons">
                                <a href="javascript:;" class="edit">
                                    <img src="{{ asset('assets/images/table-editicon.png') }}" alt="">
                                </a>
                                <a href="javascript:;" class="delete">
                                    <img src="{{ asset('assets/images/table-delete-icon.png') }}" alt="">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- <div class="project-detail">
                <h3>Project Detail</h3>
                <textarea rows="10" cols="50" placeholder="Project detail discussion"></textarea>
            </div> --}}
            <div class="update-user-popups-butns">
                <div class="cancel-butn">
                    <a href="javascript:;">
                        <span>Cancel</span>
                    </a>
                </div>
                <div class="changes-butn">
                    <a href="javascript:;">
                        <span>Save Changes</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- update-user-popup -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const photoInput = document.getElementById('photoInput');
            const editPhotoBtn = document.getElementById('editPhotoBtn');
            const profileImage = document.getElementById('profileImage');

            editPhotoBtn.addEventListener('click', () => {
                photoInput.click();
            });

            photoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (!file) return;

                const userId = editPhotoBtn.dataset.userId;

                const formData = new FormData();
                formData.append('photo', file);
                formData.append('user_id', userId);

                fetch("{{ route('user.upload-photo') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.image_url) {
                            profileImage.src = data.image_url;
                        } else {
                            alert('Photo upload failed.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Error uploading photo.');
                    });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.querySelector('.update-user-popup');
            const editButtons = document.querySelectorAll('.edit');
            const cancelButton = document.querySelector('.cancel-butn a');

            // Open popup
            editButtons.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const status = this.dataset.status;
                    const progress = this.dataset.progress;
                    const url = this.dataset.url;
                    const date = this.dataset.date;

                    // Set data in popup
                    const popupRow = document.querySelector('.update-user-popup tbody tr');
                    popupRow.setAttribute('data-id', id);
                    popupRow.querySelector('td:nth-child(1)').innerText = name;
                    popupRow.querySelector('td:nth-child(2) .status').innerText = status;
                    if (status === 'Pending') {
                        popupRow.querySelector('td:nth-child(2) .status').classList.add('pending');
                    } else if (status === 'In Progress') {
                        popupRow.querySelector('td:nth-child(2) .status').classList.add(
                            'in-progress');
                    } else if (status === 'Completed') {
                        popupRow.querySelector('td:nth-child(2) .status').classList.add(
                        'completed');
                    } else if (status === 'Canceled') {
                        popupRow.querySelector('td:nth-child(2) .status').classList.add('canceled');
                    }
                    popupRow.querySelector('td:nth-child(4) .progress-wrap-sub span').innerText =
                        progress + '%';
                    popupRow.querySelector('td:nth-child(4) .inner').style.width = progress + '%';
                    popupRow.querySelector('td:nth-child(5) a').href = url;
                    popupRow.querySelector('td:nth-child(6)').innerText = date;

                    popup.classList.add('active');
                });

            });


            // Close popup
            cancelButton.addEventListener('click', function() {
                popup.classList.remove('active');
            });

            // Optional: Close popup by clicking outside box
            popup.addEventListener('click', function(e) {
                if (e.target === popup) {
                    popup.classList.remove('active');
                }
            });
        });

        // Status
        document.querySelectorAll('#table-status-dropdown li').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelector('#selected-status').innerText = this.innerText;
            });
        });

        // Progress
        document.querySelectorAll('#progress-status-dropdown li').forEach(option => {
            option.addEventListener('click', function() {
                const text = this.innerText;
                const span = document.querySelector('#selected-progress');
                const bar = document.querySelector('.progress-bar .inner');

                span.innerText = text;
                if (text.includes('%')) {
                    bar.style.width = text;
                } else if (text === 'Completed') {
                    bar.style.width = '100%';
                }
            });
        });


        document.querySelector('.changes-butn a').addEventListener('click', function() {
            const row = document.querySelector('.update-user-popup tbody tr');
            const id = row.getAttribute('data-id');
            const status = document.getElementById('selected-status').innerText.trim();
            let progress = document.getElementById('selected-progress').innerText.trim().replace('%', '');
            if (progress == 'Completed') {
                progress = 100;
            }
            console.log(status);
            console.log(progress);



            fetch('/update-project-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id,
                    status,
                    progress
                })
            }).then(res => res.json()).then(data => {
                if (data.success) {
                    alert('Project updated!');
                    location.reload(); // or just update the row visually
                } else {
                    alert('Update failed!');
                }
            });
        });
    </script>
@endsection
