<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use Illuminate\Http\Request;

class GateController extends Controller
{
    public function index()
    {
        $gates = Gate::all();
        return view('gates.index', compact('gates'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gate_name' => 'required|string|max:50',
            'gate_type' => 'required|in:IN,OUT',
            'location' => 'required|string|max:100',
            'status' => 'required|in:ACTIVE,INACTIVE,MAINTENANCE',
            'camera_ip' => 'nullable|string|max:50'
        ]);

        Gate::create($validated);
        return redirect()->route('gates.index')->with('success', 'Gate created successfully');
    }
}