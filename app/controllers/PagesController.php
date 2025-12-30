<?php

class PagesController
{
    public function profil()
    {
        require_once __DIR__ . '/../Views/profil.php';
    }

    public function visimisi()
    {
        require_once __DIR__ . '/../Views/visimisi.php';
    }

    public function struktur()
    {
        require_once __DIR__ . '/../Views/struktur.php';
    }

    public function galeri()
    {
        require_once __DIR__ . '/../Views/galeri.php';
    }

    public function kontak()
    {
        require_once __DIR__ . '/../Views/kontak.php';
    }

    public function home()
    {
        require_once __DIR__ . '/../Views/home.php';
    }

    public function comingSoon()
    {
        // Pastikan path-nya sesuai dengan letak file view lu
        // Karena ini PHP native custom, biasanya pake include/require
        require_once __DIR__ . '/../views/coming_soon.php';
    }

    public function about()
    {
        // Setup data title (opsional, kalau di view butuh $title)
        $title = 'Tentang GOW Kota Tegal';

        // Panggil View secara manual (karena ini PHP Native)
        include __DIR__ . '/../Views/about.php';
    }
}

