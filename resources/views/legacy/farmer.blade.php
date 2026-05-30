<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Farmer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <div class="card shadow p-4 rounded-4">
    <h1 class="text-success">🌾 Welcome Farmer, {{ Session::get('username') }}!</h1>
    <hr>

    <h3 class="text-primary">➕ Add Crop for Sale</h3>
    <form method="POST" action="{{ route('farmer.add_crop') }}" class="row g-3">
      @csrf
      <div class="col-md-4">
        <input type="text" class="form-control" name="crop_name" placeholder="Crop Name" required>
      </div>
      <div class="col-md-3">
        <input type="number" step="0.01" class="form-control" name="price" placeholder="Price" required>
      </div>
      <div class="col-md-3">
        <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
      </div>
      <div class="col-md-2">
        <button type="submit" name="add_crop" class="btn btn-success w-100">Add</button>
      </div>
    </form>

    <hr>
    <h3 class="text-primary">📋 Your Crops</h3>
    <table class="table table-bordered table-striped">
      <thead class="table-success">
        <tr>
          <th>Crop</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      @forelse($crops as $row)
        <tr>
          <td>{{ $row->crop_name }}</td>
          <td>₹ {{ $row->price }}</td>
          <td>{{ $row->quantity }}</td>
          <td><span class='badge {{ $row->status == "available" ? "bg-success" : "bg-danger" }}'>{{ $row->status }}</span></td>
        </tr>
      @empty
        <tr><td colspan='4' class='text-center text-muted'>No crops added yet</td></tr>
      @endforelse
      </tbody>
    </table>

    <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
  </div>
</div>

</body>
</html>
