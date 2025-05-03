<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignageLocation;
use App\Models\SignageTv;
use App\Models\Signage;

class TvController extends Controller
{
    public function index()
    {
        $tvs = SignageTv::all();
        return view('tv.index',compact('tvs'));
    }

    public function show($id)
    {
        return view('tv.show', ['id' => $id]);
    }

    public function create()
    {
        return view('tv.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tv' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'descript' => 'nullable|string',
            'remarks' => 'nullable|string',
            'attach' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validate image attachment
        ]);

        // Handle file upload if an image is attached
        if ($request->hasFile('attach')) {
            $file = $request->file('attach');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/tv_attachments', $filename);
            $validated['attach'] = $filename;
        }

        // Generate a unique TV ID
        $validated['tv_id'] = 'TVID-' . strtoupper(uniqid());

        SignageTv::create($validated);

        return redirect()->route('tv.index')->with('success', 'Signage TV created successfully.');
    }
    
    
    public function edit($id)
    {
        return view('tv.edit', ['id' => $id]);
    }
    public function update(Request $request, $id)
    {
        return redirect()->route('tv.show', ['id' => $id]);
    }
    public function destroy($id)
    {
        return redirect()->route('tv.index');
    }
}
