<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>SATAHOST</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ $_favicon ?? asset('favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ $_favicon ?? asset('favicon.ico') }}" type="image/x-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets') }}/landing/vendor/aos/aos.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/landing/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/landing/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets') }}/landing/css/style.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">PPLGHOSTING</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Paket Hosting</a></li>
          @if (auth()->check())
            <li><a class="nav-link" href="{{ route('dashboard.index') }}">Kembali ke {{ __('Dashboard') }}</a></li>
          @else
            <li><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
            @if ($_is_active_register_page)
              <li><a class="nav-link" href="{{ route('register') }}">Daftar</a></li>
            @endif
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>SATAHOSTER</h1>
          <h2>SATAGALE STUDENT COMPANY</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ route('register') }}" class="btn-get-started scrollto">Get Started</a>
            <a href="https://akmalmaulanaa.notion.site/PPLG-HOSTING-198b506452eb43d3b6c14940e59aaf05" target="_blank" class="btn-watch-video"><i class="bi bi-play-circle"></i><span>Tutorial</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('assets/landing/Server-bro.png') }}" class="img-fluid animated" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Services</h2>
          <p>
            Kami menyediakan berbagai kebutuhan untuk pengembangan website
            Anda dengan kualitas terbaik yang bisa diakses di sini. Layanan
            ini didukung oleh server berbasis cloud yang memiliki fitur-fitur
            terbaik untuk meningkatkan kinerja website Anda secara signifikan.
            Kami memastikan bahwa website Anda dapat berjalan lebih cepat dan
            lebih efisien dengan memanfaatkan teknologi terdepan yang kami
            miliki.
          </p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-server"></i></div>
              <h4><a href="">Cloud Server</a></h4>
              <p>
                Kami menggunakan DigitalOcean linux server berbasis Cloud yang
                berlokasikan di San Fransisco
              </p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-time-five"></i></div>
              <h4><a href="">Up Time 24 Jam</a></h4>
              <p>Kami menyediakan layanan 24 jam untuk website Anda</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bxs-hand-up"></i></div>
              <h4><a href="">Kemudahan instalasi</a></h4>
              <p>Kami menyediakan layanan instalasi website dengan mudah</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-lock-alt"></i></div>
              <h4><a href="">Free SSL</a></h4>
              <p>Kami menyediakan layanan SSL gratis untuk website Anda</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Tim Kami</h2>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic">
                <img src="https://akmalmaulana.my.id/img/me/me.jpg" class="img-fluid" alt="" />
              </div>
              <div class="member-info">
                <h4>Akmal</h4>
                <span>Backend & Server Engineer</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic">
                <img src="{{ asset('assets/landing/zaqi.jpeg') }}" class="img-fluid" alt="" />
              </div>
              <div class="member-info">
                <h4>Zaqi Yusuf</h4>
                <span>Frontend Developer</span>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Harga</h2>
          <p>
            Kami menyediakan berbagai macam paket hosting dengan harga yang
            terjangkau
          </p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Starter</h3>
              <h4><sup>Rp</sup>7K<span>per Bulan</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> 1GB SSD Storage</li>
                <li>
                  <i class="bx bx-check"></i> 1 subdomain (.sata.host)
                </li>
                <li><i class="bx bx-check"></i> 1 database MySql</li>
                <li><i class="bx bx-check"></i> 1 custom Email</li>
                <li><i class="bx bx-check"></i> Free SSL</li>
                <li class="na">
                  <i class="bx bx-x"></i>
                  <span>Custom Domain</span>
                </li>
              </ul>
              <a href="{{ route('register') }}" class="buy-btn">Get Started</a>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Personal</h3>
              <h4><sup>Rp</sup>10K<span>per Bulan</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> 2GB SSD Storage</li>
                <li>
                  <i class="bx bx-check"></i> 5 subdomain (.sata.host)
                </li>
                <li><i class="bx bx-check"></i> 5 database MySql</li>
                <li><i class="bx bx-check"></i> 5 custom Email</li>
                <li><i class="bx bx-check"></i> Free SSL</li>
                <li class="na"><i class="bx bx-x"></i> <span> Custom Domain</span></li>
              </ul>
              <a href="{{ route('register') }}" class="buy-btn">Get Started</a>
            </div>
          </div>
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Super</h3>
              <h4><sup>Rp</sup>15K<span>per Bulan</span></h4>
              <ul>
                <li><i class="bx bx-check"></i> 5GB SSD Storage</li>
                <li>
                  <i class="bx bx-check"></i> 1 subdomain (.sata.host)
                </li>
                <li><i class="bx bx-check"></i> 5 Domain</li>
                <li><i class="bx bx-check"></i> Unlimited Subdomain</li>
                <li><i class="bx bx-check"></i> Unlimited database MySql</li>
                <li><i class="bx bx-check"></i> Unlimited custom Email</li>
                <li><i class="bx bx-check"></i> Free SSL</li>
              </ul>
              <a href="{{ route('register') }}" class="buy-btn">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Pricing Section -->
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Akmal Maulana Basri</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets') }}/landing/vendor/aos/aos.js"></script>
  <script src="{{ asset('assets') }}/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets') }}/landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('assets') }}/landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('assets') }}/landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('assets') }}/landing/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('assets') }}/landing/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets') }}/landing/js/main.js"></script>
</body>

</html>
