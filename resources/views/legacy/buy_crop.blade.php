<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buyer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <div class="card shadow p-4 rounded-4">
    <h1 class="text-primary">🛒 Welcome Buyer, {{ Session::get('username') }}!</h1>

    <a href="{{ route('orders') }}" class="btn btn-success mb-3">🛒 View My Orders</a>

    <hr>

    <h3 class="text-success">🌱 Available Crops</h3>
    <table class="table table-bordered table-striped">
      <thead class="table-primary">
        <tr>
          <th>Crop</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Farmer</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @forelse($crops as $row)
        <tr>
          <td>{{ $row->crop_name }}</td>
          <td>₹ {{ $row->price }}</td>
          <td>{{ $row->quantity }}</td>
          <td>{{ $row->farmer_username }}</td>
          <td>
            <form method='POST' action="{{ route('buy_crop.action') }}" class='d-flex'>
              @csrf
              <input type='hidden' name='crop_id' value='{{ $row->id }}'>
              <input type='number' name='quantity' min='1' max='{{ $row->quantity }}' class='form-control me-2' required>
              <button type='submit' name='buy' class='btn btn-sm btn-primary'>Buy</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan='5' class='text-center text-muted'>No crops available</td></tr>
      @endforelse
      </tbody>
    </table>

    <a href="{{ route('logout') }}" class='btn btn-danger mt-3'>Logout</a>
  </div>
</div>

</body>
</html>
