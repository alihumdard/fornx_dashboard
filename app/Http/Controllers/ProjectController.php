<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\Models\AssignProject;
use App\Models\ProjectComment;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->get();
        $users = User::all();
        return view('pages.projects.index', compact('projects' , 'users'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('pages.create_project', compact('clients'));
    }

  public function store(Request $request)
{
    // validate
    $request->validate([
        'name' => 'required|string|max:255',
        'client_id' => 'required|exists:clients,id',
        'country' => 'required|string|max:255',
        'platform' => 'required|string|max:255',
        'priority' => 'required|string|in:High,Medium,Low',
        'technology' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'earning' => 'required|numeric',
        'paid_outside' => 'nullable|numeric',
        'work_done_by' => 'required|string|max:255',
        'project_guide' => 'nullable|string|max:255',

        // Modal fields
        'reference_website' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:1000',
        'cpanel_details' => 'nullable|string|max:1000',
        'login' => 'nullable|string|max:255',
        'password' => 'nullable|string|max:255',
        'notes' => 'nullable|string|max:1000',
    ]);

    // Merge login & password into a credentials array
    $credentials = null;
    if ($request->filled('login') || $request->filled('password')) {
        $credentials = json_encode([
            'login' => $request->input('login'),
            'password' => $request->input('password'),
        ]);
    }

    // Create project
    Project::create([
        'name' => $request->name,
        'client_id' => $request->client_id,
        'country' => $request->country,
        'platform' => $request->platform,
        'priority' => $request->priority,
        'technology' => $request->technology,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'earning' => $request->earning,
        'paid_outside' => $request->paid_outside,
        'work_done_by' => $request->work_done_by,
        'project_guide' => $request->project_guide,

        'reference_website' => $request->reference_website,
        'description' => $request->description,
        'cpanel_details' => $request->cpanel_details,
        'credentials' => $credentials,
        'notes' => $request->notes,

        'status' => 'Pending',  // default
        'progress' => 0,        // default
    ]);

    return redirect()->route('projects.index')->with('success', 'Project created successfully!');
}


    public function show(Project $project)
    {
        $assigned_projects = AssignProject::where('project_id', $project->id)->get();

        $averageProgress = $assigned_projects->count() > 0 
            ? intval($assigned_projects->avg('progress')) 
            : 0;

        $credentials = json_decode($project->credentials, true);
        $comments = $project->comments()->with('user')->orderBy('created_at', 'asc')->get();

        return view('pages.projects.show', compact('project', 'credentials', 'averageProgress', 'comments'));
    }


    public function edit(Project $project)
    {
        $clients = Client::all();
        return view('pages.projects.edit', compact('project', 'clients'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'country' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'technology' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'earning' => 'required|numeric',
            'paid_outside' => 'required|numeric',
            'work_done_by' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'progress' => 'required|integer|min:0|max:100',
        ]);

        $project->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Project updated successfully.');
    }

     public function updateProgress(Request $request, AssignProject $assignment)
    {
        
        $request->validate([
        'status'   => 'required|string',
        'progress' => 'required|integer|min:0|max:100',
        'description' => 'nullable|string|max:1000',
        ]);

        $assignment->update([
            'status'   => $request->status,
            'progress' => $request->progress,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Assignment updated successfully!');
    }


    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard')->with('success', 'Project deleted successfully.');
    }

    public function progress1()
    {
        $project = Project::find(1);
        return view('pages.project_progress.project_progress_1', compact('project'));
    }

    public function progress2()
    {
        $project = Project::find(1);
        return view('pages.project_progress.project_progress_2', compact('project'));
    }

    public function progress3()
    {
        $project = Project::find(1);
        return view('pages.project_progress.project_progress_3', compact('project'));
    }

    public function assign(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        // Check if this exact user-project pair already exists
        $existingAssignment = AssignProject::where('project_id', $request->project_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingAssignment) {
            return back()->with('error', 'This project is already assigned to this user.');
        }

        // Otherwise create a new assignment
        AssignProject::create([
            'user_id'    => $request->user_id,
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('users.profile', $request->user_id)
            ->with('success', 'Project assigned successfully!');
    }

    public function assignProjectdestroy(AssignProject $assignment)
    {
        $userId = $assignment->user_id;

        $assignment->delete();

        return redirect()->route('users.profile', $userId)
            ->with('success', 'Project assignment deleted successfully!');
    }

    public function updateCredentials(Request $request, Project $project)
    {
        $validated = $request->validate([
            'reference_website' => 'nullable|string|max:255',
            'login' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
        ]);

        // Update credentials as JSON
        $credentials = [
            'login' => $validated['login'],
            'password' => $validated['password'],
        ];

        $project->update([
            'reference_website' => $validated['reference_website'],
            'credentials' => json_encode($credentials),
        ]);

        return redirect()->back()->with('success', 'Credentials updated successfully.');
    }

    public function addComment(Request $request, Project $project)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        ProjectComment::create([
            'project_id' => $project->id,
            'user_id'    => auth()->id(),
            'comment'    => $request->comment,
        ]);

        return back()->with('success', 'Comment added!');
    }




}
