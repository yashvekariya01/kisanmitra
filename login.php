<?php
session_start();

// DB Connection
$servername = "localhost";
$dbuser = "root";   // default XAMPP user
$dbpass = "";       // default XAMPP password is blank
$dbname = "kisanmitra";

$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `login_users` WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == "farmer") {
            header("Location: farmer.php");
            exit();
        } elseif ($row['role'] == "buyer") {
            header("Location: buyer.php");
            exit();
        }
    } else {
        echo "<script>alert('Invalid Username or Password'); window.location='login.php';</script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kisan Mitra – Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Roboto', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('image/farm.jpeg') no-repeat center center/cover;
      position: relative;
    }
    body::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 1;
    }
    .login-container {
      position: relative;
      z-index: 2;
      background: #fff;
      padding: 40px 35px;
      border-radius: 16px;
      box-shadow: 0 12px 25px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
      animation: fadeIn 1s ease;
    }
    .login-container h2 {
      color: #1e3a8a;
      font-weight:bold;
      margin-bottom: 20px;
      font-size: 2rem;
    }
    .login-container p {
      font-size: 0.95rem;
      font-weight:bold;
      color: #444;
      margin-bottom: 30px;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      font-size: 1rem;
      transition: 0.3s;
    }
    .login-container input:focus {
      border-color: #10b981;
      box-shadow: 0 0 8px rgba(16,185,129,0.3);
      outline: none;
    }
    .login-container button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(90deg, #10b981, #059669);
      border: none;
      border-radius: 12px;
      color: white;
      font-weight: bold;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 6px 18px rgba(16,185,129,0.3);
    }
    .login-container button:hover {
      transform: scale(1.03);
      opacity: 0.95;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <p>Enter your credentials to access Kisan Mitra</p>
    
    <form action="" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
