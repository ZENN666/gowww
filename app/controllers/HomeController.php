<?php

class HomeController
{
    public function index()
    {
        global $pdo;

        // 1. AMBIL BERITA TERBARU (Existing)
        $stmt = $pdo->query(
            "SELECT id, title, slug, thumbnail, content, created_at
             FROM berita
             ORDER BY created_at DESC
             LIMIT 3"
        );
        $latestPosts = $stmt->fetchAll();

        // 2. AMBIL AGENDA MENDATANG (Baru Ditambahkan)
        // Logic: Ambil agenda yang tanggal mulainya HARI INI atau SETELAHNYA
        // Diurutkan Ascending (dari tanggal terdekat)
        $stmt_agenda = $pdo->query(
            "SELECT * FROM agenda 
             WHERE tanggal_mulai >= CURDATE() 
             ORDER BY tanggal_mulai ASC 
             LIMIT 3"
        );
        $upcomingAgendas = $stmt_agenda->fetchAll();

        // 3. METADATA
        $og_title = 'Beranda - GOW Kota Tegal';
        $og_desc = 'Gabungan Organisasi Wanita Kota Tegal';
        $og_url = base_url();
        $og_img = base_url('assets/img/hero.png');

        // 4. LOAD VIEW
        include __DIR__ . '/../Views/home.php';
    }
}