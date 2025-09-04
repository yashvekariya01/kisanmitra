<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KisanMitra – Empowering Farmers</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .hero {
      background: url('https://img.freepik.com/free-photo/agriculture-background-with-corn-field_342744-1150.jpg') no-repeat center center/cover;
      color: white;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
    }
    .hero::after {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
    }
    .hero-content {
      position: relative;
      z-index: 1;
    }
  </style>
</head>
<body>

  <section class="hero">
    <div class="hero-content">
      <h1 class="display-4 fw-bold">Empowering Farmers with Technology 🌱</h1>
      <p class="lead mb-4">
        KisanMitra ka mission hai kisano tak <b>digital solutions</b> pahunchana  
        jisse unhe apni fasal ke liye <b>sahi daam</b> aur <b>behtar bazaar</b> mil sake.
      </p>
      <a href="register.php" class="btn btn-success btn-lg shadow-lg px-4 py-2">
        🚀 Get Started
      </a>
    </div>
  </section>

  <section class="py-5 text-center">
    <div class="container">
      <h2 class="fw-bold mb-4">Why KisanMitra?</h2>
      <div class="row">
        <div class="col-md-4 mb-3">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">📈 Market Prices</h5>
              <p class="card-text">Real-time mandi aur market rates ek hi jagah pe dekhiye.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">👨‍🌾 Farmer Friendly</h5>
              <p class="card-text">Easy registration aur simple dashboard specially for farmers.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title">🤝 Connect with Buyers</h5>
              <p class="card-text">Direct traders aur buyers se judne ka moka.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2025 KisanMitra | Empowering Farmers 🌾</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
