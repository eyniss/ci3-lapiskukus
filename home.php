<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "kost";

session_start();
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

//sign up handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["ajax"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        echo json_encode(["status" => "error", "message" => "Password tidak cocok."]);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (nama, emailaddress, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    $stmt->close();
    exit;
}

//login handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  $email = $_POST['login_email'];
  $password = $_POST['login_password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE emailaddress = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      header("Location: ". $_SERVER['PHP_SELF']);
      exit;
  } else {
      $login_error = "Email atau password salah!";
  }
}

//logout hanlder
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ". $_SERVER['PHP_SELF']);
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Navbar White with Shadow and Bigger Size</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    html, body {
      height: 100%;
    }
    
    body {
      display: flex;
      flex-direction: column;
    }
    
    main {
      flex: 1;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    /* Tambahan style */
    .navbar-nav .nav-link {
      font-size: 0.9rem; /* Menyesuaikan ukuran font sesuai kebutuhan */
    }
    .navbar-shadow {
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .navbar-bigger {
      padding-top: 1rem;
      padding-bottom: 1rem;
      min-height: 80px;
    }

    .logo-title {
      display: flex;
      align-items: center;
    }

    .logo {
      height: 110px;
      width: auto;
    }

    .btn {
      font-size: 1rem; /* Menyesuaikan ukuran font tombol */
      padding: 5px 10px; /* Menambah padding untuk tombol lebih besar */
    }

 
   .footer {
    background: #111;
    color: #eee;
    font-family: Arial, sans-serif;
    padding: 40px 0;
  }
  
  .container {
    width: 90%;
    margin: 0 auto;
  }
  
  .footer-top {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  
  .footer-brand {
    flex: 1 1 250px;
  }
  
  .footer-brand .logo {
    width: 100px;
    margin-bottom: 10px;
  }
  
  .footer-brand .qr {
    width: 120px;
    margin-bottom: 20px;
  }
  
  .app-buttons {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  
  .btn-app,
  .btn-login {
    background: #333;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    text-align: left;
  }

  /* Banner Style */
  .banner {
      width: 100%;
      height: 400px;
      overflow: hidden;
    }
    .banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Carousel Style */
    .carousel-item img {
      height: 400px;
      object-fit: cover;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
    }
    .carousel-indicators [data-bs-target] {
      background-color: #000;
      justify-content: center;
    }
    

    .text-left {
      flex: 1;
      min-width: 100px;
    }

    .text-left h1 {
      font-family: 'Anton', sans-serif;
      font-size: 40px;
      font-weight: 900;
      margin-bottom: 20px;
    }

    .text-left p {
      font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      font-size: 30px;
      color: #673c3c;
      padding-bottom: 5%;
    }

    .slide2{
      padding: 3%;
      border-radius: 0px 70px 0px 70px;
      background-color:rgb(160, 223, 215);
    }

.banner2 {
  padding-top: 5%;
  overflow: hidden;
  min-height: 450px;
  position: relative;
}

.banner-img {
  border-radius: 0px 30px 0px 0px;
  height: 90%;
  width: 90%;
  object-fit: cover;
}

.banner-text {

  height: 100%;
  position: relative;
}

.banner-text h2 {
  font-weight: bold;
  font-size: 2rem;
}

/* .indicator-circle {
  width: 50px;
  height: 50px;
  border: 3px solid green;
  border-radius: 50%;
  margin-top: 50px;
  position: absolute;
  bottom: 30px;
  right: 30px;
} */

  
  .footer-links {
    display: flex;
    flex: 2 1 600px;
    gap: 40px;
  }
  
  .footer-links h4 {
    margin-bottom: 10px;
    color: #00a896;
  }
  
  .footer-links ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .footer-links li {
    margin-bottom: 8px;
  }
  
  .footer-support {
    max-width: 200px;
  }
  
  .footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 40px;
    border-top: 1px solid #333;
    padding-top: 20px;
    font-size: 14px;
  }
  
  .footer-bottom a {
    color: #00a896;
    text-decoration: none;
  }
  
  .social-icons a {
    margin-left: 15px;
    font-size: 20px;
  }
  

  </style>
</head>
<body>

<!-- White Navbar with Shadow  -->
<nav class="navbar navbar-expand-lg navbar-light bg-white navbar-shadow ">
  <div class="container-fluid">
    <header class="sticky-header">
      <div class="logo-title">
        <img src="logoo.png" alt="Logo" class="logo">
      </div>
    </header>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="#">FAQs</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
      </ul>
      <div class="d-flex">
        <?php if (isset($_SESSION['user'])): ?>
          <a href="#" class="btn btn-outline-dark me-2">
            👤 <?= $_SESSION['user']['nama']; ?>
          </a>
          <a href="?logout=true" class="btn btn-outline-danger">Logout</a>
        <?php else: ?>
          <button class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signUpModal">
            Sign Up
          </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<main>

    <section>	
      <div class="outlet-content">
      <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="banner1.png" class="d-block w-100" alt="banner">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="banner2.jpg" class="d-block w-100" alt="banner">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="banner3.png" class="d-block w-100" alt="banner">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

        <!-- <div class="text-left">
          <h1>Tempat Terbaik Membawa Pulang Oleh-oleh<br> Kebanggaan Kota Malang</h1>
          <p>Dari kelembutan setiap lapisan, hingga rasa yang khas,<br>
            kami hadir untuk menemani momen manismu bersama orang tersayang.</p>
        </div> -->
      </div>
    </section>

    <section class="slide2">
    <h2 class="text-center text-success fw-bold">Keuntungan Tinggal Di Omah Kost</h2>

<div class="d-flex flex-row gap-4 p-5">
<!-- Card 1 -->
<div class="card">
  <img src="assets/img/card1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card 1</h5>
    <p class="card-text">Ini adalah deskripsi singkat untuk Card 1.</p>
    <a href="#" class="btn btn-primary">Detail</a>
  </div>
</div>

<!-- Card 2 -->
<div class="card">
  <img src="assets/img/card2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card 2</h5>
    <p class="card-text">Ini adalah deskripsi singkat untuk Card 2.</p>
    <a href="#" class="btn btn-primary">Detail</a>
  </div>
</div>

<!-- Card 3 -->
<div class="card">
  <img src="assets/img/card3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card 3</h5>
    <p class="card-text">Ini adalah deskripsi singkat untuk Card 3.</p>
    <a href="#" class="btn btn-primary">Detail</a>
  </div>
</div>

<!-- Card 3 -->
<div class="card">
  <img src="assets/img/card3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card 3</h5>
    <p class="card-text">Ini adalah deskripsi singkat untuk Card 3.</p>
    <a href="#" class="btn btn-primary">Detail</a>
  </div>
</div>

<!-- Card 3 -->
<div class="card">
  <img src="assets/img/card3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card 3</h5>
    <p class="card-text">Ini adalah deskripsi singkat untuk Card 3.</p>
    <a href="#" class="btn btn-primary">Detail</a>
  </div>
</div>
</div>
    </section>

    <section class="banner2">
  <div class="container-fluid">
    <div class="row align-items-center">
      
      <!-- Gambar -->
      <div class="col-md-6 p-0">
        <img src="banner2.png" class="img-fluid banner-img" alt="Banner Image">
      </div>

      <!-- Konten Teks -->
      <div class="col-md-6 d-flex flex-column justify-content-center align-items-start banner-text">
        <h2 class="mb-4">Yuk cari Hunian<br>untukmu sekarang!</h2>
        <a href="#" class="btn btn-dark rounded-3 px-4 py-2">Cari Sekarang</a>

        <!-- Indikator Bulat -->
        <div class="indicator-circle"></div>
      </div>

    </div>
  </div>
</section>

    
</main>

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
            <input type="text" class="form-control" id="signupName" placeholder="Enter your name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" placeholder="Enter your email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="signupPassword" class="form-label">Pasword</label>
            <input type="password" class="form-control" id="signupPassword" placeholder="Enter your password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="signupConfirmPassword" placeholder="Confirm your password" name="confirm_password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
    </div>

    <?php
// session_start();
include 'konek.php'; // koneksi database

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert ke database
    $query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
    if (mysqli_query($koneksi, $query)) {
        
        // Ambil ID user yang baru saja dibuat
        $user_id = mysqli_insert_id($konek);

        // Set session langsung setelah daftar
        $_SESSION['user'] = [
            'id' => $user_id,
            'nama' => $nama,
            'email' => $email
        ];

        // Redirect ke halaman dashboard/home
        header('Location: home.php');
        exit();
    } else {
        echo "Gagal daftar: " . mysqli_error($koneksi);
    }
}
?>


      <footer class="footer">
        <div class="container">
          <div class="footer-top">
            <div class="footer-brand">
              <img src="logoo.png" alt="Logo Rukita" class="logo">
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
              <!-- <div>
                <h4>Kerjasama Rukita</h4>
                <ul>
                  <li>Coliving</li>
                  <li>Apartemen</li>
                  <li>Build to Rent</li>
                  <li>RuFinance</li>
                </ul>
              </div> -->
              <div>
                <h4>OmahKost For Business</h4>
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
      <!-- <script>
document.getElementById("signupForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData(this);
  formData.append("ajax", true); // Flag to trigger PHP handling

  fetch("signup.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === "success") {
      alert("Sign up berhasil!");
      document.getElementById("signupForm").reset();
    } else {
      alert("Error: " + data.message);
    }
  })
  .catch(err => alert("AJAX error: " + err));
});
</script> -->
</body>
    </div>
  </div>
