<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Berita | Admin GOW</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f5f6fa;
            overflow-x: hidden;
        }

        /* --- SIDEBAR STYLE --- */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            background-color: #2c3e50;
            color: #fff;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #1a252f;
            border-bottom: 1px solid #34495e;
        }

        .sidebar .nav-pills .nav-link {
            color: #b0b8c1;
            padding: 12px 20px;
            margin-bottom: 5px;
            font-weight: 500;
            border-radius: 0;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-pills .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .sidebar .nav-pills .nav-link.active {
            background-color: rgba(255, 127, 0, 0.1);
            color: #ff7f00;
            border-left-color: #ff7f00;
        }

        .sidebar .nav-pills .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .top-header {
            background: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* --- RESPONSIVE MOBILE --- */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.active {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .overlay {
                display: none;
                position: fixed;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.5);
                z-index: 900;
                top: 0;
                left: 0;
            }

            .overlay.active {
                display: block;
            }
        }
    </style>
</head>

<body>

    <div class="overlay" id="overlay"></div>

    <?php include __DIR__ . '/../../partials/sidebar.php'; ?>

    <div class="main-content">

        <div class="top-header">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-md-none me-3" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5 class="m-0 fw-bold text-dark">Berita</h5>
            </div>
            <div class="d-none d-md-block">
                <span class="text-muted small">Selamat Datang, Admin</span>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 fw-bold">Daftar Berita</h6>
                <a href="<?= base_url('admin/berita/create') ?>" class="btn btn-sm btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4" style="width:5%">#</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // --- LOGIKA SORTIR: TERBARU KE TERLAMA ---
                            if (!empty($posts)) {
                                usort($posts, function ($a, $b) {
                                    return strtotime($b['created_at']) - strtotime($a['created_at']);
                                });
                            }
                            ?>

                            <?php if (empty($posts)): ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                        Belum ada berita
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php foreach ($posts as $i => $post): ?>
                                <tr>
                                    <td class="ps-4"><?= $i + 1 ?></td>
                                    <td>
                                        <span class="fw-semibold text-dark"><?= htmlspecialchars($post['title']) ?></span>
                                    </td>
                                    <td><?= htmlspecialchars($post['author'] ?? 'Admin') ?></td>
                                    <td>
                                        <?= date('d M Y', strtotime($post['created_at'])) ?>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="<?= base_url('admin/berita/edit/' . $post['slug']) ?>"
                                            class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="<?= base_url('admin/berita/delete/' . $post['slug']) ?>" method="POST"
                                            style="display:inline-block"
                                            onsubmit="return confirm('Yakin hapus berita ini?')">
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
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

    </div>

    <script>
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                if (sidebar) {
                    sidebar.classList.toggle('active');
                    overlay.classList.toggle('active');
                }
            });

            overlay.addEventListener('click', () => {
                if (sidebar) sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });
        }
    </script>
</body>

</html>