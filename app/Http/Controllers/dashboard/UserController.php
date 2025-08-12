<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Role;
use App\Models\User;
use App\Models\Access;
use App\Models\Project;
use App\Models\ProjectGuide;
use Illuminate\Http\Request;
use App\Mail\NewUserAccountMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['header_title'] = 'Users';
        $data['users'] = User::with(['role', 'access'])->paginate(10); // Show 10 users per page
        return view('dashboard.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['header_title'] = 'Create User';
        $data['roles'] = Role::all();
        $data['accesses'] = Access::all(); // Assuming you have an Access model
        return view('dashboard.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:15',
            'role_id' => 'nullable|exists:roles,id',
            'access_id' => 'nullable|exists:accesses,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'role_id' => $request->role_id,
            'access_id' => $request->access_id,
        ]);

        if ($request->has('send_email')) {
            Mail::to($user->email)->send(new NewUserAccountMail($user, $request->password));
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data['user'] = User::findOrFail($id);

        // Paginate the many-to-many relationship
        $projects = $data['user']->projects()
            ->with(['project_users']) // eager load related models
            ->paginate(10); // this gives LengthAwarePaginator, not Collection
        $data['projects_inprogress'] = $projects->where('status', 'In Progress');
        $data['projects_cancel'] = $projects->where('status', 'Canceled');
        $data['projects_completed'] = $projects->where('status', 'Completed');

        // Overall Progress Logic
        $totalProjects = $projects->count();
        $totalProgress = $projects->sum('progress');
        $data['overallProgress'] = $totalProjects > 0 ? round($totalProgress / $totalProjects) : 0;

        $data['user']->projects = $projects;
        // dd($data['user']);
        foreach ($data['user']->projects as $item) {

            $project_guide = ProjectGuide::where('project_id', $item->id)->first();

            $item->project_guide = $project_guide;
        }

        $data['header_title'] = 'User Details';
        return view('dashboard.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data['header_title'] = 'Edit User';
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::all();
        $data['accesses'] = Access::all(); // Assuming you have an Access model
        return view('dashboard.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string|max:15',
            'role_id' => 'nullable|exists:roles,id',
            'access_id' => 'nullable|exists:accesses,id',
        ]);
        $user = User::findOrFail($id);
        // If password is not provided, we don't update it
        if (!$request->filled('password')) {
            $request->request->remove('password');
        }
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    // updateStatus
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive'
        ]);

        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => true]);
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // ✅ Save to /public/profile_photos/
        $file->move(public_path('profile_photos'), $filename);

        // ✅ Save path relative to public folder
        $user->profile = 'profile_photos/' . $filename;
        $user->save();

        return response()->json([
            'success' => true,
            'image_url' => asset($user->profile),
        ]);
    }
}
