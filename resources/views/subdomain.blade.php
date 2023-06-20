<!DOCTYPE html>
<html>
<head>
    <title>Create an Id and Subdomain for a new tenant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  
    <div class="card-body">
      <form  action="{{ route('subdomain.store') }}" method="post">
       @csrf
        <div class="form-group">
          <label for="subdomain">Subdomain</label>
          <input type="text" id="subdomain" name="subdomain" class="form-control">
          <label for="subdomain">Choose a package</label>
          <select id="package" name="package">
            @foreach ($package as $package)
              <option value="{{ $package->name }}">{{ $package->name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</body>
</html>