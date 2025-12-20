<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="card border-0 shadow-lg rounded-4">

                    <!-- Card Header -->
                    <div class="card-header text-white text-center rounded-top-4"
                        style="background: linear-gradient(135deg, #0d6efd, #0b5ed7);">
                        <h3 class="mb-0 fw-semibold">
                            <i class="bi bi-newspaper"></i> Tambah Berita
                        </h3>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4 p-md-5 bg-white">
                        <form method="POST" action="<?= BASE_PATH ?>/admin/berita/store" enctype="multipart/form-data">

                            <!-- Judul -->
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Judul Berita" required>
                                <label for="title">Judul Berita</label>
                            </div>

                            <!-- Penulis -->
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="author" name="author" placeholder="Penulis"
                                    required>
                                <label for="author">Penulis</label>
                            </div>

                            <!-- Thumbnail -->
                            <div class="mb-4">
                                <label for="thumbnail" class="form-label fw-semibold">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                <small class="text-muted">JPG / PNG, max 2MB</small>
                            </div>

                            <!-- Isi -->
                            <div class="mb-5">
                                <label for="content" class="form-label fw-semibold">Isi Berita</label>
                                <textarea class="form-control" id="content" name="content" rows="10"
                                    placeholder="Tulis isi berita di sini..." required></textarea>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-success px-4">
                                    <i class="bi bi-save me-1"></i> Simpan Berita
                                </button>
                                <a href="<?= BASE_PATH ?>/admin/berita" class="btn btn-outline-secondary px-4">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>