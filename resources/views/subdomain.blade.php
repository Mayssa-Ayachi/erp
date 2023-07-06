<!DOCTYPE html>
<html>
<head>
    <title>New Organisation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


@extends('layouts.app')
@section('css')
<style>
  .card {
    width: 50%; 
    margin: auto;
    margin-top: 20vh;
  }
  .alert {
    width: 50%;
    z-index: 9999;
    margin: auto;
  }
</style>  
@endsection
@section('content')
    <div class="card">
    <div class="card-body">
      <form  action="{{ route('subdomain.store') }}" method="post">
       @csrf
        <div class="form-group">
          <label for="subdomain">Organization</label>
          <input type="text" id="subdomain" name="subdomain" class="form-control">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" class="form-control">
          <label for="subdomain">Choose a package</label>
          <select id="package" class="block mt-2 w-full"  name="package">
            @foreach ($package as $package)
              <option value="{{ $package->name }}">{{ $package->name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-outline-dark">Submit</button>
      </form>
  </div>
  </div>
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
@endsection
</body>
</html>