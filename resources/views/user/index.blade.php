
@include('layout.title')
    

<table class="table table-bordered" class="container-fluid" style="font-size: 10px;">
<thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Gender</th>
    </tr>
</thead>
<tbody> 
@forelse ($users as $user)
    <tr>
        <td>{{ $user->emp_fname }}</td>
        <td>{{ $user->emp_lname }}</td>
        <td>{{ $user->emp_user }}</td>
        <td>{{ $user->emp_email }}</td>
        <td>{{ $user->emp_contact_no }}</td>
        <td>{{ $user->emp_gender }}</td>
    </tr>
</tbody>
</table>
@empty
    <tr> <label for="empty">No User Available</label></tr>
@endforelse ($users as $user)