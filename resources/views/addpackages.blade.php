<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  
    <div class="card-body">
      <form  action="{{ route('package.store') }}" method="post">
       @csrf
        <div class="form-group">
          <label for="package">Package</label>
          <input type="text" id="package" name="package" class="form-control">

          <label for="price">Price</label>
          <input type="text" id="price" name="price" class="form-control">

          <label for="description">Description</label>
          <input type="text" name="description" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>  
</body>
</html>