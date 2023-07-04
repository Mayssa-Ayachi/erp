<!DOCTYPE html>
<html>
<head>
    <title>Commercial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
</style>  
@endsection
@section('content')
    <div class="card">
    <div class="card-body">
      <form  action="{{ route('subdomain.store') }}" method="post">
       @csrf
        <div class="form-group">
          <label for="subdomain">Subdomain</label>
          <input type="text" id="subdomain" name="subdomain" class="form-control">
          <label for="subdomain">Choose a package</label>
          <select id="package" class="block mt-2 w-full"  name="package">
            @foreach ($package as $package)
              <option value="{{ $package->name }}">{{ $package->name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
  </div>
  @endsection
