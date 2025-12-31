<?php
class BeritaController
{
    public function index()
    {
        global $pdo;

        // 1. Konfigurasi Pagination
        $limit = 9; // Batas berita per halaman
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($page < 1)
            $page = 1;
        $offset = ($page - 1) * $limit;

        // 2. Hitung Total Data (Untuk Pagination)
        $stmtCount = $pdo->query("SELECT COUNT(*) FROM berita");
        $totalBerita = $stmtCount->fetchColumn();
        $totalPages = ceil($totalBerita / $limit);

        // 3. Ambil Data Berita sesuai Halaman
        $stmt = $pdo->prepare(
            "SELECT id, title, author, slug, thumbnail, thumbnail_caption, content, created_at
             FROM berita
             ORDER BY created_at DESC
             LIMIT :limit OFFSET :offset"
        );

        // Bind param harus integer agar LIMIT jalan benar
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll();

        // 4. Cek apakah ini Request AJAX?
        // Jika AJAX, kita cuma kirim JSON berisi HTML berita & Pagination baru
        if (isset($_GET['ajax']) && $_GET['ajax'] == 1) {
            header('Content-Type: application/json');

            // Render HTML Berita (Partial)
            ob_start();
            $this->renderBeritaItems($posts);
            $htmlContent = ob_get_clean();

            // Render HTML Pagination (Partial)
            ob_start();
            $this->renderPagination($page, $totalPages);
            $htmlPagination = ob_get_clean();

            echo json_encode([
                'status' => 'success',
                'html_content' => $htmlContent,
                'html_pagination' => $htmlPagination,
                'current_page' => $page,
                'new_url' => base_url("berita?page=$page") // URL untuk di-push ke browser
            ]);
            exit;
        }

        // 5. Jika Request Biasa (Full Page Load)
        $title = 'Berita - GOW Kota Tegal';
        include __DIR__ . '/../Views/berita/index.php';
    }

    // Helper untuk render item berita (Supaya tidak duplikat kode)
    private function renderBeritaItems($posts)
    {
        if (empty($posts)) {
            echo '<div class="col-12 text-center py-5"><p class="text-muted fs-5">Tidak ada berita di halaman ini.</p></div>';
            return;
        }

        foreach ($posts as $post) {
            // Include path harus disesuaikan, atau tulis HTML langsung di sini
            // Gw tulis langsung biar simpel di context ini
            ?>
            <div class="col-md-4 fade-in-item">
                <div class="card shadow-sm h-100 border-0">
                    <?php if (!empty($post['thumbnail'])): ?>
                        <div class="overflow-hidden rounded-top">
                            <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top transition-zoom"
                                style="height:220px; object-fit:cover; transition: transform 0.3s ease;"
                                alt="<?= htmlspecialchars($post['title']) ?>">
                        </div>
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column p-4">
                        <div class="mb-2 text-muted small d-flex align-items-center">
                            <i class="bi bi-calendar-event me-2 text-warning"></i>
                            <span class="fw-medium"><?= tanggal_indonesia($post['created_at']) ?></span>
                        </div>
                        <h5 class="card-title fw-bold mb-3 text-dark">
                            <?= htmlspecialchars($post['title']) ?>
                        </h5>
                        <p class="card-text text-muted flex-grow-1 small" style="line-height: 1.6;">
                            <?= htmlspecialchars(mb_substr(strip_tags($post['content']), 0, 110)) ?>...
                        </p>
                        <a href="<?= base_url('berita/' . $post['slug']) ?>"
                            class="btn btn-outline-warning w-100 fw-bold mt-3 rounded-pill">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    // Helper untuk render pagination
    private function renderPagination($currentPage, $totalPages)
    {
        if ($totalPages <= 1)
            return;

        echo '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';

        // Tombol Previous
        $prevDisabled = ($currentPage <= 1) ? 'disabled' : '';
        $prevPage = $currentPage - 1;
        echo '<li class="page-item ' . $prevDisabled . '">
                <a class="page-link ajax-pagination" href="' . base_url("berita?page=$prevPage") . '" data-page="' . $prevPage . '">Previous</a>
              </li>';

        // Loop Angka
        for ($i = 1; $i <= $totalPages; $i++) {
            $active = ($i == $currentPage) ? 'active' : '';
            echo '<li class="page-item ' . $active . '">
                    <a class="page-link ajax-pagination" href="' . base_url("berita?page=$i") . '" data-page="' . $i . '">' . $i . '</a>
                  </li>';
        }

        // Tombol Next
        $nextDisabled = ($currentPage >= $totalPages) ? 'disabled' : '';
        $nextPage = $currentPage + 1;
        echo '<li class="page-item ' . $nextDisabled . '">
                <a class="page-link ajax-pagination" href="' . base_url("berita?page=$nextPage") . '" data-page="' . $nextPage . '">Next</a>
              </li>';

        echo '</ul></nav>';
    }

    public function detail(string $slug)
    {
        // ... (Kode detail biarkan sama seperti sebelumnya) ...
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM berita WHERE slug = :slug LIMIT 1");
        $stmt->execute(['slug' => $slug]);
        $post = $stmt->fetch();

        if (!$post) {
            http_response_code(404);
            echo 'Berita tidak ditemukan';
            exit;
        }

        $title = $post['title'];
        include __DIR__ . '/../Views/berita/detail.php';
    }
}