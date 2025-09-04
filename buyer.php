<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'buyer') {
    header("Location: login.php");
    exit();
}
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buyer Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f8fb;
      margin: 0;
      padding: 0;
    }
    header {
      background: #2c3e50;
      color: white;
      padding: 15px;
      text-align: center;
    }
    h1 {
      margin: 0;
    }
    .container {
      width: 90%;
      margin: 20px auto;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    th {
      background: #3498db;
      color: white;
    }
    tr:nth-child(even) {
      background: #f9f9f9;
    }
    a.buy-btn {
      padding: 6px 12px;
      background: #27ae60;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }
    a.buy-btn:hover {
      background: #219150;
    }
    .logout {
      float: right;
      margin-top: -40px;
      margin-right: 20px;
    }
    .logout a {
      background: #e74c3c;
      color: white;
      padding: 6px 12px;
      text-decoration: none;
      border-radius: 4px;
    }
    .logout a:hover {
      background: #c0392b;
    }
  </style>
</head>
<body>

<header>
  <h1>🛒 Welcome Buyer, <?php echo $_SESSION['username']; ?>!</h1>
  <div class="logout"><a href="logout.php">Logout</a></div>
</header>

<div class="container">
  <h2>Available Crops for Sale</h2>
  <table>
    <tr>
      <th>Crop</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Farmer</th>
      <th>Action</th>
    </tr>
    <?php
    $sql = "SELECT * FROM crops WHERE status='available'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['crop_name']."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['farmer_username']."</td>
                    <td><a class='buy-btn' href='buy_crop.php?id=".$row['id']."'>Buy</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No crops available right now.</td></tr>";
    }
    ?>
  </table>
</div>

</body>
</html>
