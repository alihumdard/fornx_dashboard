@extends('dashboard.layout.dashboard-layout')
@section('dashboard-content')
    {{-- main content start --}}
    <div class="dashboard-body-content">
        <div class="transaction-table-box">
            <div class="transaction-table-box-head">
                <h3>Users</h3>
                <div class="add-user-butn">
                    <a href="javascript:;">Add User</a>
                </div>
            </div>
            <div class="transaction-table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Access</th>
                            <th>Last Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                        <tr>
                            <td>Ahmed</td>
                            <td>ahm@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>Full Access</td>
                            <td>2024-06-07</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="transaction-table-footer">
                <div class="content">
                    <p>Showing 1-10 from 100</p>
                </div>
                <div class="pagination-box">
                    <button class="prev">
                        <img src="{{ asset('assets/images/pagi-icon.png') }}" alt="icon" />
                        Back</button>
                    <button class="page-num">1</button>
                    <button class="page-num active">2</button>
                    <button class="page-num">3</button>
                    <button class="page-num">4</button>
                    <button class="page-num">...</button>
                    <button class="page-num">25</button>
                    <button class="next">Next
                        <img src="{{ asset('assets/images/pagi-icon-2.png') }}" alt="icon" />
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- main content end --}}
@endsection
