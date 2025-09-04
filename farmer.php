<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] != 'farmer'){
    header("Location: login.php");
    exit();
}
include("db.php");


if(isset($_POST['add_crop'])){
    $crop_name = $_POST['crop_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO crops (farmer_username, crop_name, price, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $_SESSION['username'], $crop_name, $price, $quantity);
    $stmt->execute();
    $stmt->close();
}
?>
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
    <h1 class="text-success">🌾 Welcome Farmer, <?php echo $_SESSION['username']; ?>!</h1>
    <hr>

    <h3 class="text-primary">➕ Add Crop for Sale</h3>
    <form method="POST" class="row g-3">
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
      <?php
      $result = $conn->query("SELECT * FROM crops WHERE farmer_username='".$_SESSION['username']."'");
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>{$row['crop_name']}</td>
                    <td>₹ {$row['price']}</td>
                    <td>{$row['quantity']}</td>
                    <td><span class='badge ".($row['status']=='available'?'bg-success':'bg-danger')."'>{$row['status']}</span></td>
                  </tr>";
        }
      } else {
        echo "<tr><td colspan='4' class='text-center text-muted'>No crops added yet</td></tr>";
      }
      ?>
      </tbody>
    </table>

    <a href="index.php" class="btn btn-danger mt-3">Logout</a>
  </div>
</div>

</body>
</html>
