
<div class="container">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->emp_fname }} {{ $user->emp_lname }}</h5>
            <p class="card-text"><strong>Username:</strong> {{ $user->emp_user }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $user->emp_email }}</p>
            <p class="card-text"><strong>Contact No:</strong> {{ $user->emp_contact_no }}</p>
            <p class="card-text"><strong>Gender:</strong> {{ $user->emp_gender }}</p>
            <p class="card-text"><strong>User Type:</strong> {{ $user->user_type }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $user->user_status }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $user->created_at }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $user->updated_at }}</p>
        </div>
    </div>
</div>