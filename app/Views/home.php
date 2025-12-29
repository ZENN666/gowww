<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOW Kota Tegal | Website Resmi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">


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

        /* Mobile */
        @media (max-width: 576px) {
            .hero {
                padding-top: 120px;
                padding-bottom: 80px;
            }

            /* Mobile lebih gelap biar kebaca */
            .hero::before {
                background-image:
                    linear-gradient(rgba(0, 0, 0, 0.55),
                        rgba(0, 0, 0, 0.55)),
                    url("<?= base_url('assets/img/banner.webp') ?>");
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
    </style>
</head>

<body>

    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- ================= HERO ================= -->
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

                <div class="col-md-6 hero-image text-md-end text-center">
                    <img src="<?= base_url('assets/img/banner2.png') ?>" class="img-fluid" loading="lazy"
                        alt="Hero GOW">
                </div>

            </div>
        </div>
    </section>

    <!-- ================= STATS ================= -->
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


    <!-- ================= BERITA ================= -->
    <section class="py-5 mt-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Berita Terbaru</h3>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
        });
    </script>


</body>

</html>