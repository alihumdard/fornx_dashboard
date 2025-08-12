<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['header_title'] = 'Access Control';
        $data['accesses'] = Access::paginate(10); // Show 10 accesses per page
        return view('dashboard.access.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['header_title'] = 'Create Access';
        return view('dashboard.access.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:accesses',
        ]);
        Access::create($request->all());
        return redirect()->route('access.index')->with('success', 'Access created successfully.');
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
        $data['header_title'] = 'Edit Access';
        $data['access'] = Access::findOrFail($id);
        return view('dashboard.access.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255|unique:accesses,name,' . $id,
        ]);
        $access = Access::findOrFail($id);
        $access->update($request->all());
        return redirect()->route('access.index')->with('success', 'Access updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $access = Access::findOrFail($id);
        $access->delete();
        return redirect()->route('access.index')->with('success', 'Access deleted successfully.');
    }
}
