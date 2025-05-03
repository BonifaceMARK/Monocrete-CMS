<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signage;
use Illuminate\Support\Facades\Auth;

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
        $signages = Signage::findorFail($id);
        return view('signage.show', compact('signages'));
    }

    public function createSignage()
    {
        return view('signage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tv' => 'required|string|unique:tbl_signage,tv',
            'location' => 'required|string|unique:tbl_signage,location',
            'filename' => 'required|file',
        ]);

        $file = $request->file('filename');
        $filePath = $file->store('contents', 'public');
        $fileType = $file->getClientMimeType();
        $fileSize = $file->getSize();

        $signId = 'SID-' . strtoupper(uniqid());

        Signage::create([
            'sign_id' => $signId,
            'tv' => $request->tv,
            'location' => $request->location,
            'filename' => $filePath,
            'filetype' => $fileType,
            'filesize' => $fileSize,
        ]);

        return redirect()->route('signage.create')->with('success', 'Signage created successfully!');
    }
    public function edit($id)
    {
        return view('signage.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('user.index')->with('success', 'Signage updated successfully!');
    }

    public function destroy($id)
    {
        return redirect()->route('user.index')->with('success', 'Signage deleted successfully!');
    }
        
}
