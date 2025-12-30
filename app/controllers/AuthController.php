<?php

class AuthController
{
    public function login()
    {
        include __DIR__ . '/../Views/auth/login.php';
    }

    public function process()
    {
        // Pastikan session dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // PENTING: Set header jadi JSON biar frontend ngerti responnya
        header('Content-Type: application/json');

        global $pdo;

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        try {
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Cek Password
            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['admin'] = $admin;

                // JIKA SUKSES: Kirim JSON success + URL tujuan
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login Berhasil! Mengalihkan...',
                    'redirect_url' => BASE_PATH . '/admin/berita' // Dashboard tujuan
                ]);
                exit;
            } else {
                // JIKA GAGAL: Kirim JSON error
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Username atau Password salah!'
                ]);
                exit;
            }
        } catch (Exception $e) {
            // Error server lainnya
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => 'Terjadi kesalahan sistem.'
            ]);
            exit;
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: ' . BASE_PATH . '/admin/login');
        exit;
    }
}