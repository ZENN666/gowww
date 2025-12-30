<?php
$title = 'Tentang GOW | Visi & Misi';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        /* --- PERBAIKAN: SCROLL FIX --- */
        html {
            scroll-behavior: smooth;
            /* Biar scrollnya meluncur halus */
        }

        /* Ini kuncinya: Memberi jarak virtual di atas section saat di-link */
        #visi-misi,
        #struktur {
            scroll-margin-top: 120px;
            /* Sesuaikan dengan tinggi navbar + jarak aman */
        }

        /* ----------------------------- */

        /* Style Khusus Halaman About */
        .visi-box {
            background-color: #fff8f0;
            border-left: 5px solid #ff7f00;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .misi-list .misi-item {
            display: flex;
            margin-bottom: 20px;
            align-items: flex-start;
        }

        .misi-icon {
            min-width: 40px;
            height: 40px;
            background-color: #ff7f00;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            margin-top: 5px;
            font-size: 1.2rem;
        }

        .about-img {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            object-fit: cover;
            height: 100%;
            min-height: 500px;
        }

        .org-card {
            transition: transform 0.3s;
            border: none;
            background: white;
            border-radius: 12px;
        }

        .org-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .org-img-wrapper {
            width: 110px;
            height: 110px;
            margin: 0 auto;
            padding: 4px;
            border: 2px solid #ff7f00;
            border-radius: 50%;
        }

        .org-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .org-role {
            font-size: 0.85rem;
            color: #ff7f00;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .org-name {
            font-weight: 700;
            font-size: 1rem;
            color: #333;
            margin-bottom: 0;
        }
    </style>
</head>

<body class="bg-white">

    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <div class="bg-light py-5" style="margin-top: 100px;">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bold display-5">Tentang GOW</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"
                                class="text-decoration-none text-muted">Beranda</a></li>
                        <li class="breadcrumb-item active text-warning" aria-current="page">Visi & Misi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="visi-misi" class="py-4 bg-white">
        <div class="container py-lg-3">
            <div class="row g-4 align-items-start">

                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="sticky-lg-top" style="top: 100px; z-index: 1;">
                        <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Tentang GOW"
                            class="img-fluid w-100 about-img shadow-sm" style="max-height: 450px; object-fit: cover;">
                    </div>
                </div>

                <div class="col-lg-7">

                    <div class="mb-4">
                        <h5 class="fw-bold text-uppercase text-warning mb-2" style="font-size: 1rem;">
                            <i class="bi bi-eye me-2"></i> Visi Kami
                        </h5>
                        <div class="visi-box shadow-sm p-3 mb-0" style="border-left-width: 4px;">
                            <p class="fw-medium fst-italic text-dark mb-0"
                                style="line-height: 1.6; font-size: 1.05rem;">
                                "Terwujudnya perempuan Indonesia yang berkualitas, berdaya saing, bermartabat, dan
                                berperan aktif dalam pembangunan nasional menuju keluarga sejahtera dan masyarakat
                                madani."
                            </p>
                        </div>
                    </div>

                    <div>
                        <h5 class="fw-bold text-uppercase text-warning mb-3" style="font-size: 1rem;">
                            <i class="bi bi-bullseye me-2"></i> Misi Kami
                        </h5>

                        <div class="misi-list">

                            <div class="misi-item mb-3">
                                <div class="misi-icon shadow-sm"
                                    style="width: 32px; height: 32px; min-width: 32px; font-size: 0.9rem; margin-right: 12px;">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Pemberdayaan
                                        Perempuan</h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.4;">Meningkatkan kapasitas
                                        perempuan di bidang ekonomi, sosial, dan politik melalui pelatihan keterampilan,
                                        pengembangan UMKM, dan advokasi.</p>
                                </div>
                            </div>

                            <div class="misi-item mb-3">
                                <div class="misi-icon shadow-sm"
                                    style="width: 32px; height: 32px; min-width: 32px; font-size: 0.9rem; margin-right: 12px;">
                                    <i class="bi bi-gender-ambiguous"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Kesetaraan & Keadilan
                                        Gender</h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.4;">Memperjuangkan peran
                                        perempuan sebagai pengambil keputusan di berbagai lembaga (eksekutif,
                                        legislatif, yudikatif).</p>
                                </div>
                            </div>

                            <div class="misi-item mb-3">
                                <div class="misi-icon shadow-sm"
                                    style="width: 32px; height: 32px; min-width: 32px; font-size: 0.9rem; margin-right: 12px;">
                                    <i class="bi bi-heart-pulse-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Kesejahteraan
                                        Keluarga & Masyarakat</h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.4;">Meningkatkan kepedulian
                                        terhadap pendidikan, kesehatan, perlindungan anak, penanganan kekerasan
                                        perempuan, serta pembinaan moral dan agama.</p>
                                </div>
                            </div>

                            <div class="misi-item mb-3">
                                <div class="misi-icon shadow-sm"
                                    style="width: 32px; height: 32px; min-width: 32px; font-size: 0.9rem; margin-right: 12px;">
                                    <i class="bi bi-building-fill-check"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Penguatan Kelembagaan
                                    </h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.4;">Mengkoordinir dan
                                        menguatkan seluruh organisasi wanita di wilayahnya, membangun jaringan
                                        komunikasi, dan kerjasama dengan berbagai pihak.</p>
                                </div>
                            </div>

                            <div class="misi-item mb-0">
                                <div class="misi-icon shadow-sm"
                                    style="width: 32px; height: 32px; min-width: 32px; font-size: 0.9rem; margin-right: 12px;">
                                    <i class="bi bi-diagram-3-fill"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 0.95rem;">Peran Strategis</h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.4;">Menjadi kontrol sosial
                                        dan mitra pemerintah dalam mensukseskan program pembangunan daerah, tanpa
                                        terlibat politik praktis.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="struktur" class="py-5 bg-light">
        <div class="container py-4">

            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark text-uppercase display-5">Struktur Organisasi</h2>
                <p class="text-muted fs-5">Pengurus GOW Kota Tegal Periode 2025-2030</p>
                <hr class="mx-auto" style="width: 80px; border: 3px solid #ff7f00; opacity: 1;">
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card org-card h-100 py-4 text-center shadow-sm">
                        <div class="org-img-wrapper mb-3">
                            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Ketua" class="org-img">
                        </div>
                        <div class="card-body p-0 px-2">
                            <h5 class="org-name">Hj. Nama Ketua</h5>
                            <span class="org-role">Ketua Umum</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4 g-3">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card org-card h-100 py-4 text-center shadow-sm">
                        <div class="org-img-wrapper mb-3">
                            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Wakil 1" class="org-img">
                        </div>
                        <div class="card-body p-0 px-2">
                            <h5 class="org-name">Ny. Wakil Satu</h5>
                            <span class="org-role">Wakil Ketua I</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card org-card h-100 py-4 text-center shadow-sm">
                        <div class="org-img-wrapper mb-3">
                            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Wakil 2" class="org-img">
                        </div>
                        <div class="card-body p-0 px-2">
                            <h5 class="org-name">Ny. Wakil Dua</h5>
                            <span class="org-role">Wakil Ketua II</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center g-3">

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="card org-card h-100 py-4 text-center shadow-sm">
                        <div class="org-img-wrapper mb-3" style="width: 90px; height: 90px;">
                            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Sekretaris 1" class="org-img">
                        </div>
                        <div class="card-body p-0 px-2">
                            <h6 class="org-name" style="font-size: 0.9rem;">Ny. Sekretaris 1</h6>
                            <span class="org-role" style="font-size: 0.7rem;">Sekretaris I</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="card org-card h-100 py-4 text-center shadow-sm">
                        <div class="org-img-wrapper mb-3" style="width: 90px; height: 90px;">
                            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Sekretaris 2" class="org-img">
                        </div>
                        <div class="card-body p-0 px-2">
                            <h6 class="org-name" style="font-size: 0.9rem;">Ny. Sekretaris 2</h6>
                            <span class="org-role" style="font-size: 0.7rem;">Sekretaris II</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="card org-card h-100 py-4 text-center shadow-sm">
                        <div class="org-img-wrapper mb-3" style="width: 90px; height: 90px;">
                            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Bendahara 1" class="org-img">
                        </div>
                        <div class="card-body p-0 px-2">
                            <h6 class="org-name" style="font-size: 0.9rem;">Ny. Bendahara 1</h6>
                            <span class="org-role" style="font-size: 0.7rem;">Bendahara I</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="card org-card h-100 py-4 text-center shadow-sm">
                        <div class="org-img-wrapper mb-3" style="width: 90px; height: 90px;">
                            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Bendahara 2" class="org-img">
                        </div>
                        <div class="card-body p-0 px-2">
                            <h6 class="org-name" style="font-size: 0.9rem;">Ny. Bendahara 2</h6>
                            <span class="org-role" style="font-size: 0.7rem;">Bendahara II</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>