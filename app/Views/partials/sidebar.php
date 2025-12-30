<?php $activeMenu = $activeMenu ?? ''; ?>

<nav class="sidebar d-flex flex-column" id="sidebar">
    <div class="sidebar-header d-flex align-items-center justify-content-center py-4">
        <div class="text-center">
            <img src="<?= base_url('assets/img/gow.webp') ?>" alt="Logo"
                class="bg-white rounded-circle p-1 shadow-sm mb-2" width="60" height="60">
            <h6 class="m-0 fw-bold text-white tracking-wide">ADMIN GOW</h6>
        </div>
    </div>

    <div class="flex-grow-1 px-3 py-3">
        <p class="text-white-50 small fw-bold text-uppercase mb-2 ps-2" style="font-size: 0.7rem;">Main Menu</p>
        <ul class="nav nav-pills flex-column mb-auto gap-2">
            <li class="nav-item">
                <a href="<?= base_url('admin/berita') ?>"
                    class="nav-link <?= $activeMenu == 'berita' ? 'active' : '' ?>">
                    <i class="bi bi-newspaper"></i> Kelola Berita
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/agenda') ?>"
                    class="nav-link <?= $activeMenu == 'agenda' ? 'active' : '' ?>">
                    <i class="bi bi-calendar-event"></i> Kelola Agenda
                </a>
            </li>
        </ul>
    </div>

    <div class="p-3 border-top border-white-50">
        <a href="<?= base_url('admin/logout') ?>"
            class="btn btn-logout w-100 btn-sm d-flex align-items-center justify-content-center">
            <i class="bi bi-box-arrow-left me-2"></i> KELUAR
        </a>
    </div>
</nav>