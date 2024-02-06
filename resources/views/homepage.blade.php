<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPMI | Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/unmer.png" rel="icon">
  <link href="/assets/img/unmer.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/crypt/vendor/aos/aos.css" rel="stylesheet">
  <link href="/crypt/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/crypt/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/crypt/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/crypt/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/crypt/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/crypt/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Scaffold
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      </div>

      {{-- <nav id="navbar" class="navbar order-last order-lg-0" data-background-color="blue2">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="#about">About Us</a></li>
              <li><a class="nav-link scrollto" href="#team">Team</a></li>
              <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar --> --}}

      <div class="header-social-links d-flex align-items-center">
        @auth
        <a href="/dashboard">
          <button class="btn btn-success" type="button"><i
            class="fas fa-sign-in-alt"></i>Dashboard</button>
        </a>
        @else
        <a href="/login">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-sign-in-alt"></i><span>Login</span>
          </button>
        </a>
        @endauth
        
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>Sistem Penjaminan Mutu Internal Universitas Merdeka Pasuruan</h1>
            <h6>SPMI merupakan suatu sistem yang dijalankan secara internal dalam suatu lembaga pendidikan untuk mewujudkan visi dan misi lembaga tersebut, serta memenuhi kebutuhan stakeholders melalui penyelenggaraan perguruan tinggi</h6>
            <br>
            <a href="#about" class="btn-get-started">More Info</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="/crypt/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in">
            <img src="/crypt/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3>Tujuan SPMI</h3>
              <p class="fst-italic">
                Tujuan Sistem Penjaminan Mutu Internal (SPMI) adalah memelihara dan meningkatkan mutu pendidikan tinggi secara berkelanjutan. Berikut beberapa tujuan spesifik dari SPMI :
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i>Meningkatkan kualitas pendidikan</li>
                <li><i class="bi bi-check-circle"></i>Memenuhi kebutuhan stakeholders</li>
                <li><i class="bi bi-check-circle"></i>Meningkatkan efisiensi dan efektivitas</li>
                <li><i class="bi bi-check-circle"></i>Memastikan akuntabilitas</li>
                <li><i class="bi bi-check-circle"></i>Meningkatkan daya saing lembaga pendidikan tinggi</li>
              </ul>
              <p>
                Melalui implementasi SPMI, diharapkan lembaga pendidikan tinggi dapat terus berinovasi dan meningkatkan kualitas pendidikan demi menciptakan lulusan yang berkualitas dan siap menghadapi tantangan dunia kerja
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Fakultas Teknologi Informasi &#8226 Univesitas Merdeka Pasuruan</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/crypt/vendor/aos/aos.js"></script>
  <script src="/crypt/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/crypt/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/crypt/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/crypt/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/crypt/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/crypt/js/main.js"></script>

</body>

</html>