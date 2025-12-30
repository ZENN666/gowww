<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang GOW | GOW Kota Tegal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php include 'partials/navbar.php'; ?>

    <div class="container py-5 my-5 text-center">
        <div class="p-5 bg-light rounded-3 border">
            <i class="bi bi-info-circle-fill text-warning display-1 mb-3"></i>
            <h1 class="fw-bold text-dark">Coming Soon</h1>
            <p class="lead text-muted">Halaman ini sedang dalam tahap perbaikan.</p>
            <hr class="my-4">
            <a href="<?= base_url() ?>" class="btn btn-warning text-dark fw-bold">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>