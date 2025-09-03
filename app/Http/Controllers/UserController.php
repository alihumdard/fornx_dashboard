<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\AssignProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Team;

class UserController extends Controller
{
    // ... index, allUsers, create, store methods from before ...
    public function index()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403, 'Unauthorized action.');
        }

        $users = User::where('role', 'User')->withTrashed()->latest()->get();
        return view('pages.users.index', compact('users'));
    }

    public function allUsers()
    {
        $users = User::where('id', '!=', 1)->latest()->get();
        return view('pages.users_tab.all_users', compact('users'));
    }




    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $teams = Team::all();

        return view('pages.users_tab.add_new_user', compact('roles', 'permissions', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string|exists:roles,name',
            'permissions' => 'nullable|array',
            'password' => 'required|string|min:6',
            'teams' => 'nullable|array',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);

        // Assign role
        $user->assignRole($request->role);

        // Assign permissions (optional extra permissions)
        if ($request->filled('permissions')) {
            $user->syncPermissions($request->permissions);
        }

        // Attach to teams
        if ($request->filled('teams')) {
            $user->teams()->sync($request->teams);
        }

        return redirect()->route('users.all')->with('success', 'User created successfully.');
    }


    public function profile($id)
    {
        $user = User::findOrFail($id);
        $assignedProjects = AssignProject::where('user_id', $user->id)->pluck('project_id');
        $projects = Project::whereIn('id', $assignedProjects)->get();

        $counts = [
            'all'        => $projects->count(),
            'in_progress' => $projects->where('status', 'In Progress')->count(),
            'canceled'   => $projects->where('status', 'Canceled')->count(),
            'completed'  => $projects->where('status', 'Completed')->count(),
        ];
        $counts['all'] = $counts['all'] ?? 0;
        $counts['in_progress'] = $counts['in_progress'] ?? 0;
        $counts['canceled'] = $counts['canceled'] ?? 0;
        $counts['completed'] = $counts['completed'] ?? 0;
        return view('pages.users_tab.user_profile', compact('user', 'projects', 'counts'));
    }


    public function myprofile()
    {
        $user = Auth::user();
        $assignedProjects = AssignProject::where('user_id', $user->id)->pluck('project_id');
        $projects = Project::whereIn('id', $assignedProjects)->get();

        $counts = [
            'all'        => $projects->count(),
            'in_progress' => $projects->where('status', 'In Progress')->count(),
            'canceled'   => $projects->where('status', 'Canceled')->count(),
            'completed'  => $projects->where('status', 'Completed')->count(),
        ];
        $counts['all'] = $counts['all'] ?? 0;
        $counts['in_progress'] = $counts['in_progress'] ?? 0;
        $counts['canceled'] = $counts['canceled'] ?? 0;
        $counts['completed'] = $counts['completed'] ?? 0;
        return view('pages.users_tab.user_profile', compact('user', 'projects', 'counts'));
    }


    public function toggleStatus($id, $slug)
    {
        $user = User::find($id);
        if ($slug == 'block') {
            $user->status = 3;
        } elseif ($slug == 'unblock') {
            $user->status = 1;
        }
        $user->save();
        $message = 'User' . $slug . 'successfully.';
        return redirect()->back()->with('success', $message);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User soft-deleted successfully.');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('admin.users.index')->with('success', 'User restored successfully.');
    }

    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function profile_update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'phone'  => 'nullable|string|max:20',
            // 'gender' => 'nullable|string|in:Male,Female,Other',
            'user_pic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('user_pic')) {
            $filename = time() . '.' . $request->user_pic->extension();
            $request->user_pic->move(public_path('uploads/profile'), $filename);
            $user->user_pic = 'uploads/profile/' . $filename;
        }

        // Update other fields
        $user->name   = $request->name;
        $user->email  = $request->email;
        $user->phone  = $request->phone;
        // $user->gender = $request->gender;
        $user->save();

        return redirect()->route('users.profile', $user->id)->with('success', 'Profile updated successfully.');
    }
}
