<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOW Kota Tegal | Website Resmi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #fff;
        }

        /* ================= NAVBAR ================= */
        .gow-navbar-wrapper {
            position: fixed;
            top: 16px;
            left: 0;
            width: 100%;
            z-index: 999;
            pointer-events: none;
        }

        .gow-navbar {
            pointer-events: auto;
            max-width: 1100px;
            margin: auto;
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 10px 24px;
        }

        .gow-navbar .nav-link {
            font-weight: 500;
            color: #222;
            margin: 0 6px;
        }

        .gow-navbar .nav-link:hover {
            color: #ff7f00;
        }

        /* FONT KHUSUS NAVBAR */
        .gow-navbar .nav-link {
            font-family: 'Inter', sans-serif;
            font-weight: 530;
            /* paling pas buat menu */
        }

        /* MOBILE NAVBAR FINAL */
        @media (max-width: 768px) {
            .brand-text {
                display: none;
            }

            .gow-navbar {
                border-radius: 12px;
                /* gak terlalu bulet */
                padding: 8px 16px;
            }
        }


        /* ================= HERO ================= */
        .hero {
            position: relative;
            background: linear-gradient(120deg,
                    rgba(255, 127, 0, 0.98),
                    rgba(255, 167, 38, 0.95));
            overflow: hidden;

            min-height: unset;
            padding-top: 160px;
            padding-bottom: 110px;
        }

        /* FULL HERO IMAGE + OVERLAY */
        .hero::before {
            content: "";
            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(rgba(0, 0, 0, 0.45),
                    /* ⬅️ overlay gelap */
                    rgba(0, 0, 0, 0.45)),
                url("<?= base_url('assets/img/banner.webp') ?>");

            background-size: cover;
            background-repeat: no-repeat;
            background-position: 70% 40%;
            /* ⬅️ crop / geser gambar */

            z-index: 0;
        }

        /* Biar konten di atas gambar */
        .hero>* {
            position: relative;
            z-index: 2;
        }

        /* Desktop besar */
        @media (min-width: 1200px) {
            .hero {
                padding-top: 150px;
                padding-bottom: 100px;
            }
        }

        /* Tablet */
        @media (max-width: 991px) {
            .hero {
                padding-top: 140px;
                padding-bottom: 90px;
            }
        }

        /* ================= HERO TEXT ================= */
        .hero-content {
            margin-top: -60px;
            color: #fff;
            max-width: 600px;
        }

        .hero small {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            opacity: .95;
            text-shadow: 0 2px 6px rgba(0, 0, 0, .45);
        }

        .hero h1 {
            font-size: clamp(2.2rem, 4vw, 3.5rem);
            font-weight: 900;
            line-height: 1.1;
            text-shadow: 0 4px 14px rgba(0, 0, 0, .35);
        }

        .hero h1 span {
            color: #ffd600;
            text-shadow: 0 4px 14px rgba(0, 0, 0, .55);
        }

        .hero p {
            font-size: 1.05rem;
            opacity: .98;
            text-shadow: 0 2px 8px rgba(0, 0, 0, .5);
        }

        .btn-hero {
            background: #ffd600;
            color: #000;
            border-radius: 50px;
            padding: 12px 28px;
            font-weight: 600;
            border: none;
        }

        /* ================= HERO IMAGE ================= */
        .hero-image img {
            max-height: 480px;
        }

        /* ================= HERO WAVE ================= */
        .hero::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 120px;
            background: #fff;
            clip-path: ellipse(70% 100% at 50% 100%);
            z-index: 3;
            /* ⬅️ wave paling atas */
        }

        /* ================= FIX TAMPILAN HERO MOBILE (WAJIB) ================= */
        @media (max-width: 768px) {

            /* 1. Tambah jarak atas hero biar turun ke bawah menjauhi navbar */
            .hero {
                /* Ditambah jadi 170px biar ga ketutup navbar */
                padding-top: 170px !important;
                padding-bottom: 60px;
            }

            /* 2. Mobile Background lebih gelap */
            .hero::before {
                background-image:
                    linear-gradient(rgba(0, 0, 0, 0.55),
                        rgba(0, 0, 0, 0.55)),
                    url("<?= base_url('assets/img/banner.webp') ?>");
            }

            /* 3. Hapus margin negative yang bikin teks ketarik ke atas */
            .hero-content {
                margin-top: 0 !important;
                /* Reset margin jadi normal */
                padding-bottom: 40px;
                /* Kasih jarak antara teks dan foto */
            }

            /* 4. Pastikan teks rata kiri & ukurannya pas */
            .hero h1 {
                font-size: 2.2rem;
                /* Ukuran font judul di HP */
            }

            .hero small {
                display: block;
                margin-bottom: 10px;
                font-size: 0.9rem;
            }
        }

        /* ================= HERO SHAPE OVERLAY (FIX DESKTOP) ================= */
        .hero-shape-bg {
            position: absolute;

            /* 1. PAKU DARI ATAS */
            top: -50%;

            /* 2. GESER KE KANAN (Desktop Fix) */
            /* Jangan 50%, tapi coba 65% atau 70% biar ngepas sama gambar yg rata kanan */
            left: 65%;
            transform: translateX(-60%);

            /* 3. TINGGI */
            height: 160%;

            /* Ukuran */
            width: 70%;
            max-width: 420px;

            /* Warna */
            background: linear-gradient(180deg, rgba(255, 100, 0, 0.5) 0%, rgba(255, 60, 0, 0.2) 100%);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);

            /* Rounded */
            border-radius: 30px 30px 200px 200px;

            z-index: 1;
            pointer-events: none;
        }

        /* Responsif HP (Balikin ke Tengah) */
        @media (max-width: 991px) {
            .hero-shape-bg {
                /* Di HP harus balik ke 50% karena gambar biasanya rata tengah di HP */
                left: 55%;

                width: 85%;
                max-width: 400px;
                height: 110%;
                top: -5%;
                border-radius: 20px 20px 100px 100px;
            }
        }

        /* ================= STATS ================= */
        .stats {
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);

            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);

            padding: 28px 36px;
            max-width: 750px;

            margin-top: -150px;
            margin-left: 0;
            /* ⬅️ FIX: nempel kiri */
            margin-right: auto;
            /* ⬅️ FIX: bukan center */

            position: relative;
            z-index: 3;
        }

        .stat-item {
            padding: 12px 22px;
        }

        .stat-item h2 {
            font-weight: 800;
            color: #ff7f00;
            margin-bottom: 4px;
        }

        .stat-item span {
            font-size: .85rem;
            font-weight: 600;
            letter-spacing: .5px;
            color: #222;
        }

        /* ================= MOBILE ================= */
        @media (max-width: 768px) {
            .stats {
                max-width: 100%;
                margin-top: -60px;
                /* ⬅️ turun biar aman di HP */
                padding: 20px;
            }
        }

        /* ================= CARD ================= */
        .card {
            border: none;
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .gow-navbar {
                border-radius: 24px;
            }

            .stats {
                margin-top: -60px;
                padding: 20px;
            }

            .hero-image {
                margin-top: 40px;
                text-align: center !important;
            }
        }

        /* ================= SAMBUTAN KETUA (COMPACT VERSION) ================= */
        .sambutan-section {
            background-color: #fffaf5;
            /* Padding dikecilkan biar ga terlalu makan tempat */
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .sambutan-img-wrapper {
            position: relative;
            z-index: 1;
            display: inline-block;
            width: 100%;
            /* Lebar foto dikecilkan (sebelumnya 380px) */
            max-width: 300px;
        }

        /* Latar belakang bentuk lonjong di belakang foto */
        .sambutan-img-wrapper::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 0;
            width: 100%;
            height: 95%;
            background: linear-gradient(180deg, rgba(255, 127, 0, 0.1) 0%, rgba(255, 167, 38, 0.3) 100%);
            /* Radius disesuaikan dengan lebar baru (150px = setengah dari 300px) */
            border-radius: 150px 150px 20px 20px;
            z-index: -1;
        }

        .sambutan-img {
            width: 100%;
            height: auto;
            /* Radius disesuaikan dengan lebar baru */
            border-radius: 150px 150px 20px 20px;
            border-bottom: 4px solid #ff7f00;
            /* Garis sedikit ditipiskan */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .sambutan-content h2 {
            font-weight: 400;
            color: #333;
            margin-bottom: 0;
            text-transform: uppercase;
            /* Font size dikecilkan (sebelumnya 1.8rem) */
            font-size: 1.4rem;
        }

        .sambutan-content h3 {
            font-weight: 800;
            color: #880e4f;
            /* Font size dikecilkan (sebelumnya 2rem) */
            font-size: 1.7rem;
            margin-bottom: 15px;
            /* Margin dikurangi */
        }

        .sambutan-text {
            color: #555;
            line-height: 1.6;
            /* Spasi baris sedikit dirapatkan */
            font-size: 0.95rem;
            /* Font size dikecilkan sedikit */
            margin-bottom: 20px;
            text-align: justify;
        }

        .sambutan-name {
            font-weight: 800;
            color: #880e4f;
            font-size: 1.1rem;
            /* Font size dikecilkan */
            margin-bottom: 2px;
        }

        .sambutan-jabatan {
            font-size: 0.85rem;
            text-transform: uppercase;
            color: #777;
            letter-spacing: 1px;
            border-top: 1px solid #ddd;
            padding-top: 8px;
            display: inline-block;
        }

        /* ================= RESPONSIVE SAMBUTAN (MOBILE) ================= */
        @media (max-width: 768px) {

            /* 1. Kecilkan padding section biar ga terlalu boros tempat di HP */
            .sambutan-section {
                padding-top: 30px;
                padding-bottom: 30px;
            }

            /* 2. Ubah ukuran wrapper foto jadi lebih kecil */
            .sambutan-img-wrapper {
                max-width: 200px;
                /* Ukuran di HP (Desktopnya 300px) */

                /* Pastikan rata kiri, reset margin auto jika ada */
                margin-left: 0;
                margin-right: auto;
            }

            /* 3. Sesuaikan lengkungan background & border dengan ukuran baru */
            .sambutan-img-wrapper::before,
            .sambutan-img {
                /* Radiusnya setengah dari max-width (200px / 2 = 100px) */
                border-radius: 100px 100px 15px 15px;
            }

            /* (Opsional) Kecilkan sedikit font judul di HP biar proporsional */
            .sambutan-content h3 {
                font-size: 1.5rem;
            }
        }

        /* ================= PARTNER LOGO CAROUSEL ================= */
        .partner-section {
            padding: 60px 0;
            background: #fff;
            /* Latar putih bersih */
            border-bottom: 1px solid #eee;
        }

        .partner-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .partner-title h3 {
            font-weight: 700;
            color: #333;
        }

        /* Container Swiper */
        .logo-swiper {
            width: 100%;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        /* Styling per item slide */
        .logo-swiper .swiper-slide {
            /* Mengatur agar logo di tengah vertikal/horizontal */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            /* Tinggi area logo tetap */
        }

        /* Styling Gambar Logo */
        .logo-item img {
            max-width: 100%;
            max-height: 80px;
            /* Batasi tinggi maksimal logo agar seragam */
            width: auto;
            height: auto;
            object-fit: contain;
            /* Agar gambar tidak gepeng */

            /* --- PERUBAHAN DI SINI: GRAYSCALE & OPACITY DIHAPUS --- */
            /* filter: grayscale(100%); */
            /* opacity: 0.7; */

            transition: all 0.3s ease;
            cursor: pointer;
        }

        /* Efek saat hover: Sedikit membesar saja */
        .logo-item img:hover {
            transform: scale(1.1);
        }

        /* CSS KHUSUS AGAR JALANNYA MULUS (LINEAR) */
        .logo-swiper .swiper-wrapper {
            transition-timing-function: linear;
        }

        /* ================= ANIMASI GAMBAR MUNCUL DARI BAWAH ================= */
        /* 1. Bikin Keyframenya dulu */
        @keyframes slideUpFade {
            0% {
                opacity: 0;
                /* Awalnya transparan */
                transform: translateY(150px);
                /* Posisi awal: Turun 150px ke bawah */
            }

            100% {
                opacity: 1;
                /* Muncul penuh */
                transform: translateY(0);
                /* Kembali ke posisi normal */
            }
        }

        /* 2. Bikin Class untuk ditempel ke gambar */
        .hero-animate-img {
            /* Panggil animasi 'slideUpFade', durasi 1.2 detik, gerakan mulus (ease-out) */
            animation: slideUpFade 1.2s ease-out forwards;
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <section class="hero">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6 hero-content">
                    <small>Gabungan Organisasi Wanita</small>
                    <h1 class="my-3">
                        Generasi Emas<br><span>Kota Tegal</span>
                    </h1>
                    <p>
                        Wadah koordinasi organisasi wanita dalam mendukung pembangunan dan
                        pemberdayaan perempuan di Kota Tegal.
                    </p>
                    <a href="<?= base_url('profil') ?>" class="btn btn-hero mt-3">
                        Selengkapnya →
                    </a>
                </div>

                <div class="col-md-6 hero-image text-md-end text-center position-relative">

                    <div class="hero-shape-bg"></div>

                    <img src="<?= base_url('assets/img/banner2.png') ?>" class="img-fluid hero-animate-img"
                        loading="lazy" alt="Hero GOW" style="position: relative; z-index: 2;">

                </div>
            </div>
    </section>

    <section class="container-fluid px-0">
        <div class="container">
            <div class="stats row">

                <div class="col-md col-6 stat-item">
                    <h2 class="count-up" data-count="29">0+</h2>
                    <span>ORGANISASI</span>
                </div>

                <div class="col-md col-6 stat-item">
                    <h2 class="count-up" data-count="500">0+</h2>
                    <span>CABANG</span>
                </div>

                <div class="col-md col-6 stat-item">
                    <h2 class="count-up" data-count="100">0+</h2>
                    <span>ANGGOTA</span>
                </div>

            </div>
    </section>

    <section class="sambutan-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-5 text-start text-md-center mb-4 mb-md-0">
                    <div class="sambutan-img-wrapper">
                        <img src="<?= base_url('assets/img/ketua-umum.webp') ?>" class="sambutan-img"
                            alt="Ketua Umum GOW">
                    </div>
                </div>

                <div class="col-md-7 sambutan-content ps-md-5">
                    <h2>Sambutan Ketua Umum</h2>
                    <h3>GOW Kota Tegal</h3>

                    <div class="sambutan-text">
                        <p>
                            Alhamdulillah segala puji bagi Allah SWT atas rahmat-Nya Gabungan Organisasi Wanita (GOW)
                            Kota Tegal dapat terus hadir membawa semangat untuk kemajuan pembangunan dan pemberdayaan
                            perempuan di Kota Tegal.
                        </p>
                        <p>
                            Melalui peluncuran pembaharuan website ini, kami berharap sinergitas antar organisasi wanita
                            semakin kuat,
                            mandiri, dan akuntabel. Semoga media ini dapat menjadi sarana informasi dan edukasi yang
                            bermanfaat bagi seluruh anggota maupun masyarakat luas.
                        </p>
                    </div>

                    <div class="mt-4">
                        <div class="sambutan-name">Ny. Debby Firoeza Indiany </div>
                        <div class="sambutan-jabatan">Ketua Umum GOW Kota Tegal Periode 2025-2030</div>
                    </div>
                </div>

            </div>
        </div>
    </section>>

    <section class="partner-section">
        <div class="container">
            <div class="partner-title">
                <h3>Organisasi Anggota & Mitra </h3>
                <p class="text-muted">Bersinergi membangun Kota Tegal</p>
            </div>

            <div class="swiper logo-swiper">
                <div class="swiper-wrapper align-items-center">

                    <div class="swiper-slide">
                        <div class="logo-item">
                            <img src="<?= base_url('assets/img/hwk.png') ?>" alt="Logo Partner 1">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item">
                            <img src="<?= base_url('assets/img/iwapi.png') ?>" alt="Logo Partner 2">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item">
                            <img src="<?= base_url('assets/img/muslimat-nu.png') ?>" alt="Logo Partner 3">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item">
                            <img src="<?= base_url('assets/img/wis.png') ?>" alt="Logo Partner 4">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item">
                            <img src="<?= base_url('assets/img/ibi.png') ?>" alt="Logo Partner 5">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item">
                            <img src="https://via.placeholder.com/150x80/eee/999?text=IBI+Cabang" alt="Logo Partner 6">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="logo-item">
                            <img src="https://via.placeholder.com/150x80/eee/999?text=Salimah" alt="Logo Partner 7">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="py-5 mt-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Berita & Informasi Terkini</h3>
                <a href="<?= base_url('berita') ?>" class="btn btn-sm btn-outline-warning">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                <?php foreach ($latestPosts as $post): ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top"
                                style="height:220px;object-fit:cover;">
                            <div class="card-body">
                                <h5><?= htmlspecialchars($post['title']) ?></h5>
                                <p class="text-muted">
                                    <?= htmlspecialchars(mb_substr(strip_tags($post['content']), 0, 120)) ?>…
                                </p>
                                <a href="<?= base_url('berita/' . $post['slug']) ?>" class="btn btn-sm btn-outline-warning">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>



    <?php include __DIR__ . '/partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // ====================== 1. LOGIC STATS COUNTER ======================
            const counters = document.querySelectorAll(".count-up");
            const duration = 1500; // durasi animasi (ms)

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute("data-count"), 10);
                let startTime = null;

                function animateCount(timestamp) {
                    if (!startTime) startTime = timestamp;

                    const progress = Math.min((timestamp - startTime) / duration, 1);
                    const current = Math.floor(progress * target);

                    counter.innerText = current + "+";

                    if (progress < 1) {
                        requestAnimationFrame(animateCount);
                    } else {
                        counter.innerText = target + "+";
                    }
                }

                requestAnimationFrame(animateCount);
            });


            // ====================== 2. LOGIC SWIPER LOGO (CONTINUOUS) ======================
            var swiperLogo = new Swiper(".logo-swiper", {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                grabCursor: true,

                // KUNCI 1: Speed lambat (makin besar angka, makin pelan & mulus)
                speed: 4000,

                // KUNCI 2: Autoplay tanpa jeda
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true, // Kalau mouse nempel, dia berhenti sebentar (opsional)
                },

                breakpoints: {
                    576: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 50,
                    },
                    1200: {
                        slidesPerView: 6,
                        spaceBetween: 60,
                    }
                }
            });

        });
    </script>

</body>

</html>