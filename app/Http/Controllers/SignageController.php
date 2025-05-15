<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signage;
use App\Models\SignageLocation;
use App\Models\SignageTv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SignageController extends Controller
{

    // public function test()
    // {
    //     $signages = Signage::all();
    //     return view('test', compact('signages'));
    // }
    public function index()
    {
        $signages = Signage::all();
        return view('signage.index', compact('signages'));
    }

    public function show($id)
    {
        $signages = Signage::findOrFail($id);
        
        // Determine preview type (image or video)
        $previewType = null;
        if (Str::startsWith($signages->filetype, 'image/')) {
            $previewType = 'image';
        } elseif (Str::startsWith($signages->filetype, 'video/')) {
            $previewType = 'video';
        }
    
        // Ensure the filename starts with 'contents/' for correct path
        $filePath = 'contents/' . $signages->filename;
    
        return view('signage.show', compact('signages', 'previewType', 'filePath'));
    }
    
    public function create()
    {
        // $locations = SignageLocation::all();
        $tvs = SignageTv::all();
        return view('signage.create', compact('tvs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tv' => 'required|string|exists:tbl_signage_tv,tv',
            // 'location' => 'required|string|unique:tbl_signage,location',
            'filename' => 'required|file',
        ]);

        $file = $request->file('filename');
        $originalName = $file->getClientOriginalName();
        $storedFileName = now()->format('Ymd_His') . '_' . $originalName;

        $file->storeAs('contents', $storedFileName, 'public');

        Signage::create([
            'sign_id' => 'SID-' . strtoupper(uniqid()),
            'tv' => $request->input('tv'),
            // 'location' => $request->location,
            'filename' => $storedFileName,
            'filetype' => $file->getClientMimeType(),
            'filesize' => $file->getSize(),
        ]);

        return redirect()->route('signage.create')->with('success', 'Signage created successfully!');
    }
    
    public function edit($id)
    {
        $signage = Signage::findOrFail($id);
        return view('signage.edit', compact('signage'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tv' => 'nullable|string',
            'location' => 'nullable|string',
            'filename' => 'nullable|file',
        ]);

        $signage = Signage::findOrFail($id);
        $signage->tv = $request->tv ?? $signage->tv;
        $signage->location = $request->location ?? $signage->location;

        if ($request->hasFile('filename')) {
            // Delete the old file if it exists
            if ($signage->filename && \Storage::disk('public')->exists('contents/' . $signage->filename)) {
                \Storage::disk('public')->delete('contents/' . $signage->filename);
            }

            $file = $request->file('filename');
            $originalName = $file->getClientOriginalName();
            $storedFileName = now()->format('Ymd_His') . '_' . $originalName;
            $file->storeAs('contents', $storedFileName, 'public');
            $signage->filename = $storedFileName;
            $signage->filetype = $file->getClientMimeType();
            $signage->filesize = $file->getSize();
        }

        $signage->save();

        // Return a response with a script to dispatch the Livewire event
        return redirect()->route('signage.index')->with('success', 'Signage updated successfully!')
            ->with('dispatchEvent', true);
    }


    public function destroy($id)
    {
        $signage = Signage::findOrFail($id);

        // Optionally, delete the file from storage
        if ($signage->filename && \Storage::disk('public')->exists('contents/' . $signage->filename)) {
            \Storage::disk('public')->delete('contents/' . $signage->filename);
        }

        $signage->delete();

        return redirect()->route('signage.index')->with('success', 'Signage deleted successfully!');
    }
}
