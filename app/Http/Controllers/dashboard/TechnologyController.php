<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['header_title'] = 'Technologies';
        $data['technologies'] = Technology::paginate(10); // Show 10 technologies per page
        return view('dashboard.technologies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['header_title'] = 'Create Technology';
        return view('dashboard.technologies.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:technologies,slug',
            'icon' => 'nullable|string|max:255',
        ]);
        Technology::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
        ]);
        return redirect()->route('technologies.index')->with('success', 'Technology created successfully.');
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
        $data['header_title'] = 'Edit Technology';
        $data['technology'] = Technology::findOrFail($id);
        return view('dashboard.technologies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:technologies,slug,' . $id,
            'icon' => 'nullable|string|max:255',
        ]);
        $technology = Technology::findOrFail($id);
        $technology->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
        ]);
        return redirect()->route('technologies.index')->with('success', 'Technology updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $technology = Technology::findOrFail($id);
        $technology->delete();
        return redirect()->route('technologies.index')->with('success', 'Technology deleted successfully.');
    }
}
