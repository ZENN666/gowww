<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Agenda | Admin GOW</title>
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

        .nav-pills .nav-link {
            color: #b0b8c1;
            padding: 12px 20px;
            margin-bottom: 5px;
            font-weight: 500;
            border-radius: 0;
            border-left: 4px solid transparent;
        }

        .nav-pills .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .nav-pills .nav-link.active {
            background-color: rgba(255, 127, 0, 0.1);
            color: #ff7f00;
            border-left-color: #ff7f00;
        }

        .nav-pills .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        /* --- MAIN CONTENT STYLE --- */
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

    <nav class="sidebar d-flex flex-column" id="sidebar">
        <div class="sidebar-header d-flex align-items-center">
            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Logo" width="40" class="me-2">
            <div>
                <h6 class="m-0 fw-bold">ADMIN PANEL</h6>
                <small style="font-size: 10px; opacity: 0.7;">GOW KOTA TEGAL</small>
            </div>
        </div>

        <div class="flex-grow-1 py-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= base_url('admin/berita') ?>" class="nav-link">
                        <i class="bi bi-newspaper"></i> Kelola Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/agenda') ?>" class="nav-link active">
                        <i class="bi bi-calendar-event"></i> Kelola Agenda
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-3 border-top border-secondary">
            <a href="<?= base_url('admin/logout') ?>"
                class="btn btn-danger w-100 btn-sm d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-left me-2"></i> LOGOUT
            </a>
        </div>
    </nav>

    <div class="main-content">

        <div class="top-header">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-md-none me-3" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5 class="m-0 fw-bold text-dark">Agenda Kegiatan</h5>
            </div>
            <div class="d-none d-md-block">
                <span class="text-muted small">Selamat Datang, Admin</span>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 fw-bold">Daftar Agenda</h6>
                <a href="<?= base_url('admin/agenda/create') ?>" class="btn btn-sm btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Nama Kegiatan</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th class="text-end pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($agendas)): ?>
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>
                                        Belum ada agenda kegiatan
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php foreach ($agendas as $i => $agn): ?>
                                <tr>
                                    <td class="ps-4"><?= $i + 1 ?></td>
                                    <td>
                                        <span class="fw-bold text-dark"><?= htmlspecialchars($agn['judul']) ?></span>
                                        <?php if ($agn['gambar']): ?>
                                            <div class="mt-1">
                                                <span class="badge bg-light text-secondary border">
                                                    <i class="bi bi-image"></i> Gambar
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold"><?= tanggal_indonesia($agn['tanggal_mulai']) ?></span>
                                            <small class="text-muted"><?= date('H:i', strtotime($agn['waktu_mulai'])) ?>
                                                WIB</small>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($agn['lokasi']) ?></td>
                                    <td class="text-end pe-4">
                                        <a href="<?= base_url('admin/agenda/edit/' . $agn['slug']) ?>"
                                            class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="<?= base_url('admin/agenda/delete/' . $agn['slug']) ?>" method="POST"
                                            style="display:inline" onsubmit="return confirm('Hapus agenda ini?')">
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
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
</body>

</html>