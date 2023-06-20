<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@csrf
<table class="table">
  <thead>
    <tr>
      <th scope="col">Tenant</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('payment.showpackage') }}" class="btn btn-primary">Add a payment</a>
</div>  
</body>
</html>