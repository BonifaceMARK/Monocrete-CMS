
@include('layout.title')

<div style="font-size:10px;" class="container">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <table style="font-size:10px;" class="form-group">
            <thead>

                <tr >
                    <th>
                        <label for="emp_fname">First Name</label>
            <input style="font-size:10px; width: 200px;" type="text" class="form-control" id="emp_fname" name="emp_fname" value="{{ old('emp_fname') }}" required>
            @error('emp_fname')
                <small class="text-danger">{{ $message }}</small>
            @enderror</th> 

            <th>  <label for="emp_lname">Last Name</label>
            <input style="font-size:10px; width: 200px;" type="text" class="form-control" id="emp_lname" name="emp_lname" value="{{ old('emp_lname') }}" required>
            @error('emp_lname')
                <small class="text-danger">{{ $message }}</small>
            @enderror</th>
          
                </tr>

                <tr>
 <th>
  <label for="emp_user">Username</label>
            <input style="font-size:10px;" type="text" class="form-control" id="emp_user" name="emp_user" value="{{ old('emp_user') }}" required>
            @error('emp_user')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>

            <th>
 <label for="emp_pass">Password</label>
            <input style="font-size:10px;" type="password" class="form-control" id="emp_pass" name="emp_pass" required>
            @error('emp_pass')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>

            <th>
  <label for="emp_email">Email</label>
            <input style="font-size:10px; width: 200px;" type="email" class="form-control" id="emp_email" name="emp_email" value="{{ old('emp_email') }}" required>
            @error('emp_email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>
                </tr>

                <tr>
                      <th>
                 <label for="emp_contact_no">Contact Number</label>
            <input style="font-size:10px;" type="text" class="form-control" id="emp_contact_no" name="emp_contact_no" value="{{ old('emp_contact_no') }}" required>
            @error('emp_contact_no')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>
            <th>
                 <label for="emp_gender">Gender</label>
            <select style="font-size:10px;" class="form-control" id="emp_gender" name="emp_gender" required>
                <option value="male" {{ old('emp_gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('emp_gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('emp_gender')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>

            <th>
                <label for="user_type">User Type</label>
             <select style="font-size:10px;" type="text" class="form-control" id="user_type" name="user_type" value="{{ old('user_type') }}" required>
                <option value="">Select Status</option>
                <option value="admin" {{old('user_status') == 'admin' ? 'selected' : ''}}> Administrator </option>
                <option value="employee" {{old('user_status') == 'employee' ? 'selected' : ''}}> Employee </option>
            </select>
                @error('user_type')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>

            <th>
                <label for="user_status">User Status</label>
            <select style="font-size:10px; width: 150px;" class="form-control" id="user_status" name="user_status" required>
                <option value="">Select Status</option>
                <option value="active" {{ old('user_status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('user_status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('user_status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>

            {{-- <th>
  <label for="emp_sec_question">Security Question</label>
            <input style="font-size:10px;" type="text" class="form-control" id="emp_sec_question" name="emp_sec_question" value="{{ old('emp_sec_question') }}" required>
            @error('emp_sec_question')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th>

            <th>
                 <label for="emp_sec_answer">Security Answer</label>
            <input style="font-size:10px;" type="text" class="form-control" id="emp_sec_answer" name="emp_sec_answer" value="{{ old('emp_sec_answer') }}" required>
            @error('emp_sec_answer')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </th> --}}
                </tr>
            </thead>
           
        </table>


        <button style="font-size:10px;" type="submit" class="btn btn-primary">Create User</button>
        <button style="font-size:10px;" class="btn btn-info" type="button" onclick="history.back()"> Cancel </button>
    </form>
</div>

@include('layout.footer')