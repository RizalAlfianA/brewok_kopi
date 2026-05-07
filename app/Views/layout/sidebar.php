<?php $role = session()->get('role'); ?>

<div id="sidebar">
    <div class="sidebar-wrapper active">

        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?= base_url(); ?>">
                    <img class="img-fluid rounded-3"
                        style="width:max-content;height:max-content;"
                        src="<?= base_url('assets/img/logo/Logo.jpeg'); ?>"
                        alt="Logo"
                        loading="lazy">
                </a>

                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-title">Menu</li>

                <!-- ================= OWNER ================= -->

                <?php if($role == 'owner'): ?>

                <li class="sidebar-item">
                    <a href="/owner/dashboard" class="sidebar-link">
                        <i class="bi bi-graph-up"></i>
                        <span>Dashboard Bisnis</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/owner/laporan" class="sidebar-link">
                        <i class="bi bi-bar-chart"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/owner/user" class="sidebar-link">
                        <i class="bi bi-people"></i>
                        <span>Manajemen User</span>
                    </a>
                </li>

                <?php endif; ?>


                <!-- ================= ADMIN ================= -->

                <?php if($role == 'admin'): ?>

                <li class="sidebar-item">
                    <a href="/admin/dashboard" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/admin/kategori" class="sidebar-link">
                        <i class="bi bi-tags"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/admin/menu" class="sidebar-link">
                        <i class="bi bi-journal-check"></i>
                        <span>Menu</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/admin/laporan" class="sidebar-link">
                        <i class="bi bi-bar-chart"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <?php endif; ?>


                <!-- ================= KASIR ================= -->

                <?php if($role == 'kasir'): ?>

                <li class="sidebar-item">
                    <a href="/kasir/pos" class="sidebar-link">
                        <i class="bi bi-cart"></i>
                        <span>POS</span>
                    </a>
                </li>

                <?php endif; ?>

            </ul>
        </div>

    </div>
</div>