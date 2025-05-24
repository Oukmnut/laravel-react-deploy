<h2>User List</h2>

@if(count($users) > 0)
    <ul>
        @foreach($users as $user)
            <li>{{ $user['name'] }} ({{ $user['email'] }})</li>
        @endforeach
    </ul>
@else
    <p>No users found.</p>
@endif
