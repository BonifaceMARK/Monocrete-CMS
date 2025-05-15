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

    public function showByTv($tv)
    {
        $tvData = SignageTv::where('tv', $tv)->firstOrFail();
    
        $files = $tvData->signages()->get();
    
        return view('tv', compact('tvData', 'files'));
    }

      public function show($sign_id)
    {
        $tvData = SignageTv::where('sign_id', $sign_id)->firstOrFail();
        $files = $tvData->signages ?? collect();
        $isMuted = true;  

        return view('tv.show', compact('tvData', 'files', 'isMuted'));
    }

    // public function checkUpdate($tv)
    // {
    //     $tvData = SignageTv::where('tv', $tv)->firstOrFail();
    //     $lastUpdated = $tvData->signages()->max('updated_at');
    
    //     $lastCheck = session("last_updated_$tv");
    
    //     if ($lastUpdated && $lastCheck !== $lastUpdated->toDateTimeString()) {
    //         session(["last_updated_$tv" => $lastUpdated->toDateTimeString()]);
    //         return response()->json(['updated' => true]);
    //     }
    
    //     return response()->json(['updated' => false]);
    // }
    


    public function create()
    {
        return view('tv.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tv' => 'required|string|unique:tbl_signage_tv,tv|max:255',
            'brand' => 'nullable|string|max:255',
            'descript' => 'nullable|string',
            // 'remarks' => 'nullable|string',
            'attach' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        if ($request->hasFile('attach')) {
            $file = $request->file('attach');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/tv_attachments', $filename);
            $validated['attach'] = $filename;
        }
    
        $tvId = 'TVID-' . strtoupper(uniqid());
        $validated['tv_id'] = $tvId;
    
        $ipAddress = 'http://192.168.3.41'; 
        $validated['url'] = $ipAddress . '/tv/' . $request->tv;
    
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
