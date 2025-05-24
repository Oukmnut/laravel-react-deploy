<h2>User List</h2>

<ul>
  @foreach($users as $user)
    <li>{{ $user['name'] }} ({{ $user['email'] }})</li>
  @endforeach
</ul>
