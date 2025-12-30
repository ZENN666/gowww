<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Agenda Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { background-color: #f5f6fa; }
        .app-bar { background-color: #ff7f00; color: #fff; padding: 16px 24px; margin-bottom: 20px; }
        .app-bar h4 { margin: 0; font-weight: 600; }
        .card { border: none; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); }
        .table th { background-color: #f8f9fc; font-weight: 600; }
        .btn-icon { padding: .25rem .6rem; font-size: .85rem; }
        
        /* Tambahan style untuk link navigasi */
        .nav-link-custom { color: rgba(255,255,255, 0.8); text-decoration: none; margin-right: 20px; font-weight: 500; transition: 0.3s; }
        .nav-link-custom:hover, .nav-link-custom.active { color: #fff; text-shadow: 0 0 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    
    <div class="app-bar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <h4 class="mb-0 me-4">Admin Panel</h4>
            <nav class="d-none d-md-block">
                <a href="<?= base_url('admin/berita') ?>" class="nav-link-custom">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
                <a href="<?= base_url('admin/agenda') ?>" class="nav-link-custom active">
                    <i class="bi bi-calendar-event"></i> Agenda
                </a>
            </nav>
        </div>
        <a href="<?= base_url('admin/logout') ?>" class="btn btn-sm btn-light text-danger fw-bold">
            Logout <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>

    <div class="container-fluid px-4 pb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Daftar Agenda</h5>
            <a href="<?= base_url('admin/agenda/create') ?>" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Agenda
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kegiatan</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($agendas)): ?>
                            <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada agenda kegiatan</td></tr>
                        <?php endif; ?>

                        <?php foreach ($agendas as $i => $agn): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td>
                                    <strong><?= htmlspecialchars($agn['judul']) ?></strong><br>
                                    <?php if($agn['gambar']): ?>
                                        <small class="text-primary"><i class="bi bi-image"></i> Ada Gambar</small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= tanggal_indonesia($agn['tanggal_mulai']) ?><br>
                                    <small class="text-muted">
                                        <?= date('H:i', strtotime($agn['waktu_mulai'])) ?> WIB
                                    </small>
                                </td>
                                <td><?= htmlspecialchars($agn['lokasi']) ?></td>
                                <td>
                                    <a href="<?= base_url('admin/agenda/edit/' . $agn['slug']) ?>" class="btn btn-sm btn-primary btn-icon">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="<?= base_url('admin/agenda/delete/' . $agn['slug']) ?>" method="POST" style="display:inline" onsubmit="return confirm('Hapus agenda ini?')">
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