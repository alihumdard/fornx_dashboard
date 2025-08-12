<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use App\Models\Project;
use App\Models\Platform;
use App\Models\Technology;
use App\Models\ProjectGuide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['header_title'] = 'Projects';
        $data['projects'] = Project::paginate(); // Replace with actual project data retrieval logic
        return view('dashboard.projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['header_title'] = 'Create Project';
        $data['countries'] = Country::all(); // Replace with actual country data retrieval logic
        $data['platforms'] = Platform::all(); // Replace with actual platform data retrieval logic
        $data['technologies'] = Technology::all(); // Replace with actual technology data retrieval logic
        $role = Role::where('name', 'Employee')->first();
        $data['workers'] = User::where('role_id', $role->id)->get(); // Replace with actual worker data retrieval logic
        return view('dashboard.projects.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'platform_id' => 'required|exists:platforms,id',
            'priority_id' => 'required|in:low,medium,high,urgent',
            'technology_id' => 'required|exists:technologies,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'earn_from_project' => 'nullable|numeric',
            'paid_to_outside' => 'nullable|numeric',
            'work_done_by' => 'nullable|array',
            'work_done_by.*' => 'exists:users,id',

            // Guide fields
            'website_url' => 'nullable|url',
            'project_description' => 'nullable|string',
            'cpanel' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        $project = Project::create([
            'project_name' => $request->project_name,
            'clint_name' => $request->client_name,
            'country' => $request->country_id,
            'platform_id' => $request->platform_id,
            'priority' => $request->priority_id,
            'technology_id' => $request->technology_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'earn_from_project' => $request->earn_from_project,
            'paid_to_outside' => $request->paid_to_outside ?? 0.00,
            // removed work_done_by (stored in pivot instead)
        ]);

        // Save assigned users to pivot table
        if ($request->has('work_done_by')) {
            $project->project_users()->attach($request->work_done_by);
        }

        // Save project guide
        ProjectGuide::create([
            'project_id' => $project->id,
            'website_url' => $request->website_url,
            'project_description' => $request->project_description,
            'cpanel' => $request->cpanel,
            'email' => $request->email,
            'password' => $request->password,
            'note' => $request->note,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $project = Project::with('users')->find($id);
        $project_guide = ProjectGuide::where('project_id', $project->id)->first();


        //
        $data['header_title'] = 'Edit Project';
        $data['countries'] = Country::all(); // Replace with actual country data retrieval logic
        $data['platforms'] = Platform::all(); // Replace with actual platform data retrieval logic
        $data['technologies'] = Technology::all(); // Replace with actual technology data retrieval logic
        $role = Role::where('name', 'Employee')->first();
        $data['workers'] = User::where('role_id', $role->id)->get(); // Replace with actual worker data retrieval logic
        $data['project'] = $project;
        if ($data['project']) {
            $data['project']->project_guide = $project_guide;
            $data['project']->work_done_by = json_decode($data['project']->work_done_by);
        }

        // dd($data['project']);
        return view('dashboard.projects.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'platform_id' => 'required|exists:platforms,id',
            'priority_id' => 'required|in:low,medium,high,urgent',
            'technology_id' => 'required|exists:technologies,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'earn_from_project' => 'nullable|numeric',
            'paid_to_outside' => 'nullable|numeric',
            'work_done_by' => 'nullable|array',
            'work_done_by.*' => 'exists:users,id',

            // Guide fields
            'website_url' => 'nullable|url',
            'project_description' => 'nullable|string',
            'cpanel' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        $project = Project::findOrFail($id);

        $project->update([
            'project_name' => $request->project_name,
            'clint_name' => $request->client_name,
            'country' => $request->country_id,
            'platform_id' => $request->platform_id,
            'priority' => $request->priority_id,
            'technology_id' => $request->technology_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'earn_from_project' => $request->earn_from_project,
            'paid_to_outside' => $request->paid_to_outside ?? 0.00,
            // 'work_done_by' removed (handled via pivot)
        ]);

        // ✅ Sync work_done_by users in pivot table
        if ($request->has('work_done_by')) {
            $project->project_users()->sync($request->work_done_by);
        }

        // ✅ Update or Create Project Guide
        $guide = ProjectGuide::where('project_id', $project->id)->first();

        if ($guide) {
            $guide->update([
                'website_url' => $request->website_url,
                'project_description' => $request->project_description,
                'cpanel' => $request->cpanel,
                'email' => $request->email,
                'password' => $request->password,
                'note' => $request->note,
            ]);
        } else {
            ProjectGuide::create([
                'project_id' => $project->id,
                'website_url' => $request->website_url,
                'project_description' => $request->project_description,
                'cpanel' => $request->cpanel,
                'email' => $request->email,
                'password' => $request->password,
                'note' => $request->note,
            ]);
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        // Delete related project guide
        ProjectGuide::where('project_id', $project->id)->delete();

        // Delete the project
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    // updateProjectStatus
    public function updateProjectStatus(Request $request)
{
    $request->validate([
        'id' => 'required|exists:projects,id',
        'status' => 'required|string',
        'progress' => 'required|numeric'
    ]);

    $project = Project::findOrFail($request->id);
    $project->status = $request->status;
    $project->progress = $request->progress;
    $project->save();

    return response()->json(['success' => true]);
}

}
