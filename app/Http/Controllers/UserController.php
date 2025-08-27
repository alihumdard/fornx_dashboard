<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $users = User::where('role', '!=', 'Admin')->latest()->get();
        return view('pages.users_tab.all_users', compact('users'));
    }

    public function create()
    {
        return view('pages.users_tab.add_new_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'status' => 1, // Default to Active
        ]);

        return redirect()->route('users.all')->with('success', 'User created successfully.');
    }

    public function profile()
    {
        $user = Auth::user();
        // Assuming projects are assigned to users via the 'work_done_by' field for simplicity.
        // A better approach would be a proper relationship.
        $projects = Project::where('work_done_by', $user->name)->get();
        return view('pages.users_tab.user_profile', compact('user', 'projects'));
    }

    public function toggleStatus(User $user)
    {
        $user->status = ($user->status == 1) ? 3 : 1;
        $user->save();
        $message = ($user->status == 1) ? 'User activated successfully.' : 'User deactivated successfully.';
        return redirect()->route('admin.users.index')->with('success', $message);
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
}
