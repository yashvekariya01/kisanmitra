<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "kisanmitra"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role']; 

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        

        
        $sql = "INSERT INTO login_users (username, email, password, role) 
                VALUES ('$username', '$email', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kisan Mitra – Register</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Roboto', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('image/banner.webp') no-repeat center center/cover;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 1;
    }

    .register-container {
      position: relative;
      z-index: 2;
      padding: 40px 35px;
      border-radius: 16px;
      box-shadow: 0 12px 25px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 450px;
      text-align: center;
      animation: fadeIn 1s ease;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
    }

    .register-container h2 {
      color: #fff700ff;
      font-weight: bold;
      margin-bottom: 20px;
      font-size: 2rem;
    }

    .register-container p {
      font-size: 0.95rem;
      font-weight: bold;
      color: #ffffffff;
      margin-bottom: 30px;
    }

    .register-container input, 
    .register-container select {
      width: 100%;
      padding: 12px 15px;
      margin-bottom: 20px;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      font-size: 1rem;
      transition: 0.3s;
    }
    .register-container input:focus,
    .register-container select:focus {
      border-color: #10b981;
      box-shadow: 0 0 8px rgba(16,185,129,0.3);
      outline: none;
    }

    .register-container button {
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
    .register-container button:hover {
      transform: scale(1.03);
      opacity: 0.95;
    }

    .register-container .links {
      margin-top: 20px;
      font-size: 0.9rem;
    }
    .register-container .links a {
      color: #10b981;
      text-decoration: none;
      transition: 0.3s;
    }
    .register-container .links a:hover { text-decoration: underline; color: #059669; }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Register</h2>
    <p>Create your account to access Kisan Mitra</p>
    
    <form method="POST" action="">
      <input type="text" name="fullname" placeholder="Full Name" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>

      
      <select name="role" required>
        <option value="">-- Select Role --</option>
        <option value="farmer">Farmer</option>
        <option value="buyer">Buyer</option>
      </select>

      <button type="submit">Register</button>
    </form>

    <div class="links">
      <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
  </div>
</body>
</html>
