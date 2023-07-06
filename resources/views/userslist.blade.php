<!DOCTYPE html>
<html>
<head>
    <title>All users</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@extends('layouts.app')
@section('css')
@csrf
<style>
  .custom-table {
    width: 50%; 
    margin: auto;
  }
  .alert {
    width: 50%;
    z-index: 9999;
    margin: auto;
  }
</style> 
@endsection
@section('content')
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
                <button type="submit" class="btn btn-outline-dark">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!--<a href="{{ route('register') }}" class="btn btn-light ml-4">Add a user</a>-->
@if (session('success'))
    <div class="alert alert-success" id="customAlert">
        {{ session('success') }}
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {$('#customAlert').fadeOut();}, 7000); 
        });
    </script>
@endif
@if (session('failed'))
    <div class="alert alert-danger" id="customAlert">
        {{ session('failed') }}
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {$('#customAlert').fadeOut();}, 7000); 
        });
    </script>
@endif
</div> 
@endsection 
</body>
</html>