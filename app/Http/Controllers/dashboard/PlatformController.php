<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //
        $data['header_title'] = 'Platforms';
        $data['platforms'] = Platform::paginate(10); // Show 10 platforms per page
        return view('dashboard.platforms.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['header_title'] = 'Create Platform';
        return view('dashboard.platforms.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:platforms,slug',
        ]);
        Platform::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('platforms.index')->with('success', 'Platform created successfully.');
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
        //
        $data['header_title'] = 'Edit Platform';
        $data['platform'] = Platform::findOrFail($id);
        return view('dashboard.platforms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:platforms,slug,' . $id,
        ]);
        $platform = Platform::findOrFail($id);
        $platform->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('platforms.index')->with('success', 'Platform updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $platform = Platform::findOrFail($id);
        $platform->delete();
        return redirect()->route('platforms.index')->with('success', 'Platform deleted successfully.');
    }
}
