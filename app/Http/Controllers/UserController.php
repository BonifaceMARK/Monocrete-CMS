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
        $validator = Validator::make($request->all(), [
            'emp_fname' => 'required|string|max:255',
            'emp_lname' => 'required|string|max:255',
            'emp_user' => 'required|string|max:255|unique:tbl_user,emp_user',
            'emp_pass' => 'required|string|min:8',
            'emp_email' => 'nullable|email|max:255|unique:tbl_user,emp_email',
            'emp_contact_no' => 'nullable|string|max:15',
            'emp_gender' => 'nullable|string|in:male,female',
            'user_type' => 'nullable|string|in:admin,employee',
            'user_status' => 'nullable|string',
            // 'emp_sec_question' => 'required|string|max:255',
            // 'emp_sec_answer' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = new User();
         $latestUser = User::orderBy('emp_id', 'desc')->first();
        if ($latestUser && preg_match('/EID-(\d+)/', $latestUser->emp_id, $matches)) {
            $nextId = (int)$matches[1] + 1;
        } else {
            $nextId = 1;
        }
        $user->emp_id = 'EID-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
        $user->emp_fname = $request->emp_fname;
        $user->emp_lname = $request->emp_lname;
        $user->emp_user = $request->emp_user;
        $user->emp_pass = Hash::make($request->emp_pass);
        $user->emp_email = $request->emp_email;
        $user->emp_contact_no = $request->emp_contact_no;
        $user->emp_gender = $request->emp_gender;
        $user->user_type = $request->user_type;
        $user->user_status = $request->user_status;
        $user->emp_sec_question = $request->emp_sec_question;
        $user->emp_sec_answer = $request->emp_sec_answer;
        $user->created_at = now();
        $user->updated_at = now();

        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'emp_fname' => 'required|string|max:255',
            'emp_lname' => 'required|string|max:255',
            'emp_user' => 'required|string|max:255|unique:tbl_user,emp_user,' . $id . ',emp_id',
            'emp_email' => 'required|email|max:255|unique:tbl_user,emp_email,' . $id . ',emp_id',
            'emp_contact_no' => 'required|string|max:15',
            'emp_gender' => 'required|string|in:male,female',
            'user_type' => 'nullable|string',
            'user_status' => 'nullable|string',
            // 'emp_sec_question' => 'required|string|max:255',
            // 'emp_sec_answer' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->emp_fname = $request->emp_fname;
        $user->emp_lname = $request->emp_lname;
        $user->emp_user = $request->emp_user;
        if ($request->filled('emp_pass')) {
            $user->emp_pass = Hash::make($request->emp_pass);
        }
        $user->emp_email = $request->emp_email;
        $user->emp_contact_no = $request->emp_contact_no;
        $user->emp_gender = $request->emp_gender;
        $user->user_type = $request->user_type;
        $user->user_status = $request->user_status;
        $user->emp_sec_question = $request->emp_sec_question;
        $user->emp_sec_answer = $request->emp_sec_answer;
        $user->updated_at = now();

        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

}
