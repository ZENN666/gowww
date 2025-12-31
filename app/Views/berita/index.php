<?php
// === SEO SECTION ===
$title = 'Berita GOW Kota Tegal';

// Logic Canonical URL
// Tujuannya agar Google tahu bahwa '/berita' dan '/berita?page=1' adalah halaman yang sama (yaitu '/berita')
$canonicalUrl = base_url('berita');
if (isset($_GET['page']) && (int) $_GET['page'] > 1) {
    $canonicalUrl .= '?page=' . (int) $_GET['page'];
}

// Pass variable ini ke layout.php (asumsi layout lu nangkep variable $extraHead atau $canonical)
// Kalau layout lu ga support, lu harus edit layout.php buat echo variable ini di dalam <head>
$canonical = $canonicalUrl;

ob_start();
?>

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<style>
    /* ... (CSS Page Hero dll tetap sama seperti sebelumnya) ... */
    .page-hero {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 350px;
        background: linear-gradient(rgba(255, 140, 0, 0.5), rgba(255, 100, 0, 1)), url("<?= base_url('assets/img/alun.webp') ?>");
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        padding-bottom: 60px;
        color: #fff;
        border-bottom-left-radius: 48px;
        border-bottom-right-radius: 48px;
        overflow: hidden;
        z-index: 1;
    }

    .page-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        margin-bottom: 0;
    }

    .hero-spacer {
        height: 450px;
    }

    .content-section {
        margin-top: -250px;
        padding-top: 80px;
    }

    @media (max-width: 768px) {
        .page-hero {
            height: 320px;
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
            padding-bottom: 40px;
        }

        .hero-spacer {
            height: 380px;
        }

        .content-section {
            margin-top: -100px;
            padding-top: 60px;
        }

        .page-hero h1 {
            font-size: 2rem;
            text-align: center;
            width: 100%;
        }
    }

    /* CSS Pagination & Animation */
    .pagination .page-link {
        color: #ff7f00;
        border: none;
        margin: 0 5px;
        border-radius: 5px;
    }

    .pagination .page-link:hover {
        background-color: #ffcc80;
        color: white;
    }

    .pagination .page-item.active .page-link {
        background-color: #ff7f00;
        color: white;
        border-color: #ff7f00;
    }

    .fade-in-item {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #loadingOverlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.7);
        z-index: 10;
        display: none;
        justify-content: center;
        align-items: center;
    }
</style>

<?php include __DIR__ . '/../partials/navbar.php'; ?>

<section class="page-hero">
    <div class="container">
        <h1>Berita & Informasi Terkini</h1>
    </div>
</section>

<div class="hero-spacer"></div>

<section class="py-5 bg-light content-section">
    <div class="container position-relative">

        <div id="loadingOverlay">
            <div class="spinner-border text-warning" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="row g-4" id="beritaContainer">
            <?php
            // Logic ini hanya jalan saat First Load / Non-AJAX
            // Kontennya sama persis kaya controller biar konsisten
            if (empty($posts)): ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">Belum ada berita yang diterbitkan.</p>
                </div>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <div class="col-md-4">
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
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="mt-5" id="paginationContainer">
            <?php
            if (isset($totalPages) && $totalPages > 1):
                ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                            <?php
                            // Logic SEO Manual: Halaman 1 gapake query param
                            $prevPage = $page - 1;
                            $prevUrl = ($prevPage == 1) ? base_url('berita') : base_url("berita?page=$prevPage");
                            ?>
                            <a class="page-link ajax-pagination" href="<?= $prevUrl ?>"
                                data-page="<?= $prevPage ?>">Previous</a>
                        </li>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <?php
                                // Logic SEO Manual
                                $url = ($i == 1) ? base_url('berita') : base_url("berita?page=$i");
                                ?>
                                <a class="page-link ajax-pagination" href="<?= $url ?>" data-page="<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                            <a class="page-link ajax-pagination" href="<?= base_url('berita?page=' . ($page + 1)) ?>"
                                data-page="<?= $page + 1 ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Logic JS tidak berubah banyak, cuma lebih stabil

        function attachPaginationEvents() {
            const paginationLinks = document.querySelectorAll('.ajax-pagination');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    // Cek disabled/active
                    if (this.parentElement.classList.contains('disabled') || this.parentElement.classList.contains('active')) return;

                    const url = this.getAttribute('href');
                    loadBerita(url);
                });
            });
        }

        function loadBerita(url) {
            const beritaContainer = document.getElementById('beritaContainer');
            const paginationContainer = document.getElementById('paginationContainer');
            const loadingOverlay = document.getElementById('loadingOverlay');

            // Tambahkan parameter ajax=1
            // Cek apakah URL sudah ada query string '?'
            const separator = url.includes('?') ? '&' : '?';
            const ajaxUrl = url + separator + 'ajax=1';

            // Loading UI
            loadingOverlay.style.display = 'flex';
            beritaContainer.style.opacity = '0.5';

            fetch(ajaxUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        beritaContainer.innerHTML = data.html_content;
                        paginationContainer.innerHTML = data.html_pagination;

                        // Push Clean URL (yang dikirim dari controller 'new_url')
                        window.history.pushState({ path: data.new_url }, '', data.new_url);

                        const sectionTop = document.querySelector('.content-section').offsetTop;
                        window.scrollTo({ top: sectionTop - 100, behavior: 'smooth' });

                        attachPaginationEvents();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert('Gagal memuat berita.'); // Optional
                })
                .finally(() => {
                    loadingOverlay.style.display = 'none';
                    beritaContainer.style.opacity = '1';
                });
        }

        attachPaginationEvents();

        // Handle Browser Back Button
        window.addEventListener('popstate', function (event) {
            window.location.reload();
        });
    });
</script>

<?php
$content = ob_get_clean();
require __DIR__ . '/../partials/layout.php';
?>