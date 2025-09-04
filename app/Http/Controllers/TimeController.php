<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Attendance;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class TimeController extends Controller
{
    /**
     * Show the time tracking dashboard.
     *
     * @return View
     */
    public function showTimeDashboard(): View
    {
        $user = Auth::user();
        $today = Carbon::today();

        $currentAttendance = Attendance::where('user_id', $user->id)
            ->where('date', $today->toDateString())
            ->first();

        // Check if there's an in-progress attendance for today
        if ($currentAttendance && $currentAttendance->status === 'In Progress') {
            $checkInTime = Carbon::parse($currentAttendance->check_in_time);
            $currentDuration = $checkInTime->diffInMinutes(Carbon::now());
        } else {
            $currentDuration = 0;
        }

        // Fetch recent activity
        $recentActivity = Attendance::with('user')
            ->where('user_id', $user->id)
            ->where('date', '!=', $today->toDateString())
            ->orderBy('date', 'desc')
            ->limit(10) // Limit to a reasonable number
            ->get();

        // Fetch leave requests
        $leaves = Leave::where('user_id', $user->id)
            ->orderBy('start_date', 'desc')
            ->get();

        // Calculate stats for the current month
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();

        $monthlyAttendances = Attendance::where('user_id', $user->id)
            ->whereBetween('date', [$startOfMonth, $endOfMonth])
            ->get();

        $presentDays = $monthlyAttendances->where('status', 'Completed')->count();
        $totalMonthlyMinutes = $monthlyAttendances->where('status', 'Completed')->sum('total_minutes');
        $totalMonthlyHours = floor($totalMonthlyMinutes / 60);
        $totalMonthlyMinutesRemainder = $totalMonthlyMinutes % 60;
        $totalMonthlyFormatted = sprintf('%d:%02d', $totalMonthlyHours, $totalMonthlyMinutesRemainder);

        $averageDailyMinutes = $presentDays > 0 ? ($totalMonthlyMinutes / $presentDays) : 0;
        $averageDailyHours = floor($averageDailyMinutes / 60);
        $averageDailyMinutesRemainder = round($averageDailyMinutes % 60);
        $averageDailyFormatted = sprintf('%d:%02d', $averageDailyHours, $averageDailyMinutesRemainder);

        // Fetch previous month's data for comparison
        $startOfLastMonth = $startOfMonth->copy()->subMonth();
        $endOfLastMonth = $endOfMonth->copy()->subMonth();

        $lastMonthAttendances = Attendance::where('user_id', $user->id)
            ->whereBetween('date', [$startOfLastMonth, $endOfLastMonth])
            ->get();
        $lastMonthPresentDays = $lastMonthAttendances->count();
        $lastMonthTotalMinutes = $lastMonthAttendances->sum('total_minutes');

        $presentDaysDifference = $presentDays - $lastMonthPresentDays;
        $hoursDifference = ($totalMonthlyMinutes - $lastMonthTotalMinutes) / 60;

        return view('pages.time.check_in', [
            'currentAttendance' => $currentAttendance,
            'currentDuration' => $currentDuration,
            'recentActivity' => $recentActivity,
            'leaves' => $leaves,
            'presentDays' => $presentDays,
            'totalMonthlyFormatted' => $totalMonthlyFormatted,
            'averageDailyFormatted' => $averageDailyFormatted,
            'presentDaysDifference' => $presentDaysDifference,
            'hoursDifference' => $hoursDifference,
        ]);
    }

    /**
     * Handle the check-in process.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckIn(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today();

        $attendance = Attendance::firstOrCreate(
            ['user_id' => $user->id, 'date' => $today->toDateString()],
            ['check_in_time' => Carbon::now()->toTimeString(), 'status' => 'In Progress']
        );

        if ($attendance->wasRecentlyCreated) {
            return redirect()->back()->with('status', 'Check-in successful!');
        } else {
            return redirect()->back()->with('error', 'You have already checked in today.');
        }
    }

    /**
     * Handle the check-out process.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckOut(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today();

        $attendance = Attendance::where('user_id', $user->id)
            ->where('date', $today->toDateString())
            ->where('status', 'In Progress')
            ->first();

        if ($attendance) {
            $checkoutTime = Carbon::now();
            $checkinTime = Carbon::parse($attendance->check_in_time);
            $totalMinutes = $checkoutTime->diffInMinutes($checkinTime);

            $attendance->update([
                'check_out_time' => $checkoutTime->toTimeString(),
                'status' => 'Completed',
                'total_minutes' => $totalMinutes,
            ]);

            return redirect()->back()->with('status', 'Check-out successful!');
        } else {
            return redirect()->back()->with('error', 'You cannot check out without checking in first.');
        }
    }

    /**
     * Handle the leave request submission.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitLeave(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
        ]);

        Leave::create([
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('status', 'Leave request submitted successfully!');
    }


    /**
     * Show the leave requests dashboard.
     *
     * @return View
     */
    public function showLeaveRequests(): View
    {
        $leaves = Leave::with('user.roles')->orderBy('created_at', 'desc')->get();
        return view('pages.time.leaves', compact('leaves'));
    }

    /**
     * Update the status of a leave request via AJAX.
     *
     * @param Request $request
     * @param Leave $leave
     * @return JsonResponse
     */
    public function updateLeaveStatus(Request $request, Leave $leave): JsonResponse
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $leave->status = $request->status;
        $leave->save();

        return response()->json(['message' => 'Leave status updated successfully.']);
    }
}
