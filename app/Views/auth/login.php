<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - GOW Kota Tegal</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .login-container {
            min-height: 100vh;
        }

        /* Branding Kiri */
        .login-sidebar {
            background: linear-gradient(135deg, #ff7f00 0%, #ffbf00 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-sidebar::before {
            content: "";
            position: absolute;
            width: 150%;
            height: 150%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 40%;
            top: -50%;
            left: -50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Form Kanan */
        .login-form-area {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }

        .form-control:focus {
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(255, 127, 0, 0.15);
            border-color: #ff7f00;
        }

        .btn-login {
            background-color: #ff7f00;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .btn-login:hover {
            background-color: #e67300;
            transform: translateY(-2px);
        }

        .btn-login:disabled {
            background-color: #ffcc80;
            transform: none;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <div class="row g-0 login-container">

        <div
            class="col-lg-6 d-none d-lg-flex flex-column align-items-center justify-content-center text-center login-sidebar px-5">
            <div style="z-index: 2;">
                <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Logo GOW"
                    class="mb-4 bg-white rounded-circle p-2 shadow" style="width: 120px;">
                <h2 class="fw-bold mb-2">GOW KOTA TEGAL</h2>
                <p class="lead opacity-75">Panel Administrasi Web</p>
                <hr class="mx-auto my-4" style="width: 50px; border: 2px solid white; opacity: 1;">
            </div>
        </div>

        <div class="col-lg-6 login-form-area">
            <div class="login-card">

                <div class="mb-4 text-center text-lg-start">
                    <h3 class="fw-bold text-dark">Selamat Datang! 👋</h3>
                    <p class="text-muted small">Silakan login untuk masuk ke dashboard.</p>
                </div>

                <form id="loginForm" action="<?= base_url('admin/login') ?>" method="POST">

                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                            required>
                        <label for="username" class="text-muted"><i class="bi bi-person me-2"></i>Username</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                        <label for="password" class="text-muted"><i class="bi bi-lock me-2"></i>Password</label>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-login text-white shadow-sm" id="btnLogin">
                            MASUK DASHBOARD <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>

                </form>

                <div class="mt-4 text-center">
                    <a href="<?= base_url() ?>" class="text-decoration-none text-muted small">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                    </a>
                </div>

                <div class="mt-5 text-center">
                    <p class="text-muted extra-small" style="font-size: 0.75rem;">
                        &copy; <?= date('Y') ?> GOW Kota Tegal. <br>System developed by IT Team.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah form submit biasa (reload page)

            let btn = document.getElementById('btnLogin');
            let originalText = btn.innerHTML;

            // 1. Ubah tombol jadi loading
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
            btn.disabled = true;

            let formData = new FormData(this);

            // 2. Kirim data ke backend pake Fetch API
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json()) // Pastikan backend return JSON!
                .then(data => {
                    if (data.status === 'success') {
                        // 3. JIKA SUKSES: Tampilkan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Berhasil!',
                            text: 'Mengalihkan ke Dashboard...',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        }).then(() => {
                            // 4. Redirect setelah alert selesai
                            window.location.href = data.redirect_url;
                        });
                    } else {
                        // JIKA GAGAL
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: data.message || 'Username atau Password salah.',
                            confirmButtonColor: '#ff7f00'
                        });

                        // Reset tombol
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Gagal menghubungi server.',
                        confirmButtonColor: '#ff7f00'
                    });
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>