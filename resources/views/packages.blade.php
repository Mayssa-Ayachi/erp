<!DOCTYPE html>
<html>
<head>
    <title>Packages</title>
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
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
        @foreach($package as $package)
        <tr>
            <td>{{ $package->id }}</td>
            <td>{{ $package->name }}</td>
            <td>{{ $package->description }}</td>
            <td>{{ $package->price }}</td>
            <td>
              <form action="{{ route('package.destroy', $package->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"  class="btn btn-outline-dark">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@if (session('success'))
    <div class="alert alert-success" id="customAlert">
        {{ session('success') }}
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {$('#customAlert').fadeOut();}, 2000); 
        });
    </script>
@endif
@if (session('Failed'))
    <div class="alert alert-danger" id="customAlert">
        {{ session('Failed') }}
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {$('#customAlert').fadeOut();}, 2000); 
        });
    </script>
@endif
<!--<a href="{{ route('package.showaddpackage') }}" class="btn btn-light ml-4">Add a package</a>-->
</div> 
@endsection 
</body>
</html>