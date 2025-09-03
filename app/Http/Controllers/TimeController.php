<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TimeController extends Controller
{
    /**
     * Show the time check-in view.
     *
     * @return View
     */
    public function showTimeCheckIn(): View
    {
        return view('pages.time.check_in');
    }

    /**
     * Show the time check-out view.
     *
     * @return View
     */
    public function showTimeCheckOut(): View
    {
        return view('pages.time.check_out');
    }

    /**
     * Handle the check-in form submission.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckIn(Request $request)
    {
        // Add logic here to process the check-in, e.g., save to a database.
        // For now, it will redirect back with a success message.
        return redirect()->back()->with('status', 'Check-in successful!');
    }

    /**
     * Handle the check-out form submission.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckOut(Request $request)
    {
        // Add logic here to process the check-out.
        // For now, it will redirect back with a success message.
        return redirect()->back()->with('status', 'Check-out successful!');
    }
}
