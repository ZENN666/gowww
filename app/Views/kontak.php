<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami | GOW Kota Tegal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        /* CSS Tambahan khusus halaman kontak */
        .contact-box {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            background: rgba(255, 193, 7, 0.1);
            /* Warna kuning transparan */
            color: #ffc107;
            /* Warna kuning */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.5rem;
            margin-right: 15px;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            border: 0;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100" style="background-color: #f8f9fa;">

    <?php include 'partials/navbar.php'; ?>

    <section class="py-5 mt-5 bg-white border-bottom">
        <div class="container text-center">
            <h1 class="fw-bold mb-3">Hubungi Kami</h1>
            <p class="text-muted col-md-8 mx-auto">
                Hubungi kami untuk informasi lebih lanjut mengenai kegiatan, kerjasama,
                atau keanggotaan Gabungan Organisasi Wanita Kota Tegal.
            </p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row g-4">

            <div class="col-lg-5">
                <div class="contact-box">
                    <h4 class="fw-bold mb-4">KANTOR SEKERTARIAT</h4>

                    <div class="d-flex mb-4">
                        <div class="icon-box flex-shrink-0">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Alamat</h6>
                            <p class="text-muted mb-0">
                                Jl. Jalan Betik No. 5, Kelurahan Tegalsari, <br>
                                Kec. Tegal Barat, Kota Tegal, <br>
                                Jawa Tengah 52123
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="icon-box flex-shrink-0">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="text-muted mb-0"> - </p>
                            <small class="text-muted"></small>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="icon-box flex-shrink-0">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Telepon / WhatsApp</h6>
                            <p class="text-muted mb-0">+62 ********</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="icon-box flex-shrink-0">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Jam Operasional</h6>
                            <p class="text-muted mb-0">Senin - Jumat: 08.00 - 16.00 WIB</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7">
                <div class="contact-box p-2">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.201662768466!2d109.12351231477253!3d-6.866407995038096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb7613e515d9d%3A0x6bc4c8b6b10d08b3!2sAlun-Alun%20Kota%20Tegal!5e0!3m2!1sid!2sid!4v1679888888888!5m2!1sid!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include 'partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>