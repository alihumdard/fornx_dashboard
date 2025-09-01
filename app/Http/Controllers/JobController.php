<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->get();

        // These counts can be made more sophisticated later
        $jobPostsCount = Job::count();
        $totalApplicationsCount = Job::sum('applications');
        $shortlistedCount = 15; // Placeholder
        $interviewsCount = 10; // Placeholder


        return view('pages.jobs', compact('jobs', 'jobPostsCount', 'totalApplicationsCount', 'shortlistedCount', 'interviewsCount'));
    }
}
