<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignageLocation;
use App\Models\SignageTv;
use App\Models\Signage;
class LocationController extends Controller
{
    public function index()
    {
        $locations = SignageLocation::all();
        return view('location.index', compact('locations'));
    }

    public function show($id)
    {
        return view('location.show', ['id' => $id]);
    }

    public function create()
    {
        return view('location.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);
        
        return redirect()->route('location.index');
    }
    public function edit($id)
    {
        return view('location.edit', ['id' => $id]);
    }
    public function update(Request $request, $id)
    {
        return redirect()->route('location.show', ['id' => $id]);
    }
    public function destroy($id)
    {
        return redirect()->route('location.index');
    }
}
