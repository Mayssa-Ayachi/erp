<!DOCTYPE html>
<html>
<head>
    <title>Create users for a tenant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<style>
  .card {
    width: 50%; 
    margin: auto;
    margin-top: 10vh;
  }
  .alert {
    width: 50%;
    z-index: 9999;
    margin: auto;
  }
</style> 

    <div class="card">
    <div class="card-body">
      <form  action="{{ route('userstenant.store') }}" method="post">
      @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" id="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
  </div>
</div> 
</body>
</html>