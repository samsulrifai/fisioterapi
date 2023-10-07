<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="<?= base_url() ?>admin">
                <!-- <i class="fa fa-stethoscope text-primary"></i> -->
                <img class="logoDIV" src="<?= base_url() ?>assets/auth/images/icon.jpg">
                <span class="h2 text-blue"></span>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>admin">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Menu Praktek</span>
                </h6>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>C_pasien">
                            <i class="fa fa-users text-primary"></i>
                            <span class="nav-link-text">Data Pasien</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>C_invoice">
                            <i class="fa fa-edit text-primary"></i>
                            <span class="nav-link-text">Riwayat Transaksi</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>C_transaksi_selesai">
                            <i class="fa fa-book text-primary"></i>
                            <span class="nav-link-text">Transaksi Selesai</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>C_teraphy">
                            <i class="fa fa-laptop-medical text-primary"></i>
                            <span class="nav-link-text">Master Teraphy</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>C_keluhan">
                            <i class="fa fa-notes-medical text-primary"></i>
                            <span class="nav-link-text">Keluhan</span>
                        </a>
                    </li>
                </ul>
                <!-- <?php
                if ($this->session->userdata('jabatan') == "admin") {
                ?> -->
                    <!-- Divider -->
                    <hr class="my-3">
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Menu Admin</span>
                    </h6>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>profilusaha">
                                <i class="fa fa-home text-primary"></i>
                                <span class="nav-link-text">Profil Usaha</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>profilusaha/edit">
                                <i class="fa fa-cog text-primary"></i>
                                <span class="nav-link-text">Edit Profil Usaha</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>profilusaha/metode_pembayaran">
                                <i class="fa fa-money-bill text-primary"></i>
                                <span class="nav-link-text">Metode Pembayaran</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>admin/daftar_pegawai">
                                <i class="fa fa-people-carry text-primary"></i>
                                <span class="nav-link-text">Kelola Pegawai</span>
                            </a>
                        </li>
                    </ul>
                <!-- <?php
                }
                ?> -->
            </div>
        </div>
    </div>
</nav>