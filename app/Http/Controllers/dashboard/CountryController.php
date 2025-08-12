<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    // Get all countries
    public function index()
    {
        return Country::all();
    }

    // Get country by ID
    public function show($id)
    {
        return Country::findOrFail($id);
    }

    // Get countries by continent
    public function byContinent($continent)
    {
        return Country::where('continent', $continent)->get();
    }

    // Get countries using specific currency
    public function byCurrency($currencyCode)
    {
        return Country::where('currency_code', $currencyCode)->get();
    }

    // Create new country (admin only)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_name' => 'required|string|max:100',
            'country_code' => 'required|string|size:2',
            // Add other validation rules
        ]);

        return Country::create($validated);
    }

    // Update country (admin only)
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $validated = $request->validate([
            'country_name' => 'sometimes|string|max:100',
            'country_code' => 'sometimes|string|size:2',
            // Add other validation rules
        ]);

        $country->update($validated);
        return $country;
    }

    // Delete country (admin only)
    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        return response()->noContent();
    }
}