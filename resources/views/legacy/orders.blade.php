<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4">🛒 My Orders</h2>
  <table class="table table-bordered table-striped">
    <thead class="table-success">
      <tr>
        <th>#</th>
        <th>Crop</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Order Date</th>
      </tr>
    </thead>
    <tbody>
      @forelse($orders as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->crop_name }}</td>
          <td>{{ $row->quantity }}</td>
          <td>₹{{ $row->price }}</td>
          <td>₹{{ $row->total }}</td>
          <td>{{ $row->order_date }}</td>
        </tr>
      @empty
        <tr><td colspan='6' class='text-center text-muted'>No orders yet</td></tr>
      @endforelse
    </tbody>
  </table>
  <a href="{{ route('buy_crop') }}" class="btn btn-danger mt-3">⬅ Back to Marketplace</a>
</div>
</body>
</html>
