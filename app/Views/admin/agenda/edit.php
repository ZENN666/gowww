<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#f5f6fa">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Edit Agenda</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/agenda/update/' . $agenda['slug']) ?>" method="POST"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" class="form-control" required
                            value="<?= htmlspecialchars($agenda['judul']) ?>">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control" required
                                value="<?= $agenda['tanggal_mulai'] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" class="form-control" required
                                value="<?= $agenda['waktu_mulai'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Selesai (Opsional)</label>
                            <input type="date" name="tanggal_selesai" class="form-control"
                                value="<?= $agenda['tanggal_selesai'] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Waktu Selesai (Opsional)</label>
                            <input type="time" name="waktu_selesai" class="form-control"
                                value="<?= $agenda['waktu_selesai'] ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required
                            value="<?= htmlspecialchars($agenda['lokasi']) ?>">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"
                            rows="5"><?= htmlspecialchars($agenda['deskripsi']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Ganti Gambar (Biarkan kosong jika tidak ingin mengubah)</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                        <?php if ($agenda['gambar']): ?>
                            <small class="d-block mt-2">Gambar saat ini: <a
                                    href="<?= base_url('uploads/' . $agenda['gambar']) ?>" target="_blank">Lihat</a></small>
                        <?php endif; ?>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-warning text-white">Update Agenda</button>
                        <a href="<?= base_url('admin/agenda') ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>