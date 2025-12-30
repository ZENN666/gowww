<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#f5f6fa">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Tambah Agenda Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/agenda/store') ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" class="form-control" required
                            placeholder="Contoh: Rapat Pleno GOW 2025">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Selesai (Opsional)</label>
                            <input type="date" name="tanggal_selesai" class="form-control">
                            <small class="text-muted">Kosongkan jika hanya 1 hari</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Waktu Selesai (Opsional)</label>
                            <input type="time" name="waktu_selesai" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required
                            placeholder="Contoh: Gedung Adipura Balai Kota">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi/Detail Kegiatan</label>
                        <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Flyer/Gambar (Opsional)</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-warning text-white">Simpan Agenda</button>
                        <a href="<?= base_url('admin/agenda') ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>