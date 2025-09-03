<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{

    public function index()
    {
        $user = auth()->user() ?? '';

        if ($user ?? '') {
            if ($user->role == 'Admin') {
                //
            } else {
                //
            }

            return view('pages.dashboards.admin_dashboard');
        } else {
            return view('pages.auth.login');
        }
    }

    public function hr_dashboard()
    {
        $user = auth()->user() ?? '';

        if ($user ?? '') {
            if ($user->role == 'Admin') {
                //
            } else {
                //
            }

            return view('pages.dashboards.hr_dashboard');
        } else {
            return view('pages.auth.login');
        }
    }
}
