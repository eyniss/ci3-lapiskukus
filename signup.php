<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="home.html" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  
<!-- Light Navbar (Tetap)
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">B</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="#">Overview</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Inventory</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Customers</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
      </ul>
    </div>
  </div>
</nav> -->

<!-- Sign Up Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title" id="signUpModalLabel">Create an Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="signupName" class="form-label">Name</label>
            <input type="text" class="form-control" id="signupName" placeholder="Enter your name" required>
          </div>
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" placeholder="Enter your email" required>
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="signupPassword" placeholder="Enter your password" required>
          </div>
          <div class="mb-3">
            <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="signupConfirmPassword" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </div>
      </form>
      </div>
      </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="footer-top">
            <div class="footer-brand">
              <img src="logo.png" alt="Logo Rukita" class="logo">
              <img src="qr-code.png" alt="QR Code" class="qr">
             
            </div>
      
            <div class="footer-links">
              <div>
                <h4>Tenant</h4>
                <ul>
                  <li>Kost</li>
                  <li>Apartemen</li>
                  <li>Community</li>
                </ul>
              </div>
              <div>
                <h4>Kerjasama Rukita</h4>
                <ul>
                  <li>Coliving</li>
                  <li>Apartemen</li>
                  <li>Build to Rent</li>
                  <li>RuFinance</li>
                </ul>
              </div>
              <div>
                <h4>Rukita For Business</h4>
                <ul>
                  <li>Corporate Housing</li>
                  <li>Corporate Subscription</li>
                  <li>RuCollab</li>
                </ul>
              </div>
              <div>
                <h4>Resource</h4>
                <ul>
                  <li>Tentang Rukita</li>
                  <li>FAQ</li>
                  <li>Karir</li>
                  <li>Stories</li>
                </ul>
              </div>
              <div class="footer-support">
                <h4>Support</h4>
                <ul>
                  <li>📞 +62 811-154-6477</li>
                  <li>✉️ info@rukita.co</li>
                </ul>
                <p>Jam Operasional</p>
                <p>Senin - Jumat: 10.00 - 19.00<br>Sabtu - Minggu: 10.30 - 17.00</p>
              </div>
            </div>
          </div>
      
          <div class="footer-bottom">
            <p>© 2025 Rukita. All rights reserved. <a href="#">Syarat & Ketentuan</a> | <a href="#">Kebijakan Privasi</a></p>
            <div class="social-icons">
              <a href="#">🌐</a>
              <a href="#">📸</a>
              <a href="#">🐦</a>
              <a href="#">🎵</a>
            </div>
          </div>
        </div>
      </footer>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>