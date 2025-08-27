<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with('users')->get();
        $allMembers = User::whereHas('teams')->get();

        // Data for the top cards
        $teamCounts = [];
        $teamNames = ['Web Developers', 'App Developer', 'WordPress Developer', 'Designer'];

        foreach ($teamNames as $name) {
            $team = Team::where('name', $name)->first();
            $teamCounts[$name] = $team ? $team->users->count() : 0;
        }

        return view('pages.users_tab.user_team', compact('teams', 'allMembers', 'teamCounts'));
    }
}
