<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .app-bar {
            background-color: #ff7f00;
            color: #fff;
            padding: 16px 24px;
            margin-bottom: 20px;
        }

        .app-bar h4 {
            margin: 0;
            font-weight: 600;
        }

        .page-header {
            margin-bottom: 1rem;
        }

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table th {
            background-color: #f8f9fc;
            font-weight: 600;
        }

        .btn-icon {
            padding: .25rem .6rem;
            font-size: .85rem;
        }

        /* Tambahan style untuk link navigasi */
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            margin-right: 20px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: #fff;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="app-bar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <h4 class="mb-0 me-4">Admin Panel</h4>
            <nav class="d-none d-md-block">
                <a href="<?= base_url('admin/berita') ?>" class="nav-link-custom active">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
                <a href="<?= base_url('admin/agenda') ?>" class="nav-link-custom">
                    <i class="bi bi-calendar-event"></i> Agenda
                </a>
            </nav>
        </div>
        <a href="<?= base_url('admin/logout') ?>" class="btn btn-sm btn-light text-danger fw-bold">
            Logout <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>

    <div class="container-fluid px-4 pb-4">

        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kelola Berita</li>
            </ol>
        </nav>

        <div class="page-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Berita</h5>
            <a href="<?= base_url('admin/berita/create') ?>" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Berita
            </a>
        </div>

        <div class="card mt-3">
            <div class="card-body p-0">

                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width:5%">#</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th style="width:15%">Tanggal</th>
                            <th style="width:20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (empty($posts)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada berita
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($posts as $i => $post): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= htmlspecialchars($post['title']) ?></td>
                                <td><?= htmlspecialchars($post['author'] ?? '-') ?></td>
                                <td><?= date('d M Y', strtotime($post['created_at'])) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/berita/edit/' . $post['slug']) ?>"
                                        class="btn btn-sm btn-success btn-icon">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="<?= base_url('admin/berita/delete/' . $post['slug']) ?>" method="POST"
                                        style="display:inline-block" onsubmit="return confirm('Yakin hapus berita ini?')">
                                        <button class="btn btn-sm btn-danger btn-icon">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>