<?php
$servername = "localhost";
$username = "root";   
$password = "";       
$dbname = "kisanmitra";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, old_price AS old, new_price AS new FROM apmc_products";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kisan Mitra – Digital Marketplace</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Roboto', sans-serif; background: #f8faff; color: #333; }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 18px 50px;
      background: linear-gradient(90deg, #1e3a8a, #0f766e);
      color: white;
      position: sticky;
      top: 0;
      z-index: 999;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .navbar .brand {
      font-size: 1.6rem;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      transition: 0.3s;
    }
    .navbar .brand:hover { color: #10b981; }
    .navbar .buttons a {
      margin-left: 12px;
      padding: 10px 22px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }
    .navbar .buttons a.login {
      background: transparent;
      color: #fff;
      border: 2px solid #fff;
    }
    .navbar .buttons a.login:hover {
      background: #fff; color: #1e3a8a;
    }
    .navbar .buttons a.register {
      background: linear-gradient(90deg, #10b981, #059669);
      color: #fff;
    }
    .navbar .buttons a.register:hover {
      opacity: 0.9; transform: scale(1.05);
    }

    .price-ticker {
      overflow:hidden; white-space:nowrap;
      background: #e6fffa;
      padding:10px; font-weight:500; font-size:1rem;
      border-bottom:3px solid #10b981;
    }
    .price-ticker span { margin-right:50px; }
    @keyframes scroll {
      0% { transform:translateX(-20%); }
      100% { transform:translateX(-100%); }
    }
    .price-ticker div {
      display:inline-block;
      animation:scroll 30s linear infinite; 
    }
    .price-ticker:hover div { animation-play-state:paused; }
    .up { color: #22c55e; font-weight:bold; }
    .down { color: #ef4444; font-weight:bold; }

    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 90px 10%;
      background: linear-gradient(135deg, #e0f2fe, #f0fdf4);
      position: relative;
      overflow: hidden;
    }
    .hero::before {
      content: "";
      position: absolute;
      width: 400px;
      height: 400px;
      background: rgba(16,185,129,0.2);
      border-radius: 50%;
      top: -100px;
      right: -150px;
      z-index: 0;
    }
    .hero-text { max-width: 500px; position: relative; z-index: 2; }
    .hero h1 {
      font-size: 3rem;
      color: #1e3a8a;
      margin-bottom: 20px;
      line-height: 1.3;
    }
    .hero p { font-size: 1.15rem; margin-bottom: 25px; color: #444; }
    .btn-main {
      background: linear-gradient(90deg, #10b981, #059669);
      color: white;
      padding: 14px 34px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
      box-shadow: 0 4px 15px rgba(16,185,129,0.3);
    }
    .btn-main:hover { transform: translateY(-3px) scale(1.05); opacity: 0.95; }
    .hero img {
      width: 460px;
      border-radius: 16px;
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
      position: relative;
      z-index: 2;
      transition: transform 0.4s;
    }
    .hero img:hover { transform: scale(1.03); }

    section { padding: 80px 10%; }
    h2 {
      text-align: center;
      font-size: 2.2rem;
      color: #1e3a8a;
      margin-bottom: 15px;
    }
    h2 span {
      display: block;
      font-size: 1rem;
      color: #10b981;
      margin-top: 8px;
    }

    .about {
      text-align: center;
      max-width: 850px;
      margin: 35px auto 0;
      font-size: 1.1rem;
      color: #444;
      line-height: 1.7;
      background: #fff;
      padding: 30px;
      border-radius: 14px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.08);
      transition: transform 0.3s;
    }
    .about:hover { transform: translateY(-6px); }
    .about img {
      width: 120px;
      margin-bottom: 20px;
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      margin-top: 40px;
    }
    .feature-box {
      background: #fff;
      border-radius: 14px;
      padding: 30px 25px;
      text-align: center;
      box-shadow: 0 6px 18px rgba(0,0,0,0.08);
      transition: 0.35s;
      position: relative;
      overflow: hidden;
    }
    .feature-box::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 4px;
      top: 0;
      left: 0;
      background: linear-gradient(90deg, #10b981, #059669);
      transform: scaleX(0);
      transition: transform 0.4s;
      transform-origin: left;
    }
    .feature-box:hover::before { transform: scaleX(1); }
    .feature-box:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    }
    .feature-box h3 {
      color: #1e3a8a;
      margin-bottom: 12px;
      font-size: 1.3rem;
    }
    .feature-box p {
      font-size: 0.95rem;
      color: #555;
    }

    footer {
      background: #1e293b;
      color: #ddd;
      text-align: center;
      padding: 30px;
      font-size: 0.95rem;
      margin-top: 60px;
    }
    footer a {
      color: #10b981;
      text-decoration: none;
      transition: 0.3s;
    }
    footer a:hover { text-decoration: underline; color: #34d399; }

    @media (max-width: 900px) {
      .hero { flex-direction: column; text-align: center; padding: 70px 6%; }
      .hero img { margin-top: 35px; width: 90%; }
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <a href="#" class="brand">🌾 Kisan Mitra</a>
    <div class="buttons">
      <a href="login.php" class="login">Login</a>
      <a href="register.php" class="register">Register</a>
    </div>
  </nav>

  <div class="price-ticker">
    <div>
      <?php foreach($products as $p): 
        $change = $p['new'] - $p['old'];
        if ($change > 0) {
          $sign = "+"; $cls="up";
        } elseif ($change < 0) {
          $sign = "−"; $cls="down";
        } else {
          $sign = ""; $cls="";
        }
      ?>
        <span>
          <?= $p['name']; ?>: ₹<?= $p['new']; ?>
          <span class="<?= $cls; ?>">(<?= $sign.abs($change); ?>)</span>
        </span>
      <?php endforeach; ?>
    </div>
  </div>

  <section class="hero">
    <div class="hero-text">
      <h1>Empowering Farmers,<br> Connecting Buyers</h1>
      <p>A trusted digital platform under APMC norms that makes agricultural trade transparent, simple, and rewarding for both farmers and buyers.</p>
      <a href="landing.php" class="btn-main">🚀 Get Started</a>
    </div>
    <img src="image/main.WEBP" alt="Farm Image">
  </section>

  <section>
    <h2>About Us <span>Our Mission</span></h2>
    <div class="about">
      <img src="assets/logo.png" alt="Kisan Mitra Logo">
      <p>
        At <strong>Kisan Mitra</strong>, our mission is to revolutionize agricultural trade by giving farmers direct access to markets.  
        We believe in <b>fair prices, digital transparency,</b> and building strong connections between farmers and buyers.  
        Through our platform, we ensure that every harvest turns into opportunity and prosperity. 🌱
      </p>
      <div style="margin-top:25px;">
        <a href="apmc.php" class="btn-main">➕ Add Member</a>
      </div>
    </div>
  </section>

  
  <section>
    <h2>Why Choose Us <span>Benefits for Farmers & Buyers</span></h2>
    <div class="features">
      <div class="feature-box">
        <h3>🌾 Fair Trade</h3>
        <p>Farmers receive fair pricing without exploitation by middlemen.</p>
      </div>
      <div class="feature-box">
        <h3>💳 Secure Payments</h3>
        <p>Safe and fast payment processing ensures trust and reliability.</p>
      </div>
      <div class="feature-box">
        <h3>📊 Transparency</h3>
        <p>Real-time pricing and transaction history for complete clarity.</p>
      </div>
      <div class="feature-box">
        <h3>🌍 Wider Reach</h3>
        <p>Farmers gain direct access to wholesalers, retailers, and traders nationwide.</p>
      </div>
    </div>
  </section>

  
  <footer>
    © 2025 Kisan Mitra | Designed with ❤️ for Farmers | <a href="contact.php">Contact Us</a>
  </footer>

</body>
</html>
