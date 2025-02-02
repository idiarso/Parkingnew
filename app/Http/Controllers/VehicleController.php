<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plate_number' => 'required|string|max:20|unique:vehicles',
            'vehicle_type' => 'required|string|max:50',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'status' => 'required|in:ACTIVE,BLOCKED',
            'notes' => 'nullable|string'
        ]);

        Vehicle::create($validated);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle registered successfully');
    }
}