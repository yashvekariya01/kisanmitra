<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'buyer'){
    header("Location: login.php");
    exit();
}
include("db.php");

if(isset($_POST['buy'])){
    $id = $_POST['crop_id'];
    $quantity = $_POST['quantity'];

    $res = $conn->query("SELECT quantity, crop_name, price FROM crops WHERE id=$id AND status='available'");
    $row = $res->fetch_assoc();
    if($row && $row['quantity'] >= $quantity){
        $newQty = $row['quantity'] - $quantity;
        $status = $newQty > 0 ? 'available' : 'sold';
        $conn->query("UPDATE crops SET quantity=$newQty, status='$status' WHERE id=$id");

        $total = $row['price'] * $quantity;
        $buyer = $_SESSION['username'];
        $conn->query("INSERT INTO orders (buyer_username, crop_id, crop_name, quantity, price, total) 
                     VALUES ('$buyer', $id, '{$row['crop_name']}', $quantity, {$row['price']}, $total)");
    }
}
?>
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
    <h1 class="text-primary">🛒 Welcome Buyer, <?php echo $_SESSION['username']; ?>!</h1>

    <a href="orders.php" class="btn btn-success mb-3">🛒 View My Orders</a>

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
      <?php
      $result = $conn->query("SELECT * FROM crops WHERE status='available'");
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['crop_name']}</td>
                    <td>₹ {$row['price']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['farmer_username']}</td>
                    <td>
                      <form method='POST' class='d-flex'>
                        <input type='hidden' name='crop_id' value='{$row['id']}'>
                        <input type='number' name='quantity' min='1' max='{$row['quantity']}' class='form-control me-2' required>
                        <button type='submit' name='buy' class='btn btn-sm btn-primary'>Buy</button>
                      </form>
                    </td>
                  </tr>";
        }
      } else {
        echo "<tr><td colspan='5' class='text-center text-muted'>No crops available</td></tr>";
      }
      ?>
      </tbody>
    </table>

    <a href='index.php' class='btn btn-danger mt-3'>Logout</a>
  </div>
</div>

</body>
</html>
