<?php

class AgendaAdminController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['admin'])) {
            header('Location: ' . base_url('admin/login'));
            exit;
        }
    }

    // ================= LIST AGENDA =================
    public function index()
    {
        global $pdo;

        // Urutkan berdasarkan tanggal kegiatan terbaru (mendatang)
        $stmt = $pdo->query(
            "SELECT * FROM agenda ORDER BY tanggal_mulai DESC, waktu_mulai ASC"
        );

        $agendas = $stmt->fetchAll();

        include __DIR__ . '/../Views/admin/agenda/index.php';
    }

    // ================= FORM TAMBAH =================
    public function create()
    {
        include __DIR__ . '/../Views/admin/agenda/create.php';
    }

    // ================= SIMPAN DATA =================
    public function store()
    {
        global $pdo;

        $judul = trim($_POST['judul']);
        $deskripsi = $_POST['deskripsi'];
        $lokasi = trim($_POST['lokasi']);
        $tanggal_mulai = $_POST['tanggal_mulai'];
        $waktu_mulai = $_POST['waktu_mulai'];

        // Handle field opsional (jika kosong set NULL)
        $tanggal_selesai = !empty($_POST['tanggal_selesai']) ? $_POST['tanggal_selesai'] : null;
        $waktu_selesai = !empty($_POST['waktu_selesai']) ? $_POST['waktu_selesai'] : null;

        // --- GENERATE SLUG (Copy dari Berita) ---
        $slug_base = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
        $slug_base = preg_replace('/-+/', '-', $slug_base);
        $slug = $slug_base;
        $counter = 1;

        while (true) {
            $stmt_check = $pdo->prepare("SELECT id FROM agenda WHERE slug = ?");
            $stmt_check->execute([$slug]);
            if ($stmt_check->rowCount() == 0)
                break;
            $slug = $slug_base . '-' . $counter;
            $counter++;
        }
        // --- END SLUG ---

        // --- UPLOAD GAMBAR ---
        $gambar = null;
        if (!empty($_FILES['gambar']['name'])) {
            $filename = time() . '_agn_' . $_FILES['gambar']['name'];
            $target = __DIR__ . '/../../public/uploads/' . $filename;
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
                $gambar = $filename;
            }
        }

        $stmt = $pdo->prepare(
            "INSERT INTO agenda 
            (judul, slug, deskripsi, lokasi, tanggal_mulai, tanggal_selesai, waktu_mulai, waktu_selesai, gambar, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())"
        );

        $stmt->execute([
            $judul,
            $slug,
            $deskripsi,
            $lokasi,
            $tanggal_mulai,
            $tanggal_selesai,
            $waktu_mulai,
            $waktu_selesai,
            $gambar
        ]);

        header('Location: ' . base_url('admin/agenda'));
        exit;
    }

    // ================= FORM EDIT =================
    public function edit(string $slug)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM agenda WHERE slug = ?");
        $stmt->execute([$slug]);
        $agenda = $stmt->fetch();

        if (!$agenda) {
            echo 'Agenda tidak ditemukan';
            exit;
        }

        include __DIR__ . '/../Views/admin/agenda/edit.php';
    }

    // ================= UPDATE DATA =================
    public function update(string $slug)
    {
        global $pdo;

        $judul = trim($_POST['judul']);
        $deskripsi = $_POST['deskripsi'];
        $lokasi = trim($_POST['lokasi']);
        $tanggal_mulai = $_POST['tanggal_mulai'];
        $waktu_mulai = $_POST['waktu_mulai'];
        $tanggal_selesai = !empty($_POST['tanggal_selesai']) ? $_POST['tanggal_selesai'] : null;
        $waktu_selesai = !empty($_POST['waktu_selesai']) ? $_POST['waktu_selesai'] : null;

        // Cek Upload Gambar Baru
        if (!empty($_FILES['gambar']['name'])) {
            $filename = time() . '_agn_' . $_FILES['gambar']['name'];
            $target = __DIR__ . '/../../public/uploads/' . $filename;
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

            $stmt = $pdo->prepare(
                "UPDATE agenda SET 
                 judul=?, deskripsi=?, lokasi=?, tanggal_mulai=?, tanggal_selesai=?, waktu_mulai=?, waktu_selesai=?, gambar=?
                 WHERE slug=?"
            );
            $stmt->execute([$judul, $deskripsi, $lokasi, $tanggal_mulai, $tanggal_selesai, $waktu_mulai, $waktu_selesai, $filename, $slug]);
        } else {
            // Update tanpa ganti gambar
            $stmt = $pdo->prepare(
                "UPDATE agenda SET 
                 judul=?, deskripsi=?, lokasi=?, tanggal_mulai=?, tanggal_selesai=?, waktu_mulai=?, waktu_selesai=?
                 WHERE slug=?"
            );
            $stmt->execute([$judul, $deskripsi, $lokasi, $tanggal_mulai, $tanggal_selesai, $waktu_mulai, $waktu_selesai, $slug]);
        }

        header('Location: ' . base_url('admin/agenda'));
        exit;
    }

    // ================= HAPUS =================
    public function delete(string $slug)
    {
        global $pdo;
        // Opsional: Hapus file gambar fisik dulu jika perlu
        $stmt = $pdo->prepare("DELETE FROM agenda WHERE slug = ?");
        $stmt->execute([$slug]);
        header('Location: ' . base_url('admin/agenda'));
        exit;
    }
}