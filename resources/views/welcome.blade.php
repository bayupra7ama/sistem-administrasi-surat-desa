<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Surat Desa</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/landing-page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/landing-page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('/landing-page/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                @if ($profilDesa->logo)
                    <img src="{{ asset('storage/' . $profilDesa->logo) }}" alt="Logo Desa" class="">
                @else
                    <img src="{{ asset('template/dist/assets/img/avatar/avatar-2.png') }}" alt="Logo Desa"
                        class="">
                @endif
                <h1 class="sitename">Surat Desa</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#beranda" class="active">Beranda</a></li>
                    <li><a href="#surat">Layanan Surat</a></li>
                    <li><a href="#prosedur">Prosedur Pengajuan</a></li>
                    <li><a href="#waktuPelayanan">Waktu Pelayanan</a></li>
                    <li><a href="#kontak">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">MASUK</a>
            {{-- <a class="btn-getstarted" href="{{ route('register') }}">DAFTAR</a> --}}

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="beranda" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('/landing-page/assets/img/hero-bg-light.webp') }}" alt="">
            </div>
            <div class="container text-center">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 data-aos="fade-up">Selamat datang di <span>Surat Desa</span></h1>
                    <p data-aos="fade-up" data-aos-delay="100">Ajukan permohonan surat dari mana saja<br>
                    </p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="#about" class="btn-get-started">Ajukan Surat</a>
                        {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Video Tutorial</span></a> --}}
                    </div>
                    <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section light-background">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-envelope"></i></div>
                            <div>
                                <h4 class="title"><a href="#" class="stretched-link">Pengajuan Surat Online</a>
                                </h4>
                                <p class="description">Ajukan berbagai jenis surat desa dengan mudah melalui platform
                                    kami,
                                    tanpa harus datang langsung ke kantor desa.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                            <div>
                                <h4 class="title"><a href="#" class="stretched-link">Pemantauan Status
                                        Surat</a></h4>
                                <p class="description">Pantau status pengajuan surat Anda secara real-time, mulai dari
                                    proses
                                    pengajuan hingga selesai diproses.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-clock-history"></i></div>
                            <div>
                                <h4 class="title"><a href="#" class="stretched-link">Riwayat Surat</a>
                                </h4>
                                <p class="description">Lihat riwayat lengkap dari semua surat yang pernah Anda ajukan,
                                    untuk
                                    keperluan dokumentasi dan arsip.</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- About Section -->
        <section id="surat" class="about section pb-6">

            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2>Jenis Surat</h2>
                <p>Berikut adalah beberapa jenis surat yang dapat Anda ajukan melalui sistem Surat Desa</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-5 justify-content-center">

                    <!-- Card Surat Pengantar -->
                    @foreach ($jenisSurat as $item)
                        <div class="col-lg-3 col-md-4 col-sm-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-lg border-0 rounded-lg h-100">
                                <div class="card-body text-center p-1">
                                    <div class="card-icon mb-3">
                                        <i class="bi bi-file-earmark-text"
                                            style="font-size: 2.5rem; color: #2c3e50;"></i>
                                    </div>
                                    <h5 class="card-title mb-3">{{ $item->nama_surat }}</h5>
                                    {{-- <p class="card-text">{{ $item->deskripsi }}</p> --}}
                                </div>
                            </div>
                        </div><!-- End Card Surat Pengantar -->
                    @endforeach
                </div>
            </div>
        </section>

        <!-- /About Section -->

        <!-- Features Section -->
        <section id="prosedur" class="prosedur section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" style="text-align: center;">
                <h2 style="font-size: 36px; font-weight: bold; color: #333;">Prosedur Pengajuan Surat</h2>
                <p style="font-size: 18px; color: #6c757d;">Ikuti langkah-langkah berikut untuk mengajukan surat
                    melalui aplikasi Surat Desa.</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-10">

                        <div class="row g-4">
                            {{-- <!-- Card Langkah 1 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-person-plus" style="font-size: 40px; color: #3688a2;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">
                                            Registrasi Akun</h5>
                                        <p class="card-text" style="color: #6c757d;">Daftar terlebih dahulu untuk
                                            membuat akun pengguna pada aplikasi Surat Desa.</p>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Card Langkah 2 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px; background-color: #ffffff;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark" style="font-size: 40px; "></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Pilih
                                            Jenis Surat</h5>
                                        <p class="card-text" style="color: #6c757d;">Pilih jenis surat yang ingin Anda
                                            ajukan dari daftar yang tersedia.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 3 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light" style="border-radius: 15px;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-pencil" style="font-size: 40px; "></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Isi
                                            Formulir</h5>
                                        <p class="card-text" style="color: #6c757d;">Isi formulir pengajuan surat
                                            sesuai dengan data yang dibutuhkan.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 4 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light" style="border-radius: 15px; ">
                                    <div class="card-body text-center">
                                        <i class="bi bi-check-circle" style="font-size: 40px"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">
                                            Verifikasi Data</h5>
                                        <p class="card-text" style="color: #6c757d;">Verifikasi data yang Anda
                                            masukkan untuk memastikan tidak ada kesalahan.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 5 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light" style="border-radius: 15px; ">
                                    <div class="card-body text-center">
                                        <i class="bi bi-send" style="font-size: 40px;"></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Kirim
                                            Pengajuan</h5>
                                        <p class="card-text" style="color: #6c757d;">Setelah data terverifikasi, kirim
                                            pengajuan Anda untuk diproses.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Langkah 6 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow-sm border-light"
                                    style="border-radius: 15px;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark-check"
                                            style="font-size: 40px; "></i>
                                        <h5 class="card-title mt-3" style="font-size: 18px; font-weight: bold;">Tunggu
                                            Proses</h5>
                                        <p class="card-text" style="color: #6c757d;">Tunggu proses verifikasi dan
                                            persetujuan surat Anda.</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- /Features Section -->

        <!-- Services Section -->
        <section id="waktuPelayanan" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title text-center" data-aos="fade-up">
                <h2>Waktu Pelayanan</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-5 justify-content-center">

                    <!-- Card Senin -->
                    @foreach ($waktuPelayanan as $item)
                        <div class="col-lg-2 col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-body text-center p-4">
                                    <div class="card-icon mb-3">
                                        <i class="bi bi-calendar-day" style="font-size: 2rem; color: #2c3e50;"></i>
                                    </div>
                                    <h5 class="card-title mb-3">{{ $item->hari }}</h5>
                                    <p class="card-text">{{ \Carbon\Carbon::parse($item->jam_buka)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($item->jam_tutup)->format('H:i') }}</p>
                                </div>
                            </div>
                        </div><!-- End Card Senin -->
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Contact Section -->
        <section id="kontak" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Alamat</h3>
                            <p>{{ $profilDesa->alamat }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Nomor Telepon</h3>
                            <p>{{ $profilDesa->kontak }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p>{{ $profilDesa->email }}</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="row gy-4 mt-1">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.600447775756!2d102.0572547!3d1.4157058999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d3e1f6d9ec9a2d%3A0x6baf7ce842b75!2sKantor%20Desa%20Buruk%20Bakul!5e0!3m2!1sid!2sid!4v1762281497318!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div><!-- End Google Maps -->
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Surat Desa</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ $profilDesa->alamat }}</p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>{{ $profilDesa->kontak }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $profilDesa->email }}</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-facebook"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="#beranda" class="active">Beranda</a></li>
                        <li><a href="#surat">Layanan Surat</a></li>
                        <li><a href="#prosedur">Prosedur Pengajuan</a></li>
                        <li><a href="#waktuPelayanan">Waktu Pelayanan</a></li>
                        <li><a href="#kontak">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="#">Selvi</a> Jurusan <a href="#">Rekayasa Perangkat Lunak |<strong
                        class="px-1 sitename">Politeknik Negeri Bengkalis</strong>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/landing-page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/landing-page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/landing-page/assets/js/main.js') }}"></script>

</body>

</html>
