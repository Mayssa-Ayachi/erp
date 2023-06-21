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
                <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('package.showaddpackage') }}" class="btn btn-primary">Add a package</a>
</div>  
</body>
</html>