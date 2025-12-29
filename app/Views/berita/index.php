<?php
$title = 'Berita GOW Kota Tegal';
ob_start();
?>

<style>
    /* =========================
       HERO (ABSOLUTE, NO GAP TOP)
       ========================= */

    .page-hero {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 350px;

        background:
            linear-gradient(rgba(198, 35, 104, 0.78), rgba(198, 35, 104, 0.78)),
            url("<?= base_url('assets/img/hero-berita.jpg') ?>");
        background-size: cover;
        background-position: center;

        display: flex;
        align-items: center;
        color: #fff;

        border-bottom-left-radius: 48px;
        border-bottom-right-radius: 48px;
        overflow: hidden;

        z-index: 1;
    }

    .page-hero h1 {
        font-size: 3rem;
        font-weight: 800;
    }

    /* SPACER */
    .hero-spacer {
        height: 420px;
    }

    /* CONTENT NAIK KE HERO */
    .content-section {
        margin-top: -280px;
        /* 🔥 PENGATUR JARAK */
        padding-top: 120px;
    }

    @media (max-width: 768px) {
        .page-hero {
            height: 320px;
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
        }

        .hero-spacer {
            height: 320px;
        }

        .content-section {
            margin-top: -80px;
            padding-top: 80px;
        }

        .page-hero h1 {
            font-size: 2rem;
        }
    }
</style>

<!-- NAVBAR (TIDAK DISENTUH) -->
<?php include __DIR__ . '/../partials/navbar.php'; ?>

<!-- HERO -->
<section class="page-hero">
    <div class="container">
        <h1>Berita & Kegiatan</h1>
    </div>
</section>

<!-- SPACER -->
<div class="hero-spacer"></div>

<!-- CONTENT -->
<section class="py-5 bg-light content-section">
    <div class="container">

        <div class="row g-4">
            <?php if (empty($posts)): ?>
                <p class="text-muted">Belum ada berita.</p>
            <?php endif; ?>

            <?php foreach ($posts as $post): ?>
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">

                        <?php if (!empty($post['thumbnail'])): ?>
                            <img src="<?= base_url('uploads/' . $post['thumbnail']) ?>" class="card-img-top"
                                style="height:200px;object-fit:cover;" alt="<?= htmlspecialchars($post['title']) ?>">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <?= htmlspecialchars($post['title']) ?>
                            </h5>

                            <p class="card-text text-muted flex-grow-1">
                                <?= htmlspecialchars(
                                    mb_substr(strip_tags($post['content']), 0, 120)
                                ) ?>…
                            </p>

                            <a href="<?= base_url('berita/' . $post['slug']) ?>"
                                class="btn btn-sm btn-outline-warning mt-auto">
                                Baca Selengkapnya
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../partials/layout.php';
