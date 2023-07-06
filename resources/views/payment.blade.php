<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
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
      <th scope="col">Organization</th>
      <th scope="col">Package</th>
      <th scope="col">Type</th>
      <th scope="col">Paid</th>
      <th scope="col">Start access</th>
      <th scope="col">End access</th>
    </tr>
  </thead>
  <tbody>
        @foreach($payment as $payment)
        <tr>
            <td>{{ $payment->tenant_id }}</td>
            <td>{{ $payment->package }}</td>
            <td>{{ $payment->type }}</td>
            <td>{{ $payment->paid }}</td>
            <td>{{ $payment->start_access }}</td>
            <td>{{ $payment->end_access }}</td>
            <td>
              <form action="{{ route('payment.destroy', $payment->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-dark"
                >Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!--<a href="{{ route('payment.showinfo') }}" class="btn btn-light ml-4">Add a payment</a>-->
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