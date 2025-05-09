<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function index()
    {
        $users= User::all();
        return view('user.index', compact('users'));
 }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        // Validate and store the user data
        // Redirect or return a response
    }
    public function show($id)
    {
        return view('user.show', ['id' => $id]);
    } 
    public function edit($id)
    {
        return view('user.edit', ['id' => $id]);
    }
    public function update(Request $request, $id)
    {
        // Validate and update the user data
        // Redirect or return a response
    }
}
