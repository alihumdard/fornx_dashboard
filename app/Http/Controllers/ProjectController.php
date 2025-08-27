<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('client')->get();
        return view('pages.projects.index', compact('projects'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('pages.create_project', compact('clients'));
    }

    public function store(Request $request)
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
        ]);

        Project::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('pages.projects.show', compact('project'));
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

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard')->with('success', 'Project deleted successfully.');
    }

    public function progress1()
    {
        $projects = Project::all();
        return view('pages.project_progress.project_progress_1', compact('projects'));
    }

    public function progress2()
    {
        $projects = Project::all();
        return view('pages.project_progress.project_progress_2', compact('projects'));
    }

    public function progress3()
    {
        $projects = Project::all();
        return view('pages.project_progress.project_progress_3', compact('projects'));
    }
}
