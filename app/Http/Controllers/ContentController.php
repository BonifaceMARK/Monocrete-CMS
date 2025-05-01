<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

    public function test()
    {
        $contents = Content::all();
        return view('test', compact('contents'));
    }
    public function index()
    {
        $contents = Content::all();
        return view('content.index', compact('contents'));

    }

    public function show($id)
    {
        return view('content.show', compact('id'));
    }

    public function create()
    {
        return view('content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tv' => 'required|string',
            'location' => 'required|string',
            'filename' => 'required|file',
        ]);

        $file = $request->file('filename');
        $filePath = $file->store('contents', 'public');
        $fileType = $file->getClientMimeType();
        $fileSize = $file->getSize();

        $signId = 'SID-' . strtoupper(uniqid());

        Content::create([
            'sign_id' => $signId,
            'tv' => $request->tv,
            'location' => $request->location,
            'filename' => $filePath,
            'filetype' => $fileType,
            'filesize' => $fileSize,
        ]);

        return redirect()->route('content.create')->with('success', 'Signage created successfully!');
    }
    public function edit($id)
    {
        return view('content.edit', compact('id'));
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
