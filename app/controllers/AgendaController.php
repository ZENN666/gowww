<?php

class AgendaController
{
    // ================= HALAMAN LIST (SEMUA AGENDA) =================
    public function index()
    {
        global $pdo;

        // Ambil agenda yang tanggal mulainya HARI INI atau MASA DEPAN
        // Diurutkan dari yang paling dekat tanggalnya
        $stmt = $pdo->query(
            "SELECT * FROM agenda 
             WHERE tanggal_mulai >= CURDATE() 
             ORDER BY tanggal_mulai ASC"
        );

        $agendas = $stmt->fetchAll();

        // Load view list agenda
        require_once __DIR__ . '/../Views/agenda/index.php';
    }

    // ================= HALAMAN DETAIL =================
    public function detail($slug)
    {
        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM agenda WHERE slug = ?");
        $stmt->execute([$slug]);
        $agenda = $stmt->fetch();

        if (!$agenda) {
            // Kalau agenda gak ketemu, bisa redirect ke 404 atau list
            header("HTTP/1.0 404 Not Found");
            echo "Agenda tidak ditemukan.";
            exit;
        }

        // Load view detail agenda
        require_once __DIR__ . '/../Views/agenda/detail.php';
    }
}