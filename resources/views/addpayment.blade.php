<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  
    <div class="card-body">
      <form  action="{{ route('payment.store') }}" method="post">
       @csrf
       <div class="form-group">
          <label for="tenant_id">Tenant</label>
          <select id="tenant_id" name="tenant_id">
            @foreach ($tenant as $tenant)
              <option value="{{ $tenant->id }}">{{ $tenant->id }}</option>
            @endforeach
          </select>
          <input type="text" id="tenant_id" name="tenant_id" class="form-control">

          <label for="package">Package</label>
          <select id="package" name="package">
            @foreach ($package as $package)
              <option value="{{ $package->name }}">{{ $package->name }}</option>
            @endforeach
          </select>

          <label for="type">Type</label>
          <input type="text" id="type" name="type" />

          <label for="paid">Paid</label>
          <input type="text" id="paid" name="paid" />

          <label for="start">Start access</label>
          <input type="date" id="start" name="start">

          <label for="end">End access</label>
          <input type="date" id="end" name="end" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>  
</body>
</html>

 