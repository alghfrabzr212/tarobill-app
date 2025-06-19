<!DOCTYPE html>
<!--
Template name: Nova
Template author: FreeBootstrap.net
Author website: https://freebootstrap.net/
License: https://freebootstrap.net/license
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Taro</title>

  <!-- ======= Google Font =======-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
  <!-- End Google Font-->

  <!-- ======= Styles =======-->
  <link href="{{ asset('') }}assets/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/vendors/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/vendors/glightbox/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/vendors/aos/aos.css" rel="stylesheet">
  <!-- End Styles-->

  <!-- ======= Theme Style =======-->
  <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet">
  <!-- End Theme Style-->

  <!-- ======= Apply theme =======-->
  <script>
    // Apply the theme as early as possible to avoid flicker
    (function () {
      const storedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-bs-theme', storedTheme);
    })();
  </script>
</head>

<body>

  <!-- ======= Site Wrap =======-->
  <div class="site-wrap">

    <!-- ======= Header =======-->
    <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
      <div class="container d-flex align-items-center justify-content-between">

        <!-- Start Logo-->
        <a class="navbar-brand w-auto" href="index.html">
          <!-- If you use a text logo, uncomment this if it is commented-->
          <!-- Vertex-->

          <!-- If you plan to use an image logo, uncomment this if it is commented-->

          <!-- logo dark--><img class="logo dark img-fluid" src="{{ asset('') }}assets/images/logo.png"
            alt="FreeBootstrap.net image placeholder">

          <!-- logo light--><img class="logo light img-fluid" src="{{ asset('') }}assets/images/logo.png"
            alt="FreeBootstrap.net image placeholder">

        </a>
        <!-- End Logo-->

        <!-- Start offcanvas-->
        <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
          aria-labelledby="fbs__net-navbarsLabel">


          <div class="offcanvas-header">
            <div class="offcanvas-header-logo">
              <!-- If you use a text logo, uncomment this if it is commented-->

              <!-- h5#fbs__net-navbarsLabel.offcanvas-title Vertex-->

              <!-- If you plan to use an image logo, uncomment this if it is commented-->
              <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">


                <!-- logo dark--><img class="logo dark img-fluid" src="{{ asset('') }}assets/images/logo.png"
                  alt="FreeBootstrap.net image placeholder">

                <!-- logo light--><img class="logo light img-fluid" src="{{ asset('') }}assets/images/logo.png"
                  alt="FreeBootstrap.net image placeholder"></a>

            </div>
            <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>

          <div class="offcanvas-body align-items-lg-center">


            <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link scroll-link active" aria-current="page"
                  href="#beranda">Beranda</a></li>
              <li class="nav-item"><a class="nav-link scroll-link" href="#tentang">Tentang</a></li>
              <li class="nav-item"><a class="nav-link scroll-link" href="#keunggulan">Keunggulan</a></li>
              <li class="nav-item"><a class="nav-link scroll-link" href="#testimoni">Testimoni</a></li>
            </ul>

          </div>
        </div>
        <!-- End offcanvas-->

        <div class="ms-auto w-auto">


          <div class="header-social d-flex align-items-center gap-1">
            @guest
                <a class="btn btn-login py-2" href="{{ url('login') }}">Login</a>
            @endguest

            @auth
                <a class="btn btn-login py-2" href="{{ url('/dashboard') }}">Dashboard</a>
            @endauth
            <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto"
              data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars" aria-controls="fbs__net-navbars"
              aria-label="Toggle navigation" aria-expanded="false">
              <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <line x1="21" x2="3" y1="6" y2="6"></line>
                <line x1="15" x2="3" y1="12" y2="12"></line>
                <line x1="17" x2="3" y1="18" y2="18"></line>
              </svg>
              <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
              </svg>
            </button>

          </div>

        </div>
      </div>
    </header>
    <!-- End Header-->

    <!-- ======= Main =======-->
    <main>


      <!-- ======= Hero =======-->
      <section class="hero__v6 section" id="beranda">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <div class="row">
                <div class="col-lg-11"><span class="hero-subtitle text-uppercase" data-aos="fade-up"
                    data-aos-delay="0">Solusi Inovatif untuk Pengingat Tagihan Anda</span>
                  <h1 class="hero-title mb-3" data-aos="fade-up" data-aos-delay="100">Bebas Khawatir Tagihan dengan
                    Solusi Aman <br /> dan Cerdas</h1>
                  <p class="hero-description mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">Nikmati kemudahan
                    pengelolaan tagihan yang aman, efisien, dan ramah pengguna bersama Tarobill.</p>
                  <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300">
                    @guest
                <a class="btn btn-login py-2" href="{{ url('login') }}">Daftar Sekarang</a>
            @endguest

            @auth
                <a class="btn btn-login py-2" href="{{ url('/dashboard') }}">Pergi Sekarang</a>
            @endauth
                    </svg></a></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="hero-img"><img class="img-main img-fluid rounded-4" src="{{ asset('') }}assets/images/logo.png"
                  alt="Hero Image" data-aos="fade-in" data-aos-delay="500"></div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Hero-->

      <!-- ======= About =======-->
      <section class="about__v4 section" id="tentang">
        <div class="container">
          <div class="row">
            <div class="col-md-6 order-md-2">
              <div class="row justify-content-end">
                <div class="col-md-11 mb-4 mb-md-0"><span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                    data-aos-delay="0">Tentang Kami</span>
                  <h2 class="mb-4" data-aos="fade-up" data-aos-delay="100">Rasakan masa depan pengelolaan tagihan dengan
                    layanan finansial kami yang aman, efisien, dan mudah digunakan.</h2>
                  <div data-aos="fade-up" data-aos-delay="200">
                    <p>Taro Bill adalah solusi cerdas untuk membantu Anda mengelola dan mengingat semua tagihan secara
                      tepat waktu. Dengan Taro Bill, tidak ada lagi tagihan yang terlewat atau denda karena
                      keterlambatan. Dirancang untuk pengguna pribadi maupun bisnis kecil, Taro Bill hadir sebagai
                      asisten virtual Anda dalam hal pengelolaan pembayaran.</p>
                  </div>
                  <h4 class="small fw-bold mt-4 mb-3" data-aos="fade-up" data-aos-delay="300">Nilai Utama & Visi Kami
                  </h4>
                  <ul class="d-flex flex-row flex-wrap list-unstyled gap-3 features" data-aos="fade-up"
                    data-aos-delay="400">
                    <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i
                          class="bi bi-check"></i></span><span class="text">Inovasi</span></li>
                    <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i
                          class="bi bi-check"></i></span><span class="text">Aman</span></li>
                    <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i
                          class="bi bi-check"></i></span><span class="text">User Friendly </span></li>
                    <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i
                          class="bi bi-check"></i></span><span class="text">Cerdas</span></li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-wrap position-relative"><img class="img-fluid rounded-4"
                  src="{{ asset('') }}assets/images/about_2-min.jpg" alt="FreeBootstrap.net image placeholder" data-aos="fade-up"
                  data-aos-delay="0">
                <div class="mission-statement p-4 rounded-4 d-flex gap-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="mission-icon text-center rounded-circle"><i class="bi bi-lightbulb fs-4"></i></div>
                  <div>
                    <h3 class="text-uppercase fw-bold">Misi Kami</h3>
                    <p class="fs-5 mb-0">Misi kami adalah membantu individu agar tidak lagi melewatkan
                      pembayaran penting dengan solusi pengingat yang aman, efisien, dan mudah digunakan.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End About-->

      <!-- ======= Mengapa memilih kami =======-->
      <section class="section features__v2" id="keunggulan">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="d-lg-flex p-5 rounded-4 content" data-aos="fade-in" data-aos-delay="0">
                <div class="row">
                  <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="0">
                    <div class="row">
                      <div class="col-lg-11">
                        <div class="h-100 flex-column justify-content-between d-flex">
                          <div>
                            <h2 class="mb-4">Keunggulan</h2>
                            <p class="mb-5">Rasakan masa depan pengelolaan keuangan bersama Tarobill. Platform kami yang
                              aman, efisien, dan ramah pengguna memastikan semua tagihan Anda terkelola dengan aman,
                              lancar, dan mudah. Kami memberdayakan Anda untuk mengambil kendali penuh atas perjalanan
                              finansial Anda dengan percaya diri dan kemudahan</p>
                          </div>
                          <div class="align-self-start"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <div class="row justify-content-end">
                      <div class="col-lg-11">
                        <div class="row">
                          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="0">
                            <div class="icon text-center mb-4"><i class="bi bi-person-check fs-4"></i></div>
                            <h3 class="fs-6 fw-bold mb-3">User-Friendly Interface</h3>
                            <p>Antarmuka intuitif, nyaman di berbagai perangkat.</p>
                          </div>
                          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon text-center mb-4"><i class="bi bi-graph-up fs-4"></i></div>
                            <h3 class="fs-6 fw-bold mb-3">Financial Analytics</h3>
                            <p>Lacak pengeluaran dan dapatkan analisis personal.</p>
                          </div>
                          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon text-center mb-4"><i class="bi bi-headset fs-4"></i></div>
                            <h3 class="fs-6 fw-bold mb-3">Customer Support</h3>
                            <p>Layanan pelanggan 24/7.</p>
                          </div>
                          <div class="col-sm-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon text-center mb-4"><i class="bi bi-shield-lock fs-4"></i></div>
                            <h3 class="fs-6 fw-bold mb-3">Security Features</h3>
                            <p>Data Anda aman dengan enkripsi dan deteksi penipuan.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Mengapa memilih kami -->

      <!-- ======= Testimoni =======-->
      <section class="section testimonials__v2" id="testimoni">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                data-aos-delay="0">Testimoni</span>
              <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Apa Kata Mereka</h2>
              <p data-aos="fade-up" data-aos-delay="200">Real Stories of Success and Satisfaction from Our Diverse
                Community</p>
            </div>
          </div>
          <div class="row g-4" data-masonry="{&quot;percentPosition&quot;: true }">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
              <div class="testimonial rounded-4 p-4">
                <blockquote class="mb-3">
                  &ldquo;
                  Sebelum tau Tarobill, saya sering pusing memikirkan tanggal jatuh tempo tagihan bisnis. Sekarang,
                  notifikasi pengingatnya sangat membantu, tidak ada lagi tagihan terlewat dan denda tak terduga. Sangat
                  efisien!
                  &rdquo;
                </blockquote>
                <div class="testimonial-author d-flex gap-3 align-items-center">
                  <div class="author-img"><img class="rounded-circle img-fluid" src="{{ asset('') }}assets/images/person-sq-2-min.jpg"
                      alt="FreeBootstrap.net image placeholder"></div>
                  <div class="lh-base"><strong class="d-block">John Davis</strong><span>Small Business Owner</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="testimonial rounded-4 p-4">
                <blockquote class="mb-3">
                  &ldquo;
                  Sebagai freelancer dengan banyak proyek, sering lupa bayar tagihan adalah masalah. Tarobill
                  mengingatkan saya tepat waktu untuk setiap tagihan bulanan. Ini benar-benar penghemat waktu dan
                  penyelamat dompet!
                  &rdquo;
                </blockquote>
                <div class="testimonial-author d-flex gap-3 align-items-center">
                  <div class="author-img"><img class="rounded-circle img-fluid" src="{{ asset('') }}assets/images/person-sq-1-min.jpg"
                      alt="FreeBootstrap.net image placeholder"></div>
                  <div class="lh-base"><strong class="d-block">Emily Smith</strong><span>Freelancer</span></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="testimonial rounded-4 p-4">
                <blockquote class="mb-3">
                  &ldquo;
                  Dengan berbagai investasi, detail tagihan sering terabaikan. Fitur pengingat Tarobill memastikan saya
                  tidak pernah melewatkan pembayaran penting. Ini adalah tool esensial untuk menjaga arus kas tetap
                  lancar dan strategi keuangan saya on track.
                  &rdquo;
                </blockquote>
                <div class="testimonial-author d-flex gap-3 align-items-center">
                  <div class="author-img"><img class="rounded-circle img-fluid" src="{{ asset('') }}assets/images/person-sq-5-min.jpg"
                      alt="FreeBootstrap.net image placeholder"></div>
                  <div class="lh-base"><strong class="d-block">Michael Rodriguez</strong><span>Investor</span></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
              <div class="testimonial rounded-4 p-4">
                <blockquote class="mb-3">
                  &ldquo;
                  Sebagai mahasiswa, saya harus cermat dengan uang. Tarobill sangat membantu saya mengingat tagihan
                  internet, kos, atau langganan lainnya. Tidak ada lagi denda karena lupa bayar, plus antarmukanya mudah
                  sekali digunakan!
                  &rdquo;
                </blockquote>
                <div class="testimonial-author d-flex gap-3 align-items-center">
                  <div class="author-img"><img class="rounded-circle img-fluid" src="{{ asset('') }}assets/images/person-sq-3-min.jpg"
                      alt="FreeBootstrap.net image placeholder"></div>
                  <div class="lh-base"><strong class="d-block">Sarah Lee</strong><span>College Student</span></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
              <div class="testimonial rounded-4 p-4">
                <blockquote class="mb-3">
                  &ldquo;
                  Fitur keamanan Tarobill luar biasa, sangat menenangkan pikiran saya karena semua data tagihan aman. Ditambah notifikasi pengingatnya yang akurat, pengelolaan tagihan jadi sangat efisien dan mudah.
                  &rdquo;
                </blockquote>
                <div class="testimonial-author d-flex gap-3 align-items-center">
                  <div class="author-img"><img class="rounded-circle img-fluid" src="{{ asset('') }}assets/images/person-sq-7-min.jpg"
                      alt="FreeBootstrap.net image placeholder"></div>
                  <div class="lh-base"><strong class="d-block">James Kim</strong><span>IT Consultant</span></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
              <div class="testimonial rounded-4 p-4">
                <blockquote class="mb-3">
                  &ldquo;
                  Untuk startup saya, efisiensi adalah kunci. Tarobill membantu menyederhanakan proses pengelolaan tagihan perusahaan, memastikan semua pembayaran tepat waktu. Ini game-changer yang membuat kami fokus pada pertumbuhan bisnis, bukan pusing mikirin tagihan.
                  &rdquo;
                </blockquote>
                <div class="testimonial-author d-flex gap-3 align-items-center">
                  <div class="author-img"><img class="rounded-circle img-fluid" src="{{ asset('') }}assets/images/person-sq-8-min.jpg"
                      alt="FreeBootstrap.net image placeholder"></div>
                  <div class="lh-base"><strong class="d-block">Laura Brown</strong><span>Entrepreneur</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Testimoni-->

      <!-- ======= Footer =======-->
      <footer class="footer pt-5 pb-5">
        <div class="container py-1">
          <div class="row">

            <!-- Tentang Kami -->
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <h3 class="mb-3"><b>Tentang Kami</b></h3>
              <p>
                Taro Bill adalah solusi cerdas untuk membantu Anda mengelola dan mengingat semua tagihan secara tepat
                waktu. Dengan Taro Bill, tidak ada lagi tagihan yang terlewat atau denda karena keterlambatan. Dirancang
                untuk pengguna pribadi maupun bisnis kecil, Taro Bill hadir sebagai asisten virtual Anda dalam hal
                pengelolaan pembayaran.
              </p>
            </div>

            <!-- Akun -->
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 offset-lg-1">
            </div>

            <!-- Kontak -->
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 quick-contact">
              <h3 class="mb-3"><b>Kontak</b></h3>
              <p class="d-flex mb-3"><i class="bi bi-geo-alt-fill me-3"></i>
                <span>Jl. Raya Lenteng Agung No.20-21, RT.4/RW.1, Srengseng Sawah, Kec. Jagakarsa, <br> Jakarta Selatan
                </span>
              </p>
              <a class="d-flex mb-3" href="mailto:info@mydomain.com">
                <i class="bi bi-envelope-fill me-3"></i><span>tarobillapp@gmail.com</span>
              </a>
              <a class="d-flex mb-3" href="tel://+123456789900">
                <i class="bi bi-telephone-fill me-3"></i><span>+6289528127834</span>
              </a>
            </div>

          </div>
        </div>

      </footer>
      <!-- End Footer-->

    </main>
  </div>

  <!-- ======= Back to Top =======-->
  <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>
  <!-- End Back to top-->

  <!-- ======= Javascripts =======-->
  <script src="{{ asset('') }}assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}assets/vendors/gsap/gsap.min.js"></script>
  <script src="{{ asset('') }}assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('') }}assets/vendors/isotope/isotope.pkgd.min.js"></script>
  <script src="{{ asset('') }}assets/vendors/glightbox/glightbox.min.js"></script>
  <script src="{{ asset('') }}assets/vendors/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('') }}assets/vendors/aos/aos.js"></script>
  <script src="{{ asset('') }}assets/vendors/purecounter/purecounter.js"></script>
  <script src="{{ asset('') }}assets/js/custom.js"></script>
  <script src="{{ asset('') }}assets/js/send_email.js"></script>
  <!-- End JavaScripts-->
</body>

</html>