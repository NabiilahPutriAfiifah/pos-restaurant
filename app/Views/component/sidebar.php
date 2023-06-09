<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #23252e;">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
        <!-- <i class="fab fa-cotton-bureau ml-3"></i> -->
        <i class="fas fa-piggy-bank ml-3"></i>
        <span class="brand-text font-weight-semibold px-3">Pos Restaurant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/asset/image/avatar.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('name') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Main Menu</li>
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                <li class="nav-item">
                    <a href="<?= base_url('pelanggan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('supplier') ?>" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p> Master <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('master/menu') ?>" class="nav-link">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p> Menu </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('master/kategori') ?>" class="nav-link">
                                <i class="nav-icon fas fa-ice-cream"></i>
                                <p> Kategori </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('master/jenis') ?>" class="nav-link">
                                <i class="nav-icon fas fa-utensils"></i>
                                <p> Jenis Makanan </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <li class="nav-header">Penjualan</li>
                <li class="nav-item">
                    <a href="<?= base_url('transaksi') ?>" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p> Input Transaksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('penjualan/riwayat') ?>" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p> Riwayat Transaksi</p>
                    </a>
                </li>
                <li class="nav-header">Administrator</li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p><i class="nav-icon fas fa-user"></i> Profil</p>
                    </a>
                </li> -->
                <?php if(session()->get('role_id') == 1) { ?>
                <li class="nav-item">
                    <a href="<?= base_url('user/user_manage') ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?php echo base_url('/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>