<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::withCount('projects')->latest()->get();
        return view('pages.all_clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('client_photos', 'public');
        }

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'photo' => $path,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }
    public function edit(Client $client)
{
    return view('pages.clients.edit', compact('client'));
}

public function update(Request $request, Client $client)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
        'phone' => 'nullable|string|max:20',
        'gender' => 'nullable|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('client_photos', 'public');
        $client->photo = $path;
    }

    $client->name = $request->name;
    $client->email = $request->email;
    $client->phone = $request->phone;
    $client->gender = $request->gender;
    $client->save();

    return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
}

public function destroy(Client $client)
{
    $client->delete();
    return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
}

}
