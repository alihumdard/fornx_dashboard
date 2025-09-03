<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function dashboard()
    {
        $teams = Team::all();
        $allMembers = User::whereHas('teams')->get();
        $leaders = User::all();

        // Data for top cards
        $teamCounts = [];
        $teamNames = ['Web Developers', 'App Developer', 'WordPress Developer', 'Designer'];

        foreach ($teams as $name) {
            $name->leader = User::where('id', $name->user_id)->first();
        }
        foreach ($teamNames as $name) {
            $team = Team::where('name', $name)->first();
            $teamCounts[$name] = $team ? $team->users->count() : 0;
        }
        return view('pages.team.dashobard', compact('teams', 'allMembers', 'teamCounts', 'leaders'));
    }

    public function index()
    {
        $teams = Team::all();
        $allMembers = User::whereHas('teams')->get();
        $leaders = User::all();

        // Data for top cards
        $teamCounts = [];
        $teamNames = ['Web Developers', 'App Developer', 'WordPress Developer', 'Designer'];

        foreach ($teams as $name) {
            $name->leader = User::where('id', $name->user_id)->first();
        }
        foreach ($teamNames as $name) {
            $team = Team::where('name', $name)->first();
            $teamCounts[$name] = $team ? $team->users->count() : 0;
        }
        return view('pages.team.manage', compact('teams', 'allMembers', 'teamCounts', 'leaders'));
    }


    public function members($teamId)
    {
        $team = Team::with('users')->findOrFail($teamId);
        return response()->json($team->users); // return members as JSON
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255|unique:teams',
            'user_id' => 'nullable|exists:users,id'
        ]);

        Team::create($request->only('name', 'user_id'));

        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'    => 'required|string|max:255|unique:teams,name,' . $team->id,
            'user_id' => 'nullable|exists:users,id'
        ]);

        $team->update($request->only('name', 'user_id'));

        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }
}
