<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<style>
  .card {
    width: 50%; 
    margin: auto;
    margin-top: 20vh;
  }
</style>  
    <div class="card">
    <div class="card-body">
      <form  action="{{ route('payment.store') }}" method="post">
       @csrf
       <div class="form-group">

          <label for="tenant_id">Tenant</label>
          <select id="tenant_id" name="tenant_id">
            @foreach ($tenant as $tenant)
              <option value="{{ $tenant->id }}">{{ $tenant->id }}</option>
            @endforeach
          </select> <br>

          <label for="package">Package</label>
          <select id="package" name="package">
            @foreach ($package as $package)
              <option value="{{ $package->name }}">{{ $package->name }}</option>
            @endforeach
          </select><br>

          <label for="type">Type</label>
          <input type="text" id="type" name="type" /><br>

          <label for="paid">Paid</label>
          <select id="paid" name="paid">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select><br>

          <label for="start">Start access</label>
          <input type="date" id="start" name="start"><br>

          <label for="end">End access</label>
          <input type="date" id="end" name="end" /><br>
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
  </div>
</div>  
</body>
</html>

 