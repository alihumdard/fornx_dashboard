<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // index
    public function index()
    {
        $data['header_title'] = 'Dashboard';
        return view('dashboard.index', $data);
    }
}
