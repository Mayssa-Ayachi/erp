<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@csrf
<style>
  .custom-table {
    width: 50%; 
    margin: auto;
  }
</style> 

<table class="table custom-table">
  <thead>
    <tr>
      <th scope="col">User</th>
      <th scope="col">Role</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
        @foreach($user as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>
              <form action="{{ route('showusers.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dark">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('register') }}" class="btn btn-light ml-4">Add a user</a>
</div>  
</body>
</html>